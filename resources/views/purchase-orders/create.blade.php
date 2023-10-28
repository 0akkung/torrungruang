@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Purchase Order</h1>
    </div>

    <form action="{{ route('po.store') }}" method="POST">
        @csrf
        <div class="mb-6">

            <label for="due_date" class="block font-bold mb-2">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="border rounded-lg p-2 mb-2">

            {{-- Customer ทำ search ด้วยไม่เป็น --}}


            <label for="customer_id" class="block font-bold mb-2">Customer</label>
            <select id="customer_id" name="customer_id" class="border rounded-lg px-20" data-addresses="{{ json_encode($customers->pluck('addresses', 'id')) }}">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                @endforeach

            </select>

            <label for="address_id" class="block font-bold mb-2">Customer Address</label>
            <select id="address_id" name="address_id" class="border rounded-lg px-20">
                @foreach($selectedCustomer->addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->address_detail }}</option>
                @endforeach
            </select>




            <label for="customer_po_id" class="block font-bold mb-2">Customer PO ID</label>
            <input type="text" id="customer_po_id" name="customer_po_id" class="border rounded-lg p-2 mb-2">

            <label for="customer_po_id" class="block font-bold mb-2">Note: (หมายเหตุ)</label>
            <input type="text" id="note" name="note" class="border rounded-lg p-2 mb-2">
        </div>
        <div id="poItemsContainer">
        </div>
        <button type="button" onclick="addPoItemField()">Add PoItem</button>
        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Purchase Order</button>
        </div>
    </form>
</div>

<script>
    const customerSelect = document.getElementById('customer_id');
    const addressSelect = document.getElementById('address_id');
    const addressesData = JSON.parse(customerSelect.getAttribute('data-addresses'));

    customerSelect.addEventListener('change', function() {
        const customerId = this.value;
        const addresses = addressesData[customerId];

        addressSelect.innerHTML = '';
        addresses.forEach(address => {
            const option = document.createElement('option');
            option.value = address.id;
            option.textContent = address.address_detail;
            addressSelect.appendChild(option);
        });
    });

    let poItemCount = 0;

    function addPoItemField() {
        poItemCount++;

        const container = document.getElementById('poItemsContainer');

        const div = document.createElement('div');
        div.className = 'mb-4';

        div.innerHTML = `
            <h2 class="text-xl font-semibold mb-2">Po Item #${poItemCount}</h2>
            <label for="po_items[${poItemCount}][spec_id]" class="block font-bold mb-2">Spec</label>
            <select id="po_items[${poItemCount}][spec_id]" name="po_items[${poItemCount}][spec_id]" class="border rounded-lg p-2 mb-2">
                @foreach($specs as $spec)
                    @if (!in_array($spec->id, $selectedSpecs))
                        <option value="{{ $spec->id }}">{{ $spec->id }} - {{ $spec->spec_name }}</option>
                    @endif
                @endforeach
            </select>
            <label for="po_items[${poItemCount}][order_quantity]" class="block font-bold mb-2">Order Quantity</label>
            <input type="number" id="po_items[${poItemCount}][order_quantity]" name="po_items[${poItemCount}][order_quantity]" class="border rounded-lg p-2 mb-2"
            value="0" min="0" step="0.01">
            <label for="po_items[${poItemCount}][unit_price]" class="block font-bold mb-2">Unit Price</label>
            <input type="number" id="po_items[${poItemCount}][unit_price]" name="po_items[${poItemCount}][unit_price]" class="border rounded-lg p-2 mb-2"
            value="0" min="0" step="0.01">
            <label for="po_items[${poItemCount}][unit]" class="block font-bold mb-2">Unit</label>
            <select id="po_items[${poItemCount}][unit]" name="po_items[${poItemCount}][unit]" class="border rounded-lg p-2 mb-2">
                <option value="kilogram">Kilogram</option>
                <option value="meter">Meter</option>
                <option value="roll">Roll</option>
                <option value="reel">Reel</option>
                <option value="coil">Coil</option>
                <option value="piece">Piece</option>
            </select>
        `;

        container.appendChild(div);
    }
</script>
@endsection
