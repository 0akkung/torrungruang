@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-2xl text-center font-bold">Spec</h1>
    <div class="flex items-center justify-between mb-6 mt-6">
        <div class="flex items-center">

        </div>
    <!-- มีเวลาค่อยทำ seacrbar-->
        <span class="mr-24 flex items-center">
            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16  rounded-lg text-sm focus:outline-none"
                   type="search" name="search" placeholder="Search">
            </div>
            <a href="#" type="submit" class="ml-4 mt-2 text-purple-800 hover:underline text-lg">ค้นหา</a>
        </span>
        <span class="flex space-x-2 items-center">
            <a href="{{ route('specs.create') }}" class="btn btn-success font-semi-bold">เพิ่มspecเชือก</a>
        </span>
    </div>
    <table class="table-fixed divide-y divide-gray-300 overflow-y-auto mx-auto min-w-full min-h-full md:w-5/6 lg:w-2/3break-words bg-white
  rounded-lg">
        <thead class="bg-gray-900">
          <tr class="text-white font-semibold text-sm uppercase text-center">
            <th class="px-6 py-8"> รหัสSPEC</th>
            <th class="px-6 py-8"> ชื่อSPEC</th>
            <th class="px-6 py-8"></th>
          </tr>
        </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach ($specs as $spec)
            <tr class="text-center">
              <td class="px-5 py-6">{{$spec->id}}</td>
              <td class="px-5 py-6">{{$spec->spec_name}}</td>
              <td class="px-5 py-6 text-center">
                <a href="{{ route('specs.show', ['spec' => $spec]) }}">
                  <h3 class="text-purple-800 hover:underline font-bold">Detail</h3>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection
