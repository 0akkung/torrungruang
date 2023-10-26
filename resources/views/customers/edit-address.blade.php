@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Edit address</h1>
    <div>
        <form action="{{ route('customers.updateAddress', ['customer' => $customer, 'address' => $address]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-600">Address Detail</label>  
                <textarea type="text" id="address_detail" name="address_detail" autocomplete="off" 
                    placeholder="Insert address Detail" value="{{$address->address_detail}}"
                    class="border border-gray-300 shadow p-3 w-full rounded-lg h-40 py-2 px-3 "></textarea>
            </div>
            <div class="flex">
                <button type="submit" class="block  btn btn-success text-white font-bold p-4 rounded-lg">Submit</button>
                <a href="{{ route('customers.show', ['customer' => $customer]) }}" class="block btn btn-error text-white font-bold p-4 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
