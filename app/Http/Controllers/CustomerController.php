<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Address;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();
        return view('customers.index', [
            'title' => "Customers",
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', [
            'title' => "Customers > Create"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->company_name = $request->get('company_name');
        $customer->purchaser_name = $request->get('purchaser_name');
        $customer->phone_number = $request->get('phone_number');
        $customer->save();
            return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'title' => "Customers > Detail",
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
    // public function createAddress(Customer $customer)
    // {
    //     return view('address.create', [
    //         'title' => "Customers > Address > Add Address",
    //         'customer' => $customer
    //     ]);
    // }
    // public function createAddress(Customer $customer)
    // {
    //     return view('address.create', [
    //         'title' => "Customers > Address > Add Address",
    //         'customer' => $customer
    //     ]);
    // }
    public function editAddress()
    {
        return view('address.edit', [
            'title' => "Customers > Address > Edit Address"
        ]);
    }
}
