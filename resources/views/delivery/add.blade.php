@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่มใบส่งของ</h1>
    <div class="flex items-center justify-between mb-6 mt-6"> 
        ให้ select ใบ SO โดยไม่ต้องโชว์SOดังนี้ 1.SO ที่ยังไม่มีใบสั่งขาย 2.PO PaymentStatus เสร็จสิ้น  3.PO OrderStatus เสร็จสิ้นPaymentStatus เสร็จสิ้น 
        หลังselect จะโชว์ใบSOที่เลือก 
        โชว์ข้อมูลลค. ชื่อบริษัท ที่อยู่ที่ส่ง  ข้อมูลSO (รหัสsoไรงี้)
        โชว์ SO ITEM (รหัสสเปค หน่วย จำนวนที่สั่ง)ด้วย
        หลังจากนั้นกด confirm ได้โลด
        ทำsearch ก็ได้ แต่เค้าทำไม่เป็น
        ***ถ้า POหลัก Remaining_Quantity ใน PO_Item เป็น0 ทั้งหมด หลังกด Produce_Status จะเสร็จสิ้น***
    </div>
</div>
@endsection
