@extends('layouts.main')
@section('content')
<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Invoice</h1>
</div>
<div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="purchaseOrder_id" class="block font-bold mb-4">Select Purchase Order</label>
            <select id="purchaseOrder_id" name="purchaseOrder_id" class="border rounded-lg px-20 mb-4">
                @foreach($purchaseOrders as $purchaseOrder)
                    <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->id }}</option>    
                @endforeach
            </select>
            <div id="poShow"></div>
            <div id="poItemsTable">
                <table id = "poItemsTable" class="">
                    <thead class="text-xs uppercase bg-table text-white">
                        <tr>
                            <th class="px-6 py-3 text-center">NO.</th>
                            <th class="px-6 py-3 text-center">SPEC ID</th>
                            <th class="px-6 py-3 text-center"> SPEC NAME</th>
                            <th class="px-6 py-3 text-center"> QUANTITY</th>
                            <th class="px-6 py-3 text-center"> UNIT</th>
                            <th class="px-6 py-3 text-center">UNIT PRICE</th>
                            <th class="px-6 py-3 text-center">PRICE</th>
                        </tr>
                    </thead>
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
