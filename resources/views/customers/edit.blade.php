@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Edit Customer Detail</h1>
    </div>
    <div class="">
        <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
            @csrf
            @method('PUT')
            @csrf
            <x-custom-text-input name="company_name" label="Company Name" type="text" placeholder="Company Name Inc." />
            <x-custom-text-input name="purchaser_name" label="Purchaser Name" type="text" placeholder="Name - Surname" />
            <div class="w-1/6">
                <x-custom-text-input name="phone_number" label="Phone No." type="tel" placeholder="0912345678" />
            </div>
            <div class="flex space-x-8">
                <x-submit-button label="Submit" />
                <x-back-button label="Cancel" />
            </div>
        </form>
    </div>
</div>
@endsection
