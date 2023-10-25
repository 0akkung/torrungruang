@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Receipt (โชว์หน้าละ 5 ถ้าทำทัน)</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        <div class="flex items-center">
            <h1 class="text-xl">จำนวนทั้งหมด</h1>
            <span class="text-xl ml-10">รายการ</span>
        </div>
        <span class="mr-80 flex items-center">
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 ml-8 rounded-lg text-sm focus:outline-none"
                   type="search" name="search" placeholder="Search">
            </div>
            <a href="#" type="submit" class="ml-4 mr-4 mt-2 text-purple-800 hover:underline text-lg">ค้นหา</a>
        </span>
    </div>

  <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words bg-white rounded-lg">
    <thead class="bg-gray-900">
      <tr class="text-white font-semibold text-sm uppercase text-center">
        <th class="px-6 py-4"> รหัสใบเสร็จ</th>
        <th class="px-6 py-4"> รหัสPO </th>
        <th class="px-6 py-4"> รหัสลูกค้า</th>
        <th class="px-6 py-4"> ชื่อบริษัท</th>
        <th class="px-6 py-4">ราคา(use + VAT)</th>
        <th class="px-6 py-4">วันที่</th>
        <th class="px-6 py-4"></th>
      </tr>
    </thead>
      <tbody class="divide-y divide-gray-200">
        <tr class="text-center">
            <td class="">R00075</td>
            <td class="">P00075</td>
            <td class="px-5 py-4">C00005</td>
            <td class="px-5 py-4">หจก.สมโชค จำกัด</td>
            <td class="px-5 py-4">13,000,000.25</td>
            <td class="px-5 py-4 text-center">17/06/2569 </td>
            <td class="px-2 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline font-bold">Detail</a> </td>
        </tr>
      </tbody>
  </table>
</div>
@endsection
