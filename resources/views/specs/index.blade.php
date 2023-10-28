@extends('layouts.main')

@section('content')
    <div class="flex justify-between">
        <div class="flex">
            <h1 class="px-1 bg-tag py-1 mr-1"></h1>
            <h1 class="px-1 bg-tag py-1"></h1>
            <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Rope Specifications</h1>
        </div>
        <a href="{{ route('specs.create') }}"
           class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
            + Spec
        </a>
    </div>
    <form method="GET" action="{{ route('specs.search') }}" class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full ">
        <div class="col-span-10 flex">
            <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search spec name">
            <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
        </div>
    </form>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-table text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Spec ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Spec Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="pl-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($specs as $spec)
                <tr onclick="location.href='{{ route('specs.show', ['spec' => $spec]) }}'"
                    class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $spec->id }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $spec->spec_name }}
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap" title="{{ $spec->spec_detail }}">
                        {{ Str::limit($spec->spec_detail, 50) }}
                    </td>
                    <td class="pl-6 py-4">
                        <a href="{{ route('specs.edit', $spec) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <a href="{{ route('specs.destroy', $spec) }}"
                           onclick="event.preventDefault();
                           if (confirm('Are you sure you want to delete this rope spec?')) {
                               document.getElementById('delete-form-{{ $spec->id }}').submit();
                           }"
                            class="pl-6 font-medium text-red-600 hover:underline">Delete</a>

                        <form id="delete-form-{{ $spec->id }}" action="{{ route('specs.destroy', $spec) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
