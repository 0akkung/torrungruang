@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Edit Customer Detail</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
      <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 font-bold text-gray-600">Company Name</label>  
            <input type="text" id="company_name" name="company_name" autocomplete="off" value="{{$customer->company_name}}"
                placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
            <label for="name" class="block mb-2 font-bold text-gray-600">Purchaser Name</label>                                 
            <input type="text" id="purchaser_name" name="purchaser_name" autocomplete="off" value="{{$customer->purchaser_name}}"
                placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
            <label for="name" class="block mb-2 font-bold text-gray-600">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" autocomplete="off" value="{{$customer->phone_number}}"
                placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
        </div>
        <div class="flex">
            <button type="submit" class="block  btn btn-success text-white font-bold p-4 rounded-lg">Submit</button>
            <a href="{{ route('customers.show', ['customer' => $customer]) }}" class="block btn btn-error text-white font-bold p-4 rounded-lg">Cancel</a>
        </div>
    </form>
    </div>
</div>
@endsection
