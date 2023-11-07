@extends('layouts.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Sale Order</h1>
</div>
<div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
    <label for="purchaseOrder_id" class="block font-bold mb-4 text-xl">Select Purchase Order</label>
    <form action="{{ route('sale-order.createOption') }}" method="GET">
        @csrf
        <select id="purchaseOrder_id" name="purchaseOrder_id" onchange="this.form.submit()" class="mt-5 mb-5 bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option value="" selected>Choose PO ID</option>
            @foreach($purchaseOrders as $purchaseOrder)
            <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->id }}</option>
            @endforeach
        </select>
    </form>

    @if ($po)
    <div class="mb-5 mt-5 flex flex-col">

        <div class="grid grid-cols-2 gap-20">
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">PO ID : </span>
                <span class="font-bold ml-3">{{$po->id}}</span>
            </div>
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">CUSTOMER PO ID : </span>
                <span class="font-bold ml-3">{{$po->customer_po_id}}</span>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-20">
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">Customer ID : </span>
                <span class="font-bold ml-3">{{$po->customer->id}}<span>
            </div>
            <div class="text-lg col-span-1 flex">
                <span class="text-gray-600 font-semibold">Company Name : </span>
                <span class="font-bold ml-3">{{$po->customer->company_name}}<span>
            </div>
        </div>

    </div>
    <form action="{{ route('so.store',['purchaseOrder'=> $po]) }}" method="POST">
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
                            <th scope="col" class="px-6 py-3">REMAINING QUANTITY</th>
                            <th scope="col" class="px-6 py-3">ORDER QUANTITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poItems as $poItem)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 font-medium text-gray-900">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$poItem->rope_spec_id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$poItem->ropeSpec->spec_name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $poItem->remaining_quantity }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 ">
                                <input type="number" id="sale_quantity_{{ $poItem->id }}" name="sale_quantity_{{ $poItem->id }}"
                                class="border rounded-lg p-2 mb-2" value="0" min="0" max="{{ $poItem->remaining_quantity }}"
                                {{ $poItem->remaining_quantity === 0 ? 'disabled' : '' }} required>
                            </td>
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
    @endif
</div>

@endsection
