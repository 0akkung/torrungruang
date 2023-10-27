@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่ม Spec เชือก</h1>
    <div>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <x-custom-text-input name="company_name" label="Company Name" type="text" placeholder="Company Name Inc." />
            <x-custom-text-input name="purchaser_name" label="Purchaser Name" type="text" placeholder="Name - Surname" />
            <div class="w-1/6">
                <x-custom-text-input name="phone_number" label="Phone No." type="text" placeholder="0912345678" />
            </div>
            <x-submit-button label="Submit" />
        </form>
    </div>
</div>
@endsection
