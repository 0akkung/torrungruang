@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่มใบเสร็จ</h1>
    <div class="flex items-center justify-between mb-6 mt-6"> 
        ให้ select ใบ PO โดยไม่ต้องโชว์POดังนี้ 1.PO ไม่มีใบวางบิล 2.PO PaymentStatus เสร็จสิ้น 
        หลังselect จะโชว์ใบPOที่เลือก 
        โชว์ข้อมูลลค. ชื่อบริษัท ที่อยู่ที่ส่ง  ข้อมูลSO (รหัสpoไรงี้)
        โชว์ PO ITEM (รหัสสเปค หน่วย จำนวนที่สั่ง)ด้วย
        หลังจากนั้นกด confirm ได้โลด
        ทำsearch ก็ได้ แต่เค้าทำไม่เป็น
        **หลังกด PaymentStatus จะเสร็จ**
    </div>
</div>
@endsection
