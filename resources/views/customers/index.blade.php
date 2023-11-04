@extends('layouts.main')

@section('content')
<div class="flex">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Customer</h1>
</div>

<div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full">
    <div class="col-span-10">
        <form method="GET" action="{{ route('customers.search') }}" class="flex">
            <input type="search" class="border-2 border-cyan-700 bg-white h-11 w-full rounded-l-lg text-sm focus:outline-none" name="search" placeholder="Search Customer Name or Company">
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
        <thead class="text-xs uppercase bg-table text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Customer ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Purchaser Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Company Name
                </th>
                <th scope="col" class="pl-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="pl-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if( count($customers) === 0 )
            <tr class="bg-white border-b hover:bg-gray-50">
                <td colspan="6" class="px-6 py-4 text-center font-medium text-gray-900">
                    No Customers Available
                </td>
            </tr>
            @endif
            @foreach ($customers as $customer)
            <tr onclick="location.href='{{ route('customers.show', ['customer' => $customer]) }}'" class="bg-white border-b hover:bg-gray-50 cursor-pointer">
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
                <td class="pl-6 py-4">
                    <a href="{{ route('customers.edit', $customer) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection