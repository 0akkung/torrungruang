@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Invoice</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        <div class="join">
            <button class="btn join-item btn-error ">ยังไม่เสร็จสิ้น</button>
            <button class="btn join-item btn-success">เสร็จสิ้น</button>
        </div>
        <span class="mr-64 flex items-center">
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 ml-8 rounded-lg text-sm focus:outline-none"
               type="search" name="search" placeholder="มีเวลาค่อยทำ">
            </div>
            <a href="#" type="submit" class="ml-4 mr-4 mt-2 text-purple-800 hover:underline text-lg">ค้นหา</a>
        </span>
        <span class="flex space-x-2 items-center">
            <a href="/invoice/add" class="btn btn-success font-semi-bold">เพิ่มใบวางบิล</a>
    <!-- <div class="btn btn-error font-semi-bold">ลบใบสั่งซื้อ</div>  -->
        </span>
    </div>
    <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words bg-white rounded-lg">
        <thead class="bg-gray-900">
          <tr class="text-white font-semibold text-sm uppercase text-center">
            <th class="px-6 py-4"> รหัสใบวางบิล</th>
            <th class="px-6 py-4"> รหัสPO</th>
            <th class="px-6 py-4"> รหัสลูกค้า </th>
            <th class="px-6 py-4"> ชื่อบริษัท</th>
            <th class="px-6 py-4">ราคา(use + VAT)</th>
            <th class="px-6 py-4">วันที่</th>
            <th class="px-6 py-4">กำหนดวันจ่ายเงิน</th>
            <th class="px-6 py-4"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="text-center">
                <td class="">I00024</td>
                <td class="">P00075</td>
                <td class="px-5 py-4">C00005</td>
                <td class="px-5 py-4">หจก.สมโชค จำกัด</td>
                <td class="px-5 py-4">5,000,000</td>
                <td class="px-5 py-4 text-center">17/06/2569 </td>
                <td class="px-5 py-4 text-center">27/08/2569 </td>
                <td class="px-2 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline font-bold">Detail</a> </td>
            </tr>
        </tbody>
  </table>
</div>
@endsection
