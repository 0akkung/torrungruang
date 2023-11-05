<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Address;
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
    public function search(Request $request)
    {
        $search = $request->input('search');
        $receipts = Receipt::search($search)->get();

        return view('receipts.index', [
            'title' => 'Receipts > Search > ' . $search,
            'receipts' => $receipts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::where('produce_status', true)->whereHas('invoice')->whereDoesntHave('receipt')->get();
        if ( count($purchaseOrders) === 0 ) {
            return redirect()->back()->with('error', "Cannot Create Receipt without any Purchase Order's Invoice");
        }

        $purchaseOrders = PurchaseOrder::where('produce_status', 1)->where('payment_status', 0)->doesntHave('receipt')->get();  //เอาที่สร้างใบวางบิลแล้ว
        return view('receipts.create', [
            'title' => "Receipt > Create",
            'purchaseOrders'=> $purchaseOrders,
            'po' => [],
            'poItems' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchaseOrderID = $request->input('purchaseOrder'); // Adjust this according to the actual field name in your form
        $purchaseOrder = PurchaseOrder::find($purchaseOrderID);
        $purchaseOrder->load('receipt');
        //dd($purchaseOrder);
        $receipt = new Receipt();
        $receipt->pay_date = now();
        $receipt->receipter_name = auth()->user()->name;  
        $purchaseOrder->receipt()->save($receipt);
        $purchaseOrder->payment_status = true;
        $purchaseOrder->save();
        return redirect()->route('receipts.index')->with('success', 'Receipt Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        $address = Address::find($receipt->purchaseOrder->address_id);
        return view('receipts.show', [
            'title' => "Receipt > Detail",
            'receipt' => $receipt,
            'purchaseOrder' => $receipt->purchaseOrder,
            // 'deliveries' => $invoice->purchaseOrder->saleOrder->delivery,
            'customer' => $receipt->purchaseOrder->customer,
            'address' => $address,
            'poItems' => $receipt->purchaseOrder->poItems

        ]);
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

    public function option(Request $request)
    {
        $id = $request->input('purchaseOrder_id');
        $po = PurchaseOrder::find($id);
        $po->load('poItems');
        $purchaseOrders = PurchaseOrder::where('produce_status', 1)->where('payment_status', 0)->doesntHave('receipt')->get();  //เอาที่สร้างใบวางบิลแล้ว
        return view('receipts.create', [
            'title' => 'Receipt > Create > Purchase Order ID : ' . $po->id,
            'poItems' => $po->poItems,
            'purchaseOrders' => $purchaseOrders,
            'po' => $po
        ]);
    }

    public function printPDF(Receipt $receipt)
    {
        $address = Address::find($receipt->purchaseOrder->address_id);
        $pdf = app('dompdf.wrapper')->loadView('receipts.pdf', [
            'title' => "Receipt > Detail",
            'receipt' => $receipt,
            'purchaseOrder' => $receipt->purchaseOrder,
            'customer' => $receipt->purchaseOrder->customer,
            'address' => $address,
            'poItems' => $receipt->purchaseOrder->poItems
        ]
        );
        return $pdf->stream('receipts.pdf');
    }
}
