<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Address;
use App\Models\Delivery;
use App\Models\PurchaseOrder;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $invoices = Invoice::get();
        return view('invoices.index', [
            'title' => 'Invoices',
            'invoices' => $invoices
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::where('produce_status', 1)->where('payment_status', 0)->doesntHave('invoice')->get();
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
        $invoice->billing_officer = auth()->user()->name;  
        $invoice->payment_date = now()->addMonth();   //กำหนดจ่ายตังภายใน 1 เดือน
        $purchaseOrder->invoice()->save($invoice);
        return redirect()->route('invoices.index')->with('success', 'Invoice Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $address = Address::find($invoice->purchaseOrder->address_id);
        // dd($address);
        $saleOrders = SaleOrder::where('purchase_order_id', $invoice->purchaseOrder->id)->get();  //ดึง saleOrders
        //dd($saleOrders);
        // $deliveries = $saleOrders->flatMap(function ($saleOrder) {
        //     return $saleOrder->delivery;
        // })->filter();
        // dd($deliveries);
        return view('invoices.show', [
            'title' => "Invoice > Detail",
            'invoice' => $invoice,
            'purchaseOrder' => $invoice->purchaseOrder,
            // 'deliveries' => $invoice->purchaseOrder->saleOrder->delivery,
            'customer' => $invoice->purchaseOrder->customer,
            'address' => $address,
            'saleOrders' => $saleOrders
        ]);
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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $invoices = Invoice::search($search)->get();

        return view('invoices.index', [
            'title' => 'Invoices > Search > ' . $search,
            'invoices' => $invoices

        ]);
    }
    public function printPDF(Invoice $invoice)
    {
        $address = Address::find($invoice->purchaseOrder->address_id);
        $saleOrders = SaleOrder::where('purchase_order_id', $invoice->purchaseOrder->id)->get();  //ดึง saleOrders
        
        $pdf = app('dompdf.wrapper')->loadView('invoices.pdf', [

            'title' => "Invoice > Detail",
            'invoice' => $invoice,
            'purchaseOrder' => $invoice->purchaseOrder,
            // 'deliveries' => $invoice->purchaseOrder->saleOrder->delivery,
            'customer' => $invoice->purchaseOrder->customer,
            'address' => $address,
            'saleOrders' => $saleOrders
        ]
        );
        return $pdf->stream('invoices.pdf');
    }
}
