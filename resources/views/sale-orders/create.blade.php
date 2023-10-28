@extends('layouts.main')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Sale Order</h1>
    </div>
    <form action="{{ route('so.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="purchaseOrder_id" class="block font-bold mb-2">Select Purchase Order</label>
            <select id="purchaseOrder_id" name="purchaseOrder_id" class="border rounded-lg px-20">
                @foreach($purchaseOrders as $purchaseOrder)
                    <option value="{{ $purchaseOrder->id }}">{{ $purchaseOrder->id }} {{ $purchaseOrder->customer->company_name }}</option>
                @endforeach
            </select>
            {{-- {{dd($poItems)}} --}}
        
            <div id="poItemsTable">
                <table id = "poItemsTable">
                </table>
            </div>
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Purchase Order</button>
        </div>
    </form>
</div>

<script>
    
    document.getElementById('purchaseOrder_id').addEventListener('change', function() {
        var purchaseOrderId = this.value;
        var poItems = @json($poItems->toArray());
        var filteredPoItems = poItems.filter(function(poItem) {
            return poItem.purchase_order_id == purchaseOrderId;
        });
        displayPoItems(filteredPoItems);
    });
    function displayPoItems(poItems) {
        // console.log(poItems); // แสดงข้อมูลใน Developer Console  ผ่าน

        var tableBody = document.createElement('tbody');

        poItems.forEach(function(poItem) {
            console.log(poItem);

            var row = document.createElement('tr');
            row.classList.add('text-center');

            if (poItem.rope_spec_id && poItem.rope_spec_id) {

                row.innerHTML = `
                
                <td class="px-5 py-4">${poItem.rope_spec_id}</td>
                <td class="px-5 py-4">${poItem.rope_spec.spec_name}</td>
                <td class="px-5 py-4">${poItem.remaining_quantity}</td>
                <td class="px-2 py-4 text-center">
                    <label for="sale_quantity_${poItem.id}" class="block font-bold mb-2"></label>
                    <input type="number" id="sale_quantity_${poItem.id}" name="sale_quantity_${poItem.id}" class="border rounded-lg p-2 mb-2">
                </td>
                `;
            } 

            tableBody.appendChild(row);
        });

        var poItemsTable = document.getElementById('poItemsTable');
        poItemsTable.innerHTML = '';
        poItemsTable.appendChild(tableBody);
    }

</script>

@endsection
