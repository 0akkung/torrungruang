@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold mb-10">Add Rope Spec</h1>
    <div>
        <form action="{{ route('specs.store') }}" method="POST">
            @csrf
            <x-custom-text-input name="spec_name" label="Name" type="text" placeholder="Insert Spec Name" />

            <x-text-area name="spec_detail" label="Detail" placeholder="Insert Spec Detail" />

            <x-submit-button label="Submit" />
        </form>
    </div>
</div>
@endsection
