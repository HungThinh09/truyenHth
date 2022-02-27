@extends('admin.main')
@section('content')
<ol class="breadcrumb">
        <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/theloai')}}">Thể loại</a></li>
    <li class="breadcrumb-item"><a href="">Thêm thể loại</a></li>
</ol>
<div class="container" style="padding-top: 20px;">
 {{--   Cho tất cả  div ra giữa --}}
    <div class="justify-content-center row">
        <div class="col-10 " style="min-height:500px;">
            <form action="{{route('theloai.store')}}" method="post">
               @include('admin.alert')
          <div class="form-group">
            <label for="name">Tên thể loại</label>
            <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()" aria-describedby="" placeholder="Nhập tên thể loại..." required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="slug">Slug thể loại</label>
            <input type="text" class="form-control" required name="slug" id="slug" placeholder="Slug tự động tạo ra sau khi nhập tên..." aria-describedby="">
          </div>
          <div class="form-group">
               <label for="active">Thêm vào menu</label> &nbsp
            <select name="active" id="active">
                <option value="0" selected>Có</option>
                <option value="1">Không</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Thêm thể loại</button>
          <hr>
          @csrf
        </form>
        </div>
    </div>
</div>

@endsection
