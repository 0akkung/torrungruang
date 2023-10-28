@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-8">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Add Address</h1>
    </div>
    <div>
        <form action="{{ route('customers.storeAddress', ['customer' => $customer]) }}" method="POST">
            @csrf
            <x-text-area name="address_detail" label="Address Detail" placeholder="Insert Address Detail" />

            <div class="flex space-x-8">
                <x-submit-button label="Submit" />
                <x-back-button label="Cancel" />
            </div>
        </form>
    </div>
</div>
@endsection