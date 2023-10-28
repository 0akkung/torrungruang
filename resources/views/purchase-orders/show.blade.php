@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Purchase Order Detail</h1>
    โชว์ PO_ITEMด้วย
    <div class="flex items-center justify-between mb-6 mt-6">
        <h1>{{dd($purchaseOrder)}}</h1>
    <div class="btn btn-success">แก้ไขข้อมูล ต้องยังไม่เปิดใบสั่งขายSO เท่านั้น</div>
</div>
@endsection
