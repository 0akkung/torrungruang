@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">รายละเอียดข้อมูลลูกค้า</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
      {{$customer->id}}
      {{$customer->company_name}}
      {{$customer->purchaser_name}}
      {{$customer->phone_number}}
      <a href="/customer/edit"class="btn btn-success">แก้ไขข้อมูล</a>
    </div>
    ที่อยู่ทั้งหมด
    <a href="/customer/add-address" class="btn btn-info">เพิ่มที่อยู่</a>
    <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words 
    bg-white rounded-lg">
      <thead class="bg-gray-900">
        <tr class="text-white font-semibold text-sm uppercase text-center">
          <th class="px-6 py-4"> รหัสที่อยู่</th>
          <th class="px-6 py-4"> รายละเอียด</th>
          <th class="px-6 py-4"></th>
        </tr>
      </thead>
        <tbody class="divide-y divide-gray-200">
          <tr class="text-center">
            <td class="px-5 py-4">A00005</td>
            <td class="px-5 py-4">208/9 ดาวอังคาร</td>
            <td class="px-5 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline font-bold">แก้ไขที่อยู่</a> </td>
          </tr>
        </tbody>
    </table>
</div>
@endsection
