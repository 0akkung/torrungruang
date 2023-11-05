<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\RopeSpec;
use App\Models\Customer;
use App\Models\PoItem;
use App\Models\SaleOrder;
use App\Models\SoItem;
use App\Models\Address;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saleOrders = SaleOrder::get();
        return view('sale-orders.index', [
            'title' => 'Sale Orders',
            'saleOrders' => $saleOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::where('produce_status',false)->get();

        foreach($purchaseOrders as $po){
            $poItems = $po->poItems()->where('remaining_quantity',0)->get();
            if (count($poItems) > 0){
                break;
            }
            else{
                return redirect()->back()->with('error', 'Cannot Create Sale Order without any Unfinished Purchase Order');
            }
        }


        $specs = RopeSpec::get();
        $selectedPurchaseOrder = 1;
        $customers = Customer::get();
        $purchaseOrders = PurchaseOrder::get();
        $poItems = PoItem::with('ropeSpec')->get();
        return view('sale-orders.create', [
            'title' => 'Sale Orders > Create',
            'purchaseOrders' => $purchaseOrders,
            'customers' => $customers,
            'selectedPurchaseOrder' => $selectedPurchaseOrder,
            'specs' => $specs,
            'poItems' => $poItems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchaseOrder = PurchaseOrder::find($request->get('purchaseOrder_id'));   //หา purchase order ที่เลือก
        //dd($purchaseOrder); // check purchase_order  pass 
        $poItems = PoItem::where('purchase_order_id', $purchaseOrder->id)->get();

        // dd($poItems); pass   
        $saleOrder = new SaleOrder();
        $saleOrder->sale_date = now();
        $saleOrder->delivery_status = false;

        foreach ($poItems as $poItem) {  // list จากลูปpoItems
            //dd($poItem); pass
            $saleQuantity = $request->input('sale_quantity_' . $poItem->id);

            if ($saleQuantity == null) {
                $saleQuantity = 0;
            }
            $spec = RopeSpec::find($poItem->rope_spec_id);
            //dd($spec); 
            $soItem = new SoItem();
            $soItem->sale_quantity = $saleQuantity;
            // dd($soItem);
            $soItem->rope_spec_id = $spec->id;
            $soItem->so_item_price = $poItem->unit_price * $soItem->sale_quantity;
            // $soItem->
            $purchaseOrder->saleOrders()->save($saleOrder); //save sale order
            // dd($saleOrder);
            $saleOrder->soItems()->save($soItem); // save so Item


            $spec->soItems()->save($soItem);  // save spec

            $poItem->remaining_quantity -= $soItem->sale_quantity;
            $saleOrder->original_order_price += $soItem->so_item_price;

            $purchaseOrder->poItems()->save($poItem); // save after update remaining_quantity

        }
        $saleOrder->total_order_price = $saleOrder->original_order_price * (1.07);
        $saleOrder->save();
        $purchaseOrder->saleOrders()->save($saleOrder);//->dd();

        return redirect()->route('so.index')->with('success', 'Sale Order Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleOrder $so)
    {
        $address = Address::find($so->purchaseOrder->address_id);
        //dd($address);
        return view('sale-orders.show', [
            'title' => "SalesOrders > Detail",
            'saleOrder' => $so,
            'purchaseOrder' => $so->purchaseOrder,
            'soItems' => $so->soItems,
            'customer' => $so->purchaseOrder->customer,
            'address' => $address
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleOrder $saleOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleOrder $saleOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleOrder $saleOrder)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $saleOrders = SaleOrder::search($search)->get();

        return view('sale-orders.index', [
            'title' => 'Sale Orders > Search > ' . $search,
            'saleOrders' => $saleOrders

        ]);
    }

    public function option(Request $request)
    {   
        $status = $request->input('sort_by');
        $so = SaleOrder::get();
        $title = "";
        // dd($status);
        if ($status === 'completed') {
            // Query the PurchaseOrder table to find records where 'produce_status' is true
            $so = SaleOrder::where('delivery_status', true)->get();
            $title = "Finished";
        }
        else if ($status === 'notYetComplete'){
            $so = SaleOrder::where('delivery_status', false)->get();
            $title = "Unfinished";
        }
        return view('sale-orders.index', [
            'title' => 'Sale Orders > ' . $title,
            'saleOrders' => $so
        ]);
    }
    public function printPDF(SaleOrder $so)
    {
        $address = Address::find($so->purchaseOrder->address_id);
        $pdf = app('dompdf.wrapper')->loadView('sale-orders.pdf', [
            'title' => "SalesOrders > Detail",
            'saleOrder' => $so,
            'purchaseOrder' => $so->purchaseOrder,
            'soItems' => $so->soItems,
            'customer' => $so->purchaseOrder->customer,
            'address' => $address
        ]
        );
        return $pdf->stream('sale-orders.pdf');
    }
}
