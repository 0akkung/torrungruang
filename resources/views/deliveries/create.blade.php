@extends('layouts.main')
@section('content')
<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Delivery Note</h1>
</div>
<div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
    <label for="saleOrder_id" class="block font-bold mb-4 text-xl">Select Sale Order</label>

    <form action="{{ route('delivery.option') }}" method="GET">
        @csrf
        <select name="search_by_delivery" id="sortByDelivery" onchange="this.form.submit()" class="mt-5 mb-5 bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="" selected>Choose SO ID</option>
            @foreach($saleOrders as $saleOrder)
            <option value="{{ $saleOrder->id }}" data-customer="{{ $saleOrder->purchaseOrder->customer }}" data-purchaseorder="{{$saleOrder->purchaseOrder}}">
                {{ $saleOrder->id }}
            </option>
            @endforeach
        </select>
    </form>
    <!-- <div id="soShow" class="mb-5 mt-5"></div> -->
    <div class="mb-5 mt-5 flex flex-col">
        @if ($so)
        <div class="grid grid-cols-2 gap-20">
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">SO ID : </span>
                <span class="font-bold ml-3">{{$so->id}}<span>
            </div>
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">PO ID : </span>
                <span class="font-bold ml-3">{{$so->purchaseOrder->id}}<span>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-20">
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">Customer ID : </span>
                <span class="font-bold ml-3">{{$so->purchaseOrder->customer->id}}<span>
            </div>
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">Company Name : </span>
                <span class="font-bold ml-3">{{$so->purchaseOrder->customer->company_name}}<span>
            </div>
        </div>
        @endif
    </div>
    <form action="{{ route('deliveries.store',['saleOrder'=> $so]) }}" method="POST">
        @csrf
        <div class="mb-6">
            <div>
                <div class="p-2 bg-table text-white font-bold text-lg text-center rounded-t-lg">
                    Description
                </div>
                <hr class="border-2 border-gray-300">
                <table class="w-full text-table text-left text-gray-400">
                    <thead class="text-table-header uppercase bg-table text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">NO.</th>
                            <th scope="col" class="px-6 py-3">SPEC ID</th>
                            <th scope="col" class="px-6 py-3">SPEC NAME</th>
                            <th scope="col" class="px-6 py-3">QUANTITY</th>
                            <th scope="col" class="px-6 py-3">UNIT</th>
                            <th scope="col" class="px-6 py-3">UNIT PRICE</th>
                            <th scope="col" class="px-6 py-3">amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soItems as $soItem)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 font-medium text-gray-900">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$soItem->rope_spec_id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$soItem->ropeSpec->spec_name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$soItem->sale_quantity}}</td>
                            @foreach ($soItem->saleOrder->purchaseOrder->poItems as $poItem)
                            @if ($poItem->rope_spec_id == $soItem->rope_spec_id)
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $poItem->unit }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $poItem->unit_price }}
                            </td>

                            @break
                            @endif
                            @endforeach

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$soItem->so_item_price}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-6 flex space-x-8">
            <x-submit-button label="Submit" />
            <x-back-button label="Cancel" />
        </div>
    </form>
</div>
@endsection