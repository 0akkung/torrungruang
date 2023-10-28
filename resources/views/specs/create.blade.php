@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1 rounded-l-md"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold">Add Rope Spec</h1>
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1 rounded-r-md"></h1>
    </div>
    <div>
        <form action="{{ route('specs.store') }}" method="POST">
            @csrf
            <x-custom-text-input name="spec_name" label="Name" type="text" placeholder="Insert Spec Name" />

            <x-text-area name="spec_detail" label="Detail" placeholder="Insert Spec Detail" />

            <div class="flex space-x-8">
                <x-submit-button label="Submit" />
                <x-back-button label="Cancel" />
            </div>
        </form>
    </div>
</div>
@endsection