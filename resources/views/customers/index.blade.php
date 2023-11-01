@extends('layouts.main')

@section('content')
<div>
    <div class="flex">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Customer</h1>
    </div>

    <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
        <div class="col-span-10">
            <form method="GET" action="{{ route('specs.search') }}" class="flex">
                <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Customer ID (ยังไม่ทำrouteSearch)">
                <button type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">Search</button>
            </form>
        </div>
        <div class="col-span-2">
            <form method="GET" action="{{ route('customers.create') }}" class="">
                <button type="submit" class="p-2.5 shadow-md focus:outline-none bg-po-button text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 w-full">+ Customer</button>
            </form>
        </div>

    </div>

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Customer ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Purchaser Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Company Name
                    </th>
                    <th scope="col" class="pl-6 py-3 text-center">
                        Phone Number
                    </th>
                    <th scope="col" class="pl-6 py-3 text-center">
                        Address
                    </th>
                    <th scope="col" class="pl-6 py-3 text-center">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr class="bg-white border-b text-center">
                    <th class="px-6 py-4 font-medium text-gray-900">
                        {{ $customer->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $customer->purchaser_name }}
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $customer->company_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $customer->phone_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a class="p-2 bg-sky-200 shadow-md text-black hover:bg-sky-100 text-md font-bold rounded-lg inline" href="{{ route('customers.show', ['customer' => $customer])}}">Address</a>
                    </td>
                    <td class="pl-6 py-4">
                        <a href="{{ route('customers.edit', $customer) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
