@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Create Receipt</h1>
    </div>
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
