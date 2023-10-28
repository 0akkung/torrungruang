@extends('layouts.main')
@section('content')
<div>
  <div class="flex justify-between mb-5">
    <div class="flex">
      <h1 class="px-1 bg-tag py-1 mr-1"></h1>
      <h1 class="px-1 bg-tag py-1"></h1>
      <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Customer Information</h1>
    </div>
    <a href="{{ route('customers.createAddress', ['customer' => $customer]) }}" class="p-2 bg-po-button shadow-md text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 inline">+ Address</a>
  </div>
  <div class="grid grid-rows-2 grid-flow-col gap-4 mt-5 mb-5 text-md font-medium ">
    <div class="row-span-2 bg-white flex flex-col rounded-md p-1">
      <div class="p-2 flex space-x-2 mt-2 mb-2">
        <img src="https://i.ibb.co/FVKCcYC/id.png" alt="Image Description" width="18px" height="18px">
        <span class="">Customer ID :</span> &nbsp;&nbsp;
        <span>{{$customer->id}}</span>
      </div>
      <div class="p-2 flex space-x-2">
        <img src="https://i.ibb.co/s2LbKH8/user.png" alt="Image Description" width="18px" height="18px">
        <span class="">Customer Name :</span> &nbsp;&nbsp;
        <span>{{$customer->purchaser_name}}</span>
      </div>
    </div>
    <div class="col-span-2 bg-white rounded-md p-1">
      <div class="p-2 flex space-x-2">
        <img src="https://i.ibb.co/rwWxXDQ/city-building.png" alt="Image Description" width="17px" height="17px">
        <span class="">Company Name :</span> &nbsp;&nbsp;
        <span>{{$customer->company_name}}</span>
      </div>
    </div>
    <div class="col-span-2 bg-white rounded-md p-1">
      <div class="p-2 flex space-x-2">
        <img src="https://i.ibb.co/ZTKg2SB/call.png" alt="Image Description" width="17px" height="17px">
        <span class="">Tel :</span> &nbsp;&nbsp;
        <span>{{$customer->phone_number}}</span>
      </div>
    </div>
  </div>

  <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <caption class="border-b py-2 uppercase font-semibold text-sm bg-table text-white">Customer Address</caption>
      <thead class="text-xs uppercase bg-table text-white">
        <tr class="text-white font-semibold text-sm uppercase text-center">
          <th class="px-6 py-4">Address ID</th>
          <th class="px-6 py-4">Description</th>
          <th class="px-6 py-4">Edit</th>
        </tr>
      </thead>
      <tbody class="">
        @foreach ($addresses as $address)
        <tr class="bg-white border-b text-center">
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$address->id}}</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$address->address_detail}}</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"> <a href="{{ route('customers.editAddress', ['customer' => $customer, 'address' => $address]) }}" class="text-purple-800 hover:underline font-bold">Edit address</a> </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection