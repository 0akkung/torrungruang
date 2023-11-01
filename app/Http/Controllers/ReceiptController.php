<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Receipt::get();
        return view('receipts.index', [
            'title' => 'Receipts',
            'receipts' => $receipts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::where('produce_status', 1)->where('payment_status', 0)->has('invoice')->get();  //เอาที่สร้างใบวางบิลแล้ว
        return view('receipts.create', [
            'title' => "Receipt > Create",
            'purchaseOrders'=> $purchaseOrders
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchaseOrder = PurchaseOrder::find($request->get('purchaseOrder_id'));
        //dd($purchaseOrder);
        $receipt = new Receipt();
        $receipt->pay_date = now();
        $receipt->receipter_name = auth()->user()->name;  
        $purchaseOrder->receipt()->save($receipt);
        return redirect()->route('receipts.index')->with('success', 'Receipt Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
