@extends('layouts.main')

@section('content')
<div>
    <div class="flex justify-between">
        <div class="flex">
            <h1 class="px-1 bg-tag py-1 mr-1"></h1>
            <h1 class="px-1 bg-tag py-1"></h1>
            <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Sale Order</h1>
        </div>
        <a href="{{ route('so.create') }}" class="p-2 bg-po-button shadow-md text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 inline">+ SO</a>
    </div>

    <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
        <div class="col-span-10">
            <form method="GET" action="{{ route('sale-order.search') }}" class="flex">
                <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Sale Order ID, Purchase ID, Customer ID and Company Name">
                <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
            </form>
        </div>
        <div class="col-span-2">
            <form action="{{ route('sale-order.option') }}" method="GET">
                @csrf
                <select name="sort_by" id="sortBy" onchange="this.form.submit()" class="bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>Choose SO status</option>
                    <option value="notYetComplete">Unfinished</option>
                    <option value="completed">Finished</option>
                </select>
            </form>
        </div>

    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-table text-left text-gray-400">
        <thead class="text-table-header uppercase bg-table text-white">
                <tr>
                    <th class="px-6 py-3">SO ID</th>
                    <th class="px-6 py-3"> PO ID </th>
                    <th class="px-6 py-3"> Company ID </th>
                    <th class="px-6 py-3"> Company Name</th>
                    <th class="px-6 py-3">Price (add VAT + 1.07%)</th>
                    <th class="px-6 py-3">Delivery Status</th>
                    <th class="px-6 py-3">Create SO Date</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @if( count($saleOrders) === 0 )
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td colspan="9" class="px-6 py-4 text-center font-medium text-gray-900">
                        No Sale Orders Available
                    </td>
                </tr>
                @endif
                @foreach($saleOrders as $saleOrder)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900">{{$saleOrder->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{$saleOrder->purchaseOrder->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$saleOrder->purchaseOrder->customer->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$saleOrder->purchaseOrder->customer->company_name}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$saleOrder->total_order_price}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        @if ($saleOrder->delivery_status)
                        <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full">Finish</span>
                        @else
                        <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full"> UNFinish</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$saleOrder->sale_date}} </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <a href="{{ route('so.show',['so'=> $saleOrder]) }}" class="text-cyan-800 hover:underline font-bold">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection