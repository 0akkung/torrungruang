@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Purchase Order</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        <div class="join">
            <button class="btn join-item btn-error ">ยังไม่เสร็จสิ้น</button>
            <button class="btn join-item btn-warning">รอจ่ายเงิน</button>
            <button class="btn join-item btn-success">เสร็จสิ้น</button>
        </div>
            <!-- มีเวลาค่อยทำ seacrbar-->
        <span class="mr-8 flex items-center">
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 ml-8 rounded-lg text-sm focus:outline-none"
                   type="search" name="search" placeholder="มีเวลาค่อยทำ">
            </div>
        <a href="#" type="submit" class="ml-4 mr-4 mt-2 text-purple-800 hover:underline text-lg">ค้นหา</a>
        </span>
        <span class="flex space-x-2 items-center">
            <a href="{{ route('po.create') }}" class="btn btn-success font-semi-bold">เพิ่มใบสั่งซื้อ</a>
            <a href="/po/delete" class="btn btn-error font-semi-bold">ลบใบสั่งซื้อ</a> <!-- มีเวลาค่อยทำ เฉพาะยังไม่เปิดใบสั่งขาย -->
        </span>
    </div>

    <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words bg-white rounded-lg">
        <thead class="bg-gray-900">
            <tr class="text-white font-semibold text-sm uppercase text-center">
                <th class="px-6 py-4"> รหัสPO</th>
                <th class="px-6 py-4"> รหัสลูกค้า </th>
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
    <a th:href="@{/purchaseOrder/add}" class="btn btn-primary">PO ADD (ชั่วคราว)</a>
    <a th:href="@{/purchaseOrder/detail}" class="btn btn-primary">PO DETAIL (ชั่วคราว)</a>
</div>
@endsection
