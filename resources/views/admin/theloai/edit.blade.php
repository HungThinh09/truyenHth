@extends('admin.main')
@section('content')
<ol class="breadcrumb">
        <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/theloai')}}">Thể loại</a></li>
        <li class="breadcrumb-item"><a href="">Sửa thể loại</a></li>
</ol>
    <div class="container" style="padding-top: 20px;">
    <div class=" row">
    <div class="col-1">
    </div>
    <div class="col-10 " style="min-height:500px;">
        <form action="{{route('theloai.update',[$theloai->id])}}" method="post">
            <div class="form-group">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <label for="name">Tên thể loại</label>
                <input type="text" onkeyup="ChangeToSlug()" class="form-control" id="name" name="name" aria-describedby=""
                       placeholder="Nhập tên thể loại..." value="{{$theloai->name}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="slug">Slug thể loại</label>
                <input type="text" value="{{$theloai->slug}}" class="form-control" name="slug" id="slug"
                       aria-describedby="">
            </div>
            <div class="form-group">
                <label for="active">Thêm vào menu</label>
                <select name="active" id="active">
                    <option value="0" {{$theloai->active==0?'selected':''}}>Có</option>
                    <option value="1" {{$theloai->active==1?'selected':''}}>Không</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sửa thể loại</button>
            <hr>
            @method('put')
            @csrf
        </form>
    </div>
    <div class="col-1">

    </div>
    </div>
    </div>

@endsection
