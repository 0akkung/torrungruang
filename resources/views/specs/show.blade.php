@extends('layouts.main')
@section('content')
<div class="flex">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Rope Specification Detail</h1>
</div>
<div class="w-full max-h-[20rem] max-w-sm bg-gray-100 mt-16 border border-gray-200 rounded-lg shadow p-10 flex justify-center">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://i.ibb.co/QNXqLrj/rope-5.png" alt="Rope Image" />
        <h5 class="mb-1 text-xl font-medium text-gray-900">{{$spec->spec_name}}</h5>
        <span class="text-sm text-gray-800">{{$spec->spec_detail}}</span>
        <a href="{{ route('specs.edit', ['spec' => $spec]) }}" class="mt-1 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-cyan-800 rounded-lg hover:bg-cyan-700 focus:ring-2 focus:outline-none focus:ring-cyan-300">Edit</a>
    </div>
</div>

@endsection