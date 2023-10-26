@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Create Purchase Order</h1>

    <form action="{{ route('po.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            
            <label for="due_date" class="block font-bold mb-2">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="border rounded-lg p-2 mb-2">

            <!-- Customer ทำ search ด้วยไม่เป็น-->
            <label for="customer_id" class="block font-bold mb-2">Customer</label>
            <select id="customer_id" name="customer_id" class="border rounded-lg px-20">
                @foreach($customers as $customer)
                    <option class="" value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                @endforeach
            </select>

            <label for="customer_po_id" class="block font-bold mb-2">Customer PO ID</label>
            <input type="text" id="customer_po_id" name="customer_po_id" class="border rounded-lg p-2 mb-2">

            <!-- RopeSpec ทำ search ด้วยไม่เป็น-->
            <label for="rope_spec_id" class="block font-bold mb-2">RopeSpec</label>
            <select id="rope_spec_id" name="rope_spec_id" class="border rounded-lg p-2 mb-2 w-full">
                @foreach($specs as $spec)
                    <option value="{{ $spec->id }}">{{ $spec->id }} - {{ $spec->spec_name }}</option>
                @endforeach
            </select>

            
        </div>

        <!-- PoItem Fields -->
        <div id="poItemsContainer">
            <!-- PoItem fields will be added here dynamically -->
        </div>

        <button type="button" onclick="addPoItemField()">Add PoItem</button>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Purchase Order</button>
        </div>
    </form>
</div>

<script>   //dont ask me about this part please i Just searched
    let poItemCount = 0;

    function addPoItemField() {
        poItemCount++;

        const container = document.getElementById('poItemsContainer');

        const div = document.createElement('div');
        div.className = 'mb-4';

        div.innerHTML = `
            <h2 class="text-xl font-semibold mb-2">Po Item #${poItemCount}</h2>
            <label for="po_items[${poItemCount}][order_quantity]" class="block font-bold mb-2">Order Quantity</label>
            <input type="number" id="po_items[${poItemCount}][order_quantity]" name="po_items[${poItemCount}][order_quantity]" class="border rounded-lg p-2 mb-2">
            <label for="po_items[${poItemCount}][unit_price]" class="block font-bold mb-2">Unit Price</label>
            <input type="number" id="po_items[${poItemCount}][unit_price]" name="po_items[${poItemCount}][unit_price]" class="border rounded-lg p-2 mb-2">

        `;

        container.appendChild(div);
    }
</script>
@endsection
