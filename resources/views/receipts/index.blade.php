@extends('layouts.main')

@section('content')

<div>

  <div class="flex">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Receipt</h1>
  </div>

  <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
    <div class="col-span-10">
      <form method="GET" action="{{ route('receipt.search') }}" class="flex">
        <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Receipt ID, Purchase ID, Customer ID and Company Name">
        <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
      </form>
    </div>
    <div class="col-span-2">
      <form method="GET" action="{{ route('receipts.create') }}" class="">
        <button type="submit" class="p-2.5 shadow-md focus:outline-none bg-po-button text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 w-full">+ Receipt</button>
      </form>
    </div>
  </div>

  <div class="overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-table text-left text-gray-400">
        <thead class="text-table-header uppercase bg-table text-white">
        <tr>
          <th scope="col" class="px-6 py-3">Receipt ID</th>
          <th scope="col" class="px-6 py-3">PO ID</th>
          <th scope="col" class="px-6 py-3">Customer ID </th>
          <th scope="col" class="px-6 py-3">Company Name</th>
          <th scope="col" class="px-6 py-3">Price</th>
          <th scope="col" class="px-6 py-3">Receipt Date</th>
          <th scope="col" class="px-6 py-3">Action</th>
        </tr>
      </thead>
      <tbody>
        @if( count($receipts) === 0 )
        <tr class="bg-white border-b hover:bg-gray-50">
          <td colspan="9" class="px-6 py-4 text-center font-medium text-gray-900">
            No Receipt Available
          </td>
        </tr>
        @endif
        @foreach($receipts as $receipt)
        <tr class="bg-white border-b">
          <td class="px-6 py-4 font-medium text-gray-900">{{$receipt->id}}</td>
          <td class="px-6 py-4 font-medium text-gray-900">{{$receipt->purchase_order_id}}</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$receipt->purchaseOrder->customer->id}}</td>
          <td class="px-6 py-4 font-medium text-gray-900">{{$receipt->purchaseOrder->customer->company_name}}</td>
          <td class="px-6 py-4 font-medium text-gray-900">{{$receipt->purchaseOrder->total_order_price}}</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$receipt->pay_date}}</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            <a href="{{ route('receipts.show',['receipt'=> $receipt]) }}" class="text-cyan-800 hover:underline font-bold">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection