<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddresses($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $addresses = $customer->addresses;

        return response()->json(['addresses' => $addresses]);
    }
    
}
