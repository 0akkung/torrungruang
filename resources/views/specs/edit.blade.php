@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold mb-10">Edit Rope Spec</h1>
    <div>
        <form action="{{ route('specs.update', ['spec' => $spec]) }}" method="POST">
            @csrf
            @method('PUT')
            <x-custom-text-input name="spec_name" label="Name" type="text" placeholder="Insert Spec Name"
                                 value="{{ old('spec_name', $spec->spec_name) }}" />

            <x-text-area name="spec_detail" label="Detail" placeholder="Insert Spec Detail"
                         value="{{ old('spec_detail', $spec->spec_detail) }}" />

            <x-submit-button label="Submit Form" />
        </form>
    </div>
</div>
@endsection
