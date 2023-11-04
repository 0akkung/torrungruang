@extends('layouts.main')
@section('content')
<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Delivery Note</h1>
</div>
<div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
    <form action="{{ route('deliveries.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="saleOrder_id" class="block font-bold mb-4 text-xl">Select Sale Order</label>
            <select id="saleOrder_id" name="saleOrder_id" class="border rounded-lg px-20 mb-4">
                @foreach($saleOrders as $saleOrder)
                    <option value="{{ $saleOrder->id }}" data-customer="{{ $saleOrder->purchaseOrder->customer }}" 
                        data-purchaseOrder="{{$saleOrder->purchaseOrder}}"> 
                        {{ $saleOrder->id }}</option>    
                @endforeach
            </select>
            <div id="soShow"></div>
            <div id="soItemsTable">
                <table id = "soItemsTable" class="">
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
<script>
    window.onload = function() {
    var selectElement = document.getElementById("saleOrder_id");
    var selectedValueElement = document.getElementById("soShow");

    selectElement.addEventListener("change", function() {
        var selectedValue = selectElement.value;
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var customer = JSON.parse(selectedOption.getAttribute("data-customer"));
        var purchaseOrder = JSON.parse(selectedOption.getAttribute("data-purchaseOrder"));
    
        var htmlContent = `
        <div class="flex">
            <div class="text-lg">
                <span class="text-gray-600 font-semibold">SO ID : </span> 
                <span class="font-bold ml-3">${selectedValue}<span>
            </div>
            <div class="text-lg ml-48">
                <span class="text-gray-600 font-semibold">PO ID : </span> 
                <span class="font-bold ml-3">${purchaseOrder.id}<span>
            </div>
        </div>
        <div class="flex mb-5">
            <div class="text-lg">
                <span class="text-gray-600 font-semibold">Customer ID : </span> 
                <span class="font-bold ml-3"> ${customer.id}<span>
            </div>
            <div class="text-lg ml-36">
                <span class="text-gray-600 font-semibold">Company Name : </span> 
                <span class="font-bold ml-3">${customer.company_name}<span>
            </div>
        </div>
    `;
    selectedValueElement.innerHTML = htmlContent;
    });
};

</script>
@endsection
