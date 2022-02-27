@extends('admin.main')
@section('content')
<ol class="breadcrumb">
    <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
    <li class="breadcrumb-item"><a href="{{asset('admin/view/chapter/'.$truyen->slug)}}">Chapter : {{$truyen->slug}}</a></li>
    <li class="breadcrumb-item"><a href="">Sửa </a></li>
</ol>
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-10">
            <div class="card-header">

            </div>
            <div class="card-body">

                <table>
                    <form action="{{asset('admin/updatechap')}}" method="PUT">
                         @csrf
                        @method('GEt')
                        <div class="form-group">
                            @include('admin.alert')
                            <label for="">Tên truyện</label>
                            <input class="form-control" type="text"  value="{{$truyen->name}}" readonly="" placeholder="">
                            <input type="hidden" value="{{$truyen->id}}" name="truyen_id">
                            <input type="hidden" value="{{$chapter->id}}" name="chap_id">
                            <label>Chapter số </label><br>
                            <input type="number" readonly="" value="{{$chapter->vitri}}" required name="vitri" placeholder="Nhập số thứ tự của Chapter này" class="">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên Chapter</label>
                            <input class="form-control" type="text" onkeyup="ChangeToSlug()" name="name" id="name" value="{{$chapter->name}}" placeholder="Mời nhập tên chapter">
                        </div>
                        <div class="form-group">
                            <label for="">Slug truyện</label>
                             <input type="text" class="form-control" required name="slug" value="{{$chapter->slug}}"
                                       id="slug" placeholder="Slug tự động tạo ra sau khi nhập tên..."
                                       aria-describedby="">
                         </div>
                        <div class="form-group">
                            <label for="mota">Mô tả ngắn</label>
                            <textarea class="form-control" name="mota" id="mota" rows="5" placeholder="Mời nhập nội dung chính của chapter...">{{$chapter->mota}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung chapter</label>
                            <textarea class="form-control" name="content" id="content" rows="10" placeholder="Mời nhập nội dung chính của chapter...">{!!$chapter->content!!}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="">Hiện thị</label>
                            <select name="active" id="">
                                <option {{$chapter->active==0?'selected':''}} value="0">Có</option>
                                <option {{$chapter->active==1?'selected':''}} value="1">Không</option>
                            </select>
                        </div>
                        <button class="btn btn-success" name="submit" type="submit">Sửa chapter</button>
         
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.editor')
@endsection