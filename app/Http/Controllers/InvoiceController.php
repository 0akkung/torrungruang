<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoices.index', [
            'title' => 'Invoices'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::where('produce_status', 1)->where('payment_status', 0)->get();
        return view('invoices.create', [
            'title' => "Invoice > Create",
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
        $invoice = new Invoice();
        $invoice->bill_date = now();
        $invoice->payment_date = now()->addMonth();   //กำหนดจ่ายตังภายใน 1 เดือน
        $purchaseOrder->invoice()->save($invoice);
        return redirect()->route('deliveries.index')->with('success', 'Invoice Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
