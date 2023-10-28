@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Purchase Order Detail</h1>
    <div>
        <h1>รหัสใบสั่งซื้อ PO {{$purchaseOrder->id}}</h1>
        <span>วันที่สั่ง {{$purchaseOrder->purchase_date}}</span>
        <span>กำหนดส่ง{{$purchaseOrder->due_date}}</span>
        <h1>ชื่อบริษัท{{$customer->company_name}}</h1> 
        <span>รหัสPO ลูกค้า {{$purchaseOrder->customer_po_id}}</span>
        <h1>ชื่อผู้จัดซื้อ{{$customer->purchaser_name}}</h1> 
        <h1>เบอร์โทรศัพท์{{$customer->phone_number}}</h1> 
        <h1>ที่อยู่ที่ส่งในใบPO (รอ sir oak)></h1> 

    </div>
    รายละเอียด
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-table text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">SPEC ID</th>
                    <th scope="col" class="px-6 py-3 text-center">SPEC NAME</th>
                    <th scope="col" class="px-6 py-3 text-center">QUANTITY</th>
                    <th scope="col" class="px-6 py-3 text-center">REMANINIG QUANTITY</th>
                    <th scope="col" class="px-6 py-3 text-center">UNIT</th>
                    <th scope="col" class="px-6 py-3 text-center">UNIT PRICE</th>
                    <th scope="col" class="px-6 py-3 text-center">PRICE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poItems as $poItem)
                <tr class="bg-white border-b">
                    <td class="px-6 py-3 font-medium text-gray-900">{{$poItem->rope_spec_id}}</td>
                    <td class="px-6 py-3 font-medium text-gray-900">{{$poItem->ropeSpec->spec_name}}</td>
                    <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->order_quantity}}</td>
                    <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->remaining_quantity}}</td>
                    <td class="px-6 py-3 font-medium text-gray-900">เก็บไว้ให้คิด</td>
                    <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->unit_price}}</td>
                    <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->po_item_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <div>ราคาทั้งหมด {{$purchaseOrder->original_order_price}}</div>
            <div>ราคาหลังรวมVAT 7% {{$purchaseOrder->total_order_price}}</div>
        </div>
        <div>
            สถานะการส่งของ 
            @if($purchaseOrder->produce_status == 0)
                <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full">UNFinish</span>
            @else
                <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full">Finish</span>
            @endif
        </div>
        <div>
            สถานะการจ่ายเงิน
            @if($purchaseOrder->payment_status == 0)
                <span class="text-white text-sm w-1/3 pb-2 bg-red-600 font-semibold px-2 py-2 rounded-full">UNFinish</span>
            @else
                <span class="text-white text-sm w-1/3 pb-2 bg-green-600 font-semibold px-2 py-2 rounded-full">Finish</span>
            @endif

        </div>
        <div class="btn btn-success">แก้ไขข้อมูล ต้องยังไม่เปิดใบสั่งขายSO เท่านั้น</div>
</div>
@endsection
