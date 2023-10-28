<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
        $purchaseOrders = PurchaseOrder::get();
        return view('purchase-orders.index', [
            'title' => 'Purchase Orders',
            'purchaseOrders' => $purchaseOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $selectedCustomerId = 1;
        $selectedSpecs = [];
        $selectedCustomer = Customer::find($selectedCustomerId);
        $specs = RopeSpec::get();
        $customers = Customer::get();
        return view('purchase-orders.create', [
            'title' => 'Create Purchase Orders',
            'specs' => $specs,
            'customers' => $customers,
            'selectedCustomer' => $selectedCustomer,
            'selectedSpecs' => $selectedSpecs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_id' => ['required'],
            'customer_id' => ['required'],
            'due_date' => ['required'],
            'customer_po_id' => ['required'],
        ]);

        $customer = Customer::findOrFail($request->get('customer_id'));   //find customer from create-form naka
        $address_id = $request->get('address_id');

        $purchase_order = new PurchaseOrder();
        $purchase_order->purchase_date = now();
        $purchase_order->due_date = $request->get('due_date');
        $purchase_order->customer_po_id = $request->get('customer_po_id');
        $purchase_order->address_id = $address_id;
        // $purchaseOrder->original_order_price = $request->get('original_order_price');
        // $purchaseOrder->total_order_price = $request->get('total_order_price');
        $purchase_order->produce_status = 0;
        $purchase_order->payment_status = 0;

        $customer->purchaseOrders()->save($purchase_order);

        $orders = $request->input('po_items');  // listข้อมูลจากลูปนรก

        foreach ($orders as $order) {
            $spec_id = $order['spec_id'];
            $spec = RopeSpec::find($spec_id); //หาspecที่ส่งมา

            $item = new PoItem();
            $item->rope_spec_id = $spec_id;
            $item->order_quantity = $order['order_quantity'];
            $item->unit = $order['unit'];  // collect unit like kg / meter
            $item->unit_price = $order['unit_price'];
            $item->remaining_quantity = $order['order_quantity'];  //ถ้ายังไม่เปิดใบสั่งขายเลย จำนวนจะเท่ากับตอนเปิดใบสั่งซื้อ
            $item->po_item_price = $item->unit_price * $item->order_quantity;  //unit * จำนวนที่สั่ง

            $purchase_order->original_order_price += $item->po_item_price;    // + ราคารวมสเปคที่สั่งทั้งหมด
            $purchase_order->poItems()->save($item);

            $spec->poItems()->save($item); // save สเปค
        }

        $purchase_order->total_order_price *= 1.07;   // ราคาหลังรวมVAT 7%
        $customer->purchaseOrders()->save($purchase_order); // เซฟอีกรอบเพื่อความเป็นสิริมงคล หลัง add ราคา

        return redirect()->route('po.index',['purchaseOrder' => $purchase_order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $po)
    {
<<<<<<< HEAD

        return view('purchase-orders.show', [
            'title' => "PurchaseOrders > Detail",
            'purchaseOrder' => $po,
            'customer' => $po->customer,
            'poItems' => $po->poItems
        ]);
=======

>>>>>>> 23c8fa4 (Fix PO creating)
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

    public function searchPurchaseOrders(Request $request)
    {
        $term = $request->input('term');
        $purchaseOrders = PurchaseOrder::where('field_to_search', 'like', '%'.$term.'%')->get();
        return response()->json($purchaseOrders);
    }

}
