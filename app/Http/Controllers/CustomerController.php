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
        $request->validate([
            'company_name' => ['required', 'min:2', 'max:255'],
            'purchaser_name' => ['required', 'min:2', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            ]);

        $customer = new Customer();
        $customer->company_name = $request->get('company_name');
        $customer->purchaser_name = $request->get('purchaser_name');
        $customer->phone_number = $request->get('phone_number');
        $customer->save();

        return redirect()->route('customers.show', ['customer' => $customer])
            ->with('success', 'Customer Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', [
            'title' => "Customers > Detail",
            'customer' => $customer,
            'addresses' => $customer->addresses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'title' => "Customers > Detail > Edit",
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'company_name' => ['required', 'min:2', 'max:255'],
            'purchaser_name' => ['required', 'min:2', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10']
        ]);

        $customer->company_name = $request->get('company_name');
        $customer->purchaser_name = $request->get('purchaser_name');
        $customer->phone_number = $request->get('phone_number');
        $customer->save();

        return redirect()->route('customers.show',['customer' => $customer]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::search($search)->get();

        return view('customers.index', [
            'title' => 'Customer > Search > ' . $search,
            'customers' => $customers
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
    public function createAddress(Customer $customer)
    {
        return view('customers.add-address', [
            'title' => "Customers > Address > Add Address",
            'customer' => $customer
        ]);
    }
    public function storeAddress(Request $request,Customer $customer)
    {
        $request->validate([
            'address_detail' => ['required', 'min:2', 'max:255']
        ]);

        $address = new Address();
        $address->address_detail = $request->get('address_detail');
        $customer->addresses()->save($address);
            return redirect()->route('customers.show',['customer' => $customer]);
    }
    public function editAddress(Customer $customer,Address $address)
    {
        return view('customers.edit-address', [
            'title' => "Customers > Address > Edit",
            'customer' => $customer,
            'address' => $address
        ]);
    }
    public function updateAddress(Request $request,Customer $customer,Address $address)
    {
        $request->validate([
            'address_detail' => ['required', 'min:2', 'max:255']
        ]);

        $address->address_detail = $request->get('address_detail');
        $customer->addresses()->save($address);
            return redirect()->route('customers.show',['customer' => $customer]);
    }



}
