@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Sale Order Detail</h1>
  
    <div class="items-center justify-between mb-6 mt-6">
        
        <h1>รหัสใบสั่งขาย SO {{$saleOrder->id}}</h1>
        <span>วันที่ {{$saleOrder->sale_date}}</span>
        <h1>รหัสใบสั่งซื้อ PO {{$purchaseOrder->id}}</h1>
        <h1>ชื่อบริษัท {{$customer->company_name}}</h1> 
        <span>รหัสPO ลูกค้า {{$purchaseOrder->customer_po_id}}</span>


        ที่อยู่อาจจะใส่

    <div>
        รายละเอียด
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-table text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">SPEC ID</th>
                    <th scope="col" class="px-6 py-3 text-center">SPEC NAME</th>
                    <th scope="col" class="px-6 py-3 text-center">QUANTITY</th>
                    <th scope="col" class="px-6 py-3 text-center">UNIT</th>
                    <th scope="col" class="px-6 py-3 text-center">PRICE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($soItems as $soItem)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900">{{$soItem->rope_spec_id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{$soItem->ropeSpec->spec_name}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$soItem->sale_quantity}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        @foreach ($soItem->saleOrder->purchaseOrder->poItems as $poItem)
        @if ($poItem->rope_spec_id == $soItem->rope_spec_id)
            {{ $poItem->unit_price }}
            @break
        @endif
    @endforeach
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$soItem->so_item_price}}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>




    <div class="btn btn-success">แก้ไขข้อมูล ต้องยังไม่เปิดใบสั่งขายSO เท่านั้น</div>
</div>
@endsection
