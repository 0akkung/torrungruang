@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">รายละเอียด Spec เชือก</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
    รหัส spec
    ชื่อ SPEC
    ราคาต่อหน่วย
    ดีเทล
    <a href="/spec/edit" class="btn btn-success">แก้ไขข้อมูล</a>
</div>
@endsection
