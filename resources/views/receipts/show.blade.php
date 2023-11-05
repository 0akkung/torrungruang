@extends('layouts.main')
@section('content')
<div class="flex mb-5 justify-between">
    <div class="flex">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Receipt Detail</h1>
    </div>
    <div>
        <div class="flex">
            <a href="{{ route('receipts.printPDF',['receipt'=> $receipt]) }}" class="p-2 bg-po-button shadow-md text-black hover:bg-yellow-500 text-md font-bold rounded-lg px-4 inline">+ PDF</a>
        </div>
    </div>
</div>
<div class="w-full">
    <div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
        <div>
            <div class="grid grid-cols-4 mb-6 mt-6 text-lg font-semibold">
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 text-sm font-semibold">Receipt ID</p>
                    <p>{{$receipt->id}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Date</p>
                    <p>{{$purchaseOrder->purchase_date}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Company Name</p>
                    <p>{{$customer->company_name}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Original PO ID</p>
                    <p>{{$purchaseOrder->customer_po_id}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Purchaser</p>
                    <p>{{$customer->purchaser_name}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Tel</p>
                    <p>{{$customer->phone_number}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Shipping address</p>
                    <p>{{$address->address_detail}}</p>
                </div>
            </div>
            <div>
                <div class="p-2 bg-table text-white font-bold text-lg text-center rounded-t-lg">
                    Description
                </div>
                <hr class="border-2 border-gray-300">
                <table class="w-full text-sm text-left text-gray-400 rounded-lg">
                    <thead class="text-xs uppercase bg-table text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">NO.</th>
                            <th scope="col" class="px-6 py-3 text-center">SPEC ID</th>
                            <th scope="col" class="px-6 py-3 text-center">SPEC NAME</th>
                            <th scope="col" class="px-6 py-3 text-center">QUANTITY</th>

                            <th scope="col" class="px-6 py-3 text-center">UNIT</th>
                            <th scope="col" class="px-6 py-3 text-center">UNIT PRICE</th>
                            <th scope="col" class="px-6 py-3 text-center">amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poItems as $poItem)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 font-medium text-gray-900">{{$loop->iteration}}</td>
                            <td class="px-6 py-3 font-medium text-gray-900">{{$poItem->rope_spec_id}}</td>
                            <td class="px-6 py-3 font-medium text-gray-900">{{$poItem->ropeSpec->spec_name}}</td>
                            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->order_quantity}}</td>

                            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->unit}}</td>
                            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->unit_price}}</td>
                            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{$poItem->po_item_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-lg font-semibold flex flex-col space-y-5 mb-2 mt-1">
                <div>Note&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->note}}</div>
                <div>Total price&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->original_order_price}}&nbsp;Baht</div>
                <div>Price Inclusive of 7% VAT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->total_order_price}}&nbsp;Baht</div>
                <div>Recipient&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$receipt->receipter_name}}</div>
            </div>
            
        </div>
    </div>
</div>

@endsection