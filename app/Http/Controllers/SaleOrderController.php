<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\RopeSpec;
use App\Models\Customer;
use App\Models\PoItem;
use App\Models\SaleOrder;
use App\Models\SoItem;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sale-orders.index', [
            'title' => 'Sale Orders'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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

        foreach ($poItems as $poItem){  // list จากลูปpoItems
            //dd($poItem); pass
            $saleQuantity = $request->input('sale_quantity_' . $poItem->id);
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
        $purchaseOrder->saleOrders()->save($saleOrder);
        
            return redirect()->route('so.index',['saleOrder' => $saleOrder]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleOrder $saleOrder)
    {
        //
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
}
