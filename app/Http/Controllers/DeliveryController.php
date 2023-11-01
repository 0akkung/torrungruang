<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\SaleOrder;
use App\Models\PoItem;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::get();
        return view('deliveries.index', [
            'title' => 'Deliveries',
            'deliveries' => $deliveries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saleOrders = SaleOrder::doesntHave('delivery')->get();
        //dd($saleOrders);

        return view('deliveries.create', [
            'title' => "Delivery > Create",
            'saleOrders' => $saleOrders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $saleOrder = SaleOrder::find($request->get('saleOrder_id'));
        //dd($saleOrder);
        $delivery = new Delivery();
        $delivery->delivery_date = now();
        $saleOrder->delivery()->save($delivery);
       
        return redirect()->route('deliveries.index')->with('success', 'Delivery Bill Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
