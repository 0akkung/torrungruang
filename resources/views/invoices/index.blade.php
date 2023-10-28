@extends('layouts.main')

@section('content')
<div>
  <div class="flex justify-between">
    <div class="flex">
      <h1 class="px-1 bg-tag py-1 mr-1"></h1>
      <h1 class="px-1 bg-tag py-1"></h1>
      <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Invoice</h1>
    </div>
    <a href="{{ route('invoices.create') }}" class="p-2 bg-po-button shadow-md text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 inline">+ Invioce</a>
  </div>
  <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
    <div class="col-span-10">
      <form method="GET" action="{{ route('specs.search') }}" class="flex">
        <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Invoice ID (ยังไม่ทำrouteSearch)">
        <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
      </form>
    </div>
    <div class="col-span-2">
      <select id="status" name="status" class="bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Choose Invoice status</option>
        <option value="notYetComplete">Not yet completed</option>
        <option value="Complete">Complete</option>
      </select>
    </div>

  </div>

  <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
      <thead class="text-sm uppercase bg-table text-white">
        <tr>
          <th scope="col" class="px-6 py-3 text-center">Invoice ID</th>
          <th scope="col" class="px-6 py-3 text-center">PO ID</th>
          <th scope="col" class="px-6 py-3 text-center">Customer ID </th>
          <th scope="col" class="px-6 py-3 text-center">Company Name</th>
          <th scope="col" class="px-6 py-3 text-center">Price<br>(+ VAT 1.07%)</th>
          <th scope="col" class="px-6 py-3 text-center">Delivery Date</th>
          <th scope="col" class="px-6 py-3 text-center">Pay Date</th>
          <th scope="col" class="px-6 py-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b text-sm">
          <td class="px-6 py-4 font-medium text-gray-900">InvoiceID</td>
          <td class="px-6 py-4 font-medium text-gray-900">PO-ID</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Customer-ID</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">CompanyName</td>
          <td class="px-6 py-4 font-medium text-gray-900">Price</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Deli-Date</td>
          <td class="px-6 py-4 font-medium text-gray-900">Pay-Date</td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Action</td> 
        </tr>
      </tbody>
    </table>
  </div>
</div>



@endsection
