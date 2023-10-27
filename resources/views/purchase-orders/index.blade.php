@extends('layouts.main')

@section('content')
<div>
    <div class="flex justify-between">
        <div class="flex">
            <h1 class="px-1 bg-tag py-1 mr-1"></h1>
            <h1 class="px-1 bg-tag py-1"></h1>
            <h1 class="text-header bg-white rounded-r-lg shadow-md px-5 py-1 inline text-2xl font-bold">Purchase Order</h1>
        </div>
        <button href="{{ route('po.create') }}" class="p-2 bg-po-button shadow-md text-black hover:bg-sky-200 text-md font-bold rounded-lg px-4 inline">+ PO</button>
    </div>
    <div class="grid grid-cols-12 gap-2 mb-6 mt-6 w-full ">
        <div class="col-span-10 flex">
            <input class="border-2 border-cyan-700 bg-white h-10 w-full rounded-l-lg text-sm focus:outline-none" type="search" name="search" placeholder="มีเวลาค่อยทำ">
            <button href="#" type="submit" class="p-2 bg-tag text-white hover:bg-cyan-700 text-base font-semibold rounded-r-lg">search</button>
        </div>
        <div class="col-span-2">
            <!-- มีเวลาค่อยทำ seachbar-->
            <!-- <button href="/po/delete" class="p-2 bg-gray-900 text-white hover:bg-gray-800 text-md font-semibold">ลบใบสั่งซื้อ</button> มีเวลาค่อยทำ เฉพาะยังไม่เปิดใบสั่งขาย -->
            <select id="status" name="status" class="bg-gray-50 border-cyan-700 border-2 text-cyan-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose PO status</option>
                <option value="notYetComplete">Not yet completed</option>
                <option value="awaitingPayment">Awaiting payment</option>
                <option value="PaymentHasBeenMade">Payment has been made</option>
            </select>
        </div>

    </div>


    <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words bg-white rounded-lg">
        <thead class="bg-table">
            <tr class="text-white font-semibold text-sm uppercase text-center">
                <th class="px-6 py-4">รหัสPO</th>
                <th class="px-6 py-4">รหัสลูกค้า </th>
                <th class="px-6 py-4"> ชื่อบริษัท</th>
                <th class="px-6 py-4">ราคา(use + VAT)</th>
                <th class="px-6 py-4">สถานะการจ่ายเงิน</th>
                <th class="px-6 py-4">สถานะการส่งของ</th>
                <th class="px-6 py-4">วันที่สั่ง</th>
                <th class="px-6 py-4">กำหนดส่ง</th>
                <th class="px-6 py-4"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($purchaseOrders as $purchaseOrder)
            <tr class="text-center">
                <td class="px-5 py-4">{{$purchaseOrder->id}}</td>
                <td class="px-5 py-4">{{$purchaseOrder->customer->id}}</td>
                <td class="px-5 py-4">{{$purchaseOrder->customer->company_name}}</td>
                <td class="px-5 py-4">{{$purchaseOrder->total_order_price}}</td>
                <td class="px-5 py-4">
                    @if ($purchaseOrder->produce_status == 0)
                    <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full">UNFinish</span>
                    @else
                    <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full"> Finish</span>
                    @endif
                </td>
                <td class="px-5 py-4 text-center">
                    @if ($purchaseOrder->payment_status == 0)
                    <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full">UNFinish</span>
                    @else
                    <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full"> Finish</span>
                    @endif
                </td>
                <td class="px-5 py-4 text-center">{{$purchaseOrder->purchase_date}}</td>
                <td class="px-5 py-4 text-center">{{$purchaseOrder->due_date}}</td>
                <td class="px-2 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline font-bold">Detail</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection