@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">ลบรายการสั่งซื้อ</h1>
    <div class="flex items-center justify-between mb-6 mt-6"> 
    ให้ select รหัสใบ PO อาจจะให้กรอกชื่อลค. จะแสดงเฉพาะpo ที่ยังไม่ได้เปิดใบสั่งขายเท่านั้น
    โชว์ข้อมูลลค. ชื่อบริษัท ที่อยู่  ข้อมูลPO (รหัสpoไรงี้)
    โชว์ PO ITEM (รหัสสเปค หน่วย จำนวนที่สั่ง)ด้วย
    มี confirm ลบ กดจำนวนได้โลด
    หลังจากนั้นกด confirm ได้โลด

    ทำsearch ก็ได้ แต่เค้าทำไม่เป็น
    </div>
</div>
@endsection
