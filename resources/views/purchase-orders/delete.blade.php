@extends('layouts.main')
@section('content')
<div>
    <div class="flex mb-5">
        <h1 class="px-1 bg-tag py-1 mr-1"></h1>
        <h1 class="px-1 bg-tag py-1"></h1>
        <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Delete Purchase Order</h1>
    </div>
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
