@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่มรายการสั่งซื้อ</h1>
    <div class="flex items-center justify-between mb-6 mt-6"> 
    ให้ select ชื่อลค. 
    หลังจากเลือกลูกค้าจะมีให้เลือกที่อยู่ที่ใช้ส่งของ

    เลือก PO_ITEM อาจจะทำ [+] เพิ่มสเปคที่จะสั่งซื้อ
    ให้ select spec  
    เสร็จแล้วเลือกspec กรอกจำนวน

    หลังจากนั้นกด confirm ได้โลด

    ทำsearch ก็ได้ แต่เค้าทำไม่เป็น
    </div>
</div>
@endsection
