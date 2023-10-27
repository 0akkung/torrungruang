@extends('layouts.main')

@section('content')
    <h1 class="text-2xl text-center font-bold">Spec</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        <div class="flex items-center">

        </div>
        <!-- มีเวลาค่อยทำ search bar-->
        <span class="mr-24 flex items-center">
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16  rounded-lg text-sm focus:outline-none"
                       type="search" name="search" placeholder="Search">
            </div>
            <a href="#" type="submit" class="ml-4 mt-2 text-purple-800 hover:underline text-lg">Search</a>
        </span>
        <span class="flex space-x-2 items-center">
            <a href="{{ route('specs.create') }}"
               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Add
            </a>
        </span>
    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
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
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $spec->id }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $spec->spec_name }}
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $spec->spec_detail }}
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
