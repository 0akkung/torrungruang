@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Edit Customer Detail</h1>
    </div>
    <div class="">
        <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-600">Company Name</label>
                <input type="text" id="company_name" name="company_name" autocomplete="off" value="{{$customer->company_name}}" placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
                <label for="name" class="block mb-2 font-bold text-gray-600">Purchaser Name</label>
                <input type="text" id="purchaser_name" name="purchaser_name" autocomplete="off" value="{{$customer->purchaser_name}}" placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
                <label for="name" class="block mb-2 font-bold text-gray-600">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" autocomplete="off" value="{{$customer->phone_number}}" placeholder="Insert Spec Name" class="border border-gray-300 shadow p-3 w-full rounded-lg ">
            </div>
            <div class="flex space-x-8">
                <x-submit-button label="Submit" />
                <x-back-button label="Cancel" />
            </div>
        </form>
    </div>
</div>
@endsection