@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
    </ol>
    <div class="card">
        <div class="card-header text-center">
           <h4> Xin chào Admin : {{Auth::user()->name}}</h4>
        </div>
    </div>
@endsection
