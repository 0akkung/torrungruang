<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PoItem;
use App\Models\PurchaseOrder;
use App\Models\RopeSpec;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase-orders.index', [
            'title' => 'Purchase Orders'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specs = RopeSpec::get();
        $customers = Customer::get();
        return view('purchase-orders.create', [
            'title' => 'Create Purchase Orders',
            'specs' => $specs,
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::find($request->get('customer_id'));   //find customer from create-form naka
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->purchase_date = now();
        $purchaseOrder->due_date = $request->get('due_date');
        $purchaseOrder->customer_po_id = $request->get('customer_po_id');
        // $purchaseOrder->original_order_price = $request->get('original_order_price');
        // $purchaseOrder->total_order_price = $request->get('total_order_price');
        $purchaseOrder->produce_status = 0;
        $purchaseOrder->payment_status = 0;

        $customer->purchase_order()->save($purchaseOrder);

        $poItemsData = $request->input('po_items');  // listข้อมูล
        foreach ($poItemsData as $poItemData) {
            $specId = $poItemData['spec_id']; 
            $spec = RopeSpec::find($specId); //หาspecที่ส่งมา
            $poItem = new PoItem(); 
            $poItem->rope_spec_id = $specId;
            $poItem->order_quantity = $poItemData['order_quantity'];
            $poItem->unit_price = $poItemData['unit_price'];
            $poItem->remaining_quantity = $poItemData['order_quantity'];  //ถ้ายังไม่เปิดใบสั่งขายเลย จำนวนจะเท่ากับตอนเปิดใบสั่งซื้อ
            $poItem->po_item_price = $poItem->unit_price * $poItem->order_quantity;  //unit * จำนวนที่สั่ง
            
            $purchaseOrder->original_order_price += $poItem->po_item_price;    // + ราคารวมสเปคที่สั่งทั้งหมด
            $purchaseOrder->poItem()->save($poItem);
            $spec->poItem()->save($poItem); // save สเปค
        }
        $purchaseOrder->total_order_price = $purchaseOrder->original_order_price * (1.07);   // ราคาหลังรวมVAT 7%
        $customer->purchase_order()->save($purchaseOrder); // เซฟอีกรอบเพื่อความเป็นสิริมงคล หลัง add ราคา

            return redirect()->route('po.index',['purchaseOrder' => $purchaseOrder]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
