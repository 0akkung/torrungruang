@extends('layouts.main')

@section('content')
<div>
    <div class="flex justify-between">
        <div class="flex">
            <h1 class="px-1 bg-tag py-1 mr-1"></h1>
            <h1 class="px-1 bg-tag py-1"></h1>
            <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Purchase Order</h1>
        </div>
        <a href="{{ route('po.create') }}" class="p-2 bg-po-button shadow-md text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 inline">+ PO</a>
    </div>
    <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
        <div class="col-span-10">
            <form method="GET" action="{{ route('purchase-order.search') }}" class="flex">
                <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Purchase Order ID ,Customer ID and Company Name">
                <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
            </form>
        </div>
        <div class="col-span-2">
            <!-- มีเวลาค่อยทำ seachbar-->
            <form action="{{ route('purchase-order.option') }}" method="GET">
                @csrf
                <select name="sort_by" id="sortBy" onchange="this.form.submit()" class="bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="" selected>Choose PO status</option>
                    <option value="notYetComplete">Not yet completed</option>
                    <option value="awaitingPayment">Awaiting payment</option>
                    <option value="PaymentHasBeenMade">Payment has been made</option>
                </select>
            </form>

        </div>

    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-table text-left text-gray-400">
        <thead class="text-table-header uppercase bg-table text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">PO ID</th>
                    <th scope="col" class="px-6 py-3">Customer ID </th>
                    <th scope="col" class="px-6 py-3">Company Name</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Payment Status</th>
                    <th scope="col" class="px-6 py-3 ">Produce Status</th>
                    <th scope="col" class="px-6 py-3 ">Order Date</th>
                    <th scope="col" class="px-6 py-3 ">Delivery Date</th>
                </tr>
            </thead>
            <tbody>
                @if( count($purchaseOrders) === 0 )
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td colspan="9" class="px-6 py-4 text-center font-medium text-gray-900">
                        No Purchase Orders Available
                    </td>
                </tr>
                @endif

                @foreach ($purchaseOrders as $purchaseOrder)
                    <tr onclick="location.href='{{ route('po.show',['po'=> $purchaseOrder]) }}'" class="bg-white border-b hover:bg-gray-50 cursor-pointer">

                    <td class="px-6 py-4 font-medium text-gray-900">{{$purchaseOrder->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{$purchaseOrder->customer->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$purchaseOrder->customer->company_name}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$purchaseOrder->total_order_price}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        @if ($purchaseOrder->payment_status)
                        <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full">Finish</span>
                        @else
                        <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full"> UNFinish</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        @if ($purchaseOrder->produce_status)
                        <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full">Finish</span>
                        @else
                        <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full"> UNFinish</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$purchaseOrder->purchase_date}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$purchaseOrder->due_date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<script>
    // function submit(e){
    //     console.log(e);
    // }
    // var element = document.getElementById('sortBy');
    // console.log(element);
    // var text = element.options[element.selectedIndex].text;
    // console.log(text);
    // .addEventListener('change', function() {
    //     console.log("ku")
    //     // this.form.submit();
    // });
</script>
