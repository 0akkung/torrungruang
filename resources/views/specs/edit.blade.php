@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Edit Rope Spec</h1>
    </div>
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
