@extends('layouts.main')
@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">เพิ่ม Spec เชือก</h1>
    <div>
        <form action="{{ route('specs.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-600">Spec Name</label>
                <input type="text" id="spec_name" name="spec_name" autocomplete="off" 
                                                 placeholder="Insert Spec Name" 
                                                 class="border border-gray-300 shadow p-3 w-full rounded-lg ">
                <label for="name" class="block mb-2 font-bold text-gray-600">Spec Detail</label>
                <textarea type="text" id="spec_detail" name="spec_detail" autocomplete="off" 
                                                 placeholder="Insert Spec Detail" 
                                                 class="border border-gray-300 shadow p-3 w-full rounded-lg h-40 py-2 px-3 "></textarea>
                
            </div>
            <button type="submit" class="block w-full btn btn-success text-white font-bold p-4 rounded-lg">Submit</button>
        </form>
</div>
@endsection
