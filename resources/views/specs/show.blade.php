@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">รายละเอียด Spec เชือก</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        {{$spec->id}}
        {{$spec->spec_name}}
        {{$spec->spec_detail}}
    </div>
    <a href="{{ route('specs.edit', ['spec' => $spec]) }}" class="btn btn-success">แก้ไขข้อมูล</a>
</div>
@endsection
