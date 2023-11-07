@extends('layouts.main')

@section('content')

<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Purchase Order</h1>
</div>

<form id="poForm" action="{{ route('po.store') }}" method="POST">
    @csrf
    <div class="bg-white p-5 border w-auto rounded-[12px] shadow-md">

        <!-- Due Date -->
        <div class="mb-6">
            <label for="due_date" class="block font-bold mb-2">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="border rounded-lg p-2 mb-2">
            @error('due_date')
            <div class="text-red-400 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Customer -->
        <div class="mb-6">
            <label for="customer_id" class="block font-bold mb-2">Customer</label>
            <select id="customer_id" name="customer_id" class="border rounded-lg px-20" data-addresses="{{ json_encode($customers->pluck('addresses', 'id')) }}">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->company_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Customer Address -->
        <div class="mb-6">
            <label for="address_id" class="block font-bold mb-2">Customer Address</label>
            <select id="address_id" name="address_id" class="border rounded-lg px-20">
                @foreach($selectedCustomer->addresses as $address)
                <option value="{{ $address->id }}">{{ $address->address_detail }}</option>
                @endforeach
            </select>
        </div>

        <!-- Customer PO ID -->
        <div class="mb-6">
            <label for="customer_po_id" class="block font-bold mb-2">Customer PO ID</label>
            <input type="text" id="customer_po_id" name="customer_po_id" class="border rounded-lg p-2 mb-2">
            @error('customer_po_id')
            <div class="text-red-400 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>


        <!-- Note -->
        <x-text-area name="note" label="Note (หมายเหตุ)" placeholder='Insert "-" if no note' />

    </div>


    <div id="specsContainer" class="bg-white p-5 border w-full rounded-[12px] shadow-md mt-5 mb-5">
        <button type="button" onclick="addSpecField()" class="text-white font-semibold p-2 rounded-md bg-cyan-700 mb-2 text-center ">+ Add Spec</button>
    </div>

    <div class="mb-6 flex space-x-8">
        <x-submit-button label="Submit" />
        <x-back-button label="Cancel" />
    </div>

</form>


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

    let specCount = 0;

    function addSpecField() {
        specCount++;
        const container = document.getElementById('specsContainer');
        const div = document.createElement('div');
        div.className = 'mb-4';
        const specId = `poItem-${specCount}`;

        //สร้างลูปให้กดเพิ่มitem น่าจะต้องใช้วิธีนี่แหละ
        div.innerHTML = `
            <div class="bg-gray-100 rounded-lg p-5" id="${specId}">
            <h2 class="text-xl font-semibold mb-2">Spec #${specCount}</h2>
            <label for="po_items[${specCount}][spec_id]" class="block font-bold mb-2">Spec</label>

            <select id="po_items[${specCount}][spec_id]" name="po_items[${specCount}][spec_id]" class="border rounded-lg p-2 mb-2">
                @foreach($specs as $spec)
                    @if (!in_array($spec->id, $selectedSpecs))
                        <option value="{{ $spec->id }}">{{ $spec->id }} - {{ $spec->spec_name }}</option>
                    @endif
                @endforeach
            </select>

            <label for="po_items[${specCount}][order_quantity]" class="block font-bold mb-2">Order Quantity</label>
            <input type="number" id="po_items[${specCount}][order_quantity]" name="po_items[${specCount}][order_quantity]" class="border rounded-lg p-2 mb-2"
            value="0" min="0.1" step="0.1">

            <label for="po_items[${specCount}][unit_price]" class="block font-bold mb-2">Unit Price</label>
            <input type="number" id="po_items[${specCount}][unit_price]" name="po_items[${specCount}][unit_price]" class="border rounded-lg p-2 mb-2"
            value="0" min="0.01" max="5000" step="0.01">

            <label for="po_items[${specCount}][unit]" class="block font-bold mb-2">Unit</label>
            <select id="po_items[${specCount}][unit]" name="po_items[${specCount}][unit]" class="border rounded-lg p-2 mb-2">
                <option value="kilogram">Kilogram</option>
                <option value="meter">Meter</option>
                <option value="roll">Roll</option>
                <option value="reel">Reel</option>
                <option value="coil">Coil</option>
                <option value="piece">Piece</option>
            </select>
                <button type="button" onclick="deletePoItem('${specId}')" class="ml-3">Delete</button>
            </div>
        `;

        container.appendChild(div);
    }
    function deletePoItem(specId) {
        const poItemElement = document.getElementById(specId);
        console.log("Deleting item with ID:", specId);
        if(poItemElement) {
            poItemElement.remove();
            specCount--;
        }
    }

    document.getElementById('poForm').addEventListener('submit', function(event) {
        if (specCount === 0) {
            event.preventDefault(); // Prevent form submission if specCount is 0
            alert('Please add at least one spec before submitting.');
        }
    });
</script>
@endsection
