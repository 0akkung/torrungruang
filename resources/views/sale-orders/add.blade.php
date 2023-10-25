@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่มรายการสั่งขาย</h1>
    <div class="flex items-center justify-between mb-6 mt-6"> 
        ให้ select ใบ PO โดยไม่ต้องโชว์POดังนี้ 1.OrderStatus เสร็จสิ้นPaymentStatus เสร็จสิ้น 2. OrderStatusเสร็จ PaymentStatus ไม่เสร็จสิ้น
        หลังselect จะโชว์ใบPOที่เลือก 
        โชว์ข้อมูลลค. ชื่อบริษัท ที่อยู่ที่ส่ง  ข้อมูลPO (รหัสpoไรงี้)
        โชว์ PO ITEM (รหัสสเปค หน่วย จำนวนที่สั่ง)ด้วย
        โดยมีช่องให้กรอกเพิ่มว่า จะเปิดใบสั่งขายแต่ละสเปคจำนวนเท่าไหร่ เช็คว่าห้ามเกินกว่าที่มีในใบสั่งขายที่เหลือ(Remaining_Quantity) ด้วย
        หลังจากนั้นกด confirm ได้โลด
        ทำsearch ก็ได้ แต่เค้าทำไม่เป็น
    </div>
</div>
@endsection
