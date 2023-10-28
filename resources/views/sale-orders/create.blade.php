@extends('layouts.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div>
    <h1 class="text-2xl font-bold mb-6">Create Sale Order</h1>
    <form action="{{ route('so.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="purchaseOrder_id" class="block font-bold mb-2">Select Purchase Order</label>
            <select id="purchaseOrder_id" name="purchaseOrder_id" class="border rounded-lg px-20">
                @foreach($purchaseOrders as $purchaseOrder)
                <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->id }}
                     {{ $purchaseOrder->customer->company_name }}</option>
                
                @endforeach
            </select>
            {{-- {{dd($poItems)}} --}}
        
            <div id="poItemsTable">
                <table id = "poItemsTable" class="">
                    <thead class="text-xs uppercase bg-table text-white">
                        <tr>
                            <th class="px-6 py-3 text-center">SPEC ID</th>
                            <th class="px-6 py-3 text-center"> SPEC NAME</th>
                            <th class="px-6 py-3 text-center"> ORDER QUANTITY</th>
                            <th class="px-6 py-3 text-center"> จำนวนที่ต้องการเบิก (คิดไม่อกก)</th>
                            <th class="px-6 py-3 text-center"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Purchase Order</button>
        </div>
    </form>
</div>

<script>
        window.onload = function() {
        var purchaseOrderId = document.getElementById('purchaseOrder_id').value;
        var poItems = @json($poItems->toArray());
        var filteredPoItems = poItems.filter(function(poItem) {
            return poItem.purchase_order_id == purchaseOrderId;
        });
        displayPoItems(filteredPoItems);
    };
        document.getElementById('purchaseOrder_id').addEventListener('change', function() {
        var purchaseOrderId = this.value;
        var poItems = @json($poItems->toArray());
        var filteredPoItems = poItems.filter(function(poItem) {
            return poItem.purchase_order_id == purchaseOrderId;
        });
        displayPoItems(filteredPoItems);
    });

    function displayPoItems(poItems) {
        var tableHTML = `
            <table id="poItemsTable" class="">
                <thead class="text-xs uppercase bg-table text-white">
                    <tr>
                        <th class="px-6 py-3 text-center">SPEC ID</th>
                        <th class="px-6 py-3 text-center">SPEC NAME</th>
                        <th class="px-6 py-3 text-center">ORDER QUANTITY</th>
                        <th class="px-6 py-3 text-center">จำนวนที่ต้องการเบิก (คิดไม่อกก)</th>
                        <th class="px-6 py-3 text-center"></th>
                    </tr>
                </thead>
                <tbody>
        `;

        poItems.forEach(function(poItem) {
            if (poItem.rope_spec_id && poItem.rope_spec_id) {
                tableHTML += `
                    <tr class="text-center">
                        <td class="px-6 py-4">${poItem.rope_spec_id}</td>
                        <td class="px-6 py-4">${poItem.rope_spec.spec_name}</td>
                        <td class="px-6 py-4">${poItem.remaining_quantity}</td>
                        <td class="px-6 py-4 text-center">
                            <input type="number" id="sale_quantity_${poItem.id}" name="sale_quantity_${poItem.id}" 
                            class="border rounded-lg p-2 mb-2" value="0" min="0" 
                            ${poItem.remaining_quantity === 0 ? 'disabled' : 'value="0"'}>
                        </td>
                        <td class="px-6 py-4 text-center"></td>
                    </tr>
                `;
            }
        });

        tableHTML += `</tbody></table>`;

        document.getElementById('poItemsTable').innerHTML = tableHTML;
    }


</script>
@endsection