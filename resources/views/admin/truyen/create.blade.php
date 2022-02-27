@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
        <li class="breadcrumb-item"><a href="">Thêm truyện</a></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-10">
                <div class="card-header text-center">
                    {{$title}}
                </div>
                <div class="card-body" style="padding-left: 2rem;">
                    <table class="table " cellpadding="0">
                        <form action="{{route('truyen.store')}}" method="post" enctype="multipart/form-data">
                            @include('admin.alert')
                            <div class="form-group">
                                <label for="name">Tên Truyện</label>
                                <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()"
                                       aria-describedby="" placeholder="Nhập tên thể loại..." value="{{old('name')}}"
                                       required>
                                <small id="emailHelp" class="form-text text-muted">We'll fight for success!!!</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug Truyện</label>
                                <input type="text" class="form-control" required name="slug" value="{{old('slug')}}"
                                       id="slug" placeholder="Slug tự động tạo ra sau khi nhập tên..."
                                       aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="tacgia">Tác giả</label>
                                <input type="text" class="form-control" required name="tacgia" value="{{old('tacgia')}}"
                                       id="tacgia" placeholder="Nhập tác giả của truyện" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="tongchap">Tổng số chapter</label>
                                <input type="number" class="form-control" required name="tongchap" value="{{old('tongchap')}}"
                                       id="tongchap" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="">Thể loại </label> <br>
                                @foreach($theloai as $key => $theloai)
                                    <input type="checkbox" name="theloai[{{$key}}]" id="{{$theloai->name}}"
                                           value="{{$theloai->id}}"><label for="{{$theloai->name}}">
                                        &nbsp{{$theloai->name}} </label>&nbsp
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung truyện</label>
                                <textarea name="content" id="content" class="form-control" rows="10"
                                          style="resize: none;"
                                          placeholder="Nhập mô tả...">{{old('content')}}</textarea>
                            </div>
                             <div class="form-group">
                                <label for="hashtag">Hashtag truyện</label>
                                <input type="text" class="form-control" required name="hashtag" value="{{old('hashtag')}}"
                                       id="hashtag" placeholder="Nhập hashtag của truyện" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label> &nbsp
                                <input required type="file" class="form-control-file" name="hinhanh" id="hinhanh">
                            </div>
                            <div class="form-group">
                                <label for="decu">Ưu tiên</label>
                                <select name="decu" id="decu" class="form-control">
                                    <option value="3" selected>Thấp</option>
                                    <option value="2">Trung bình</option>
                                    <option value="1">Cao</option>
                                    <option value="0">Rất cao</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active">Hiển thị</label>
                                <select name="active" id="active" class="form-control">
                                    <option value="0" selected>Có</option>
                                    <option value="1">Không</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary ">Thêm Truyện</button>
                            <hr>
                            @csrf
                        </form>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.editor')
@endsection

