@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
        <li class="breadcrumb-item"><a href="">Sửa truyện: {{$truyen->name}} </a></li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-10">
                <div class="card-header text-center">
                    {{$title}}
                </div>
                <div class="card-body" style="padding-left: 2rem;">
                    <table class="table " cellpadding="0">
                        <form action="{{route('truyen.update',[$truyen->id])}}" method="post"
                              enctype="multipart/form-data">
                            @include('admin.alert')
                            <div class="form-group">
                                <label for="name">Tên Truyện</label>
                                <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()"
                                       aria-describedby="" placeholder="Nhập tên thể loại..." value="{{$truyen->name}}"
                                       required>
                                <small id="emailHelp" class="form-text text-muted">We'll fight for success!!!</small>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug Truyện</label>
                                <input type="text" class="form-control" required name="slug" value="{{$truyen->slug}}"
                                       id="slug" placeholder="Slug tự động tạo ra sau khi nhập tên..."
                                       aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="tacgia">Tác giả</label>
                                <input type="text" class="form-control" required name="tacgia"
                                       value="{{$truyen->tacgia}}" id="tacgia" placeholder="Nhập tác giả của truyện"
                                       aria-describedby="">
                            </div>
                                 <div class="form-group">
                                <label for="tongchap">Tổng số chapter</label>
                                <input type="number" class="form-control" required name="tongchap" value="{{$truyen->tongchapter}}"
                                       id="tongchap" placeholder="" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="">Thể loại </label> <br>
                                @foreach($theloai as $key => $theloai)

                                    @php
                                        $tl_id=explode('!!', $truyen->theloai_id);
                                    @endphp
                                    <input @foreach($tl_id as $tl_id)
                                           {{$theloai->id==$tl_id?'checked':""}}
                                           type="checkbox" name="theloai[{{$key}}]" id="{{$theloai->name}}"
                                           value="{{$theloai->id}}" @endforeach >
                                    <label for="{{$theloai->name}}"> &nbsp{{$theloai->name}} </label>&nbsp

                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung truyện</label>
                                <textarea name="content" id="content" class="form-control" rows="10"
                                          style="resize: none;"
                                          placeholder="Nhập mô tả...">{{$truyen->content}}</textarea>
                            </div>
                             <div class="form-group">
                                <label for="hashtag">Hashtag truyện</label>
                                <input type="text" class="form-control" style="color:blue;" required name="hashtag" value="{{$truyen->hashtag}}"
                                       id="hashtag" placeholder="Nhập hashtag của truyện" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label> &nbsp
                                <input type="file" class="form-control-file" name="hinhanh" id="hinhanh">
                                <img src="{{asset('/uploads/truyen/'.$truyen->image)}}" width="150" height="200"
                                     alt="Not found">
                            </div>
                            <div class="form-group">
                                <label for="decu">Ưu tiên</label>
                                <select name="decu" id="decu" class="form-control">
                                    <option value="3" {{$truyen->decu==3?"selected":""}}>Thấp</option>
                                    <option value="2" {{$truyen->decu==2?"selected":""}}>Trung bình</option>
                                    <option value="1" {{$truyen->decu==1?"selected":""}}>Cao</option>
                                    <option value="0" {{$truyen->decu==0?"selected":""}}>Rất cao</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active">Hiển thị</label>
                                <select name="active" id="active" class="form-control">
                                    <option value="0" {{$truyen->active==0?"selected":""}}>Có</option>
                                    <option value="1" {{$truyen->active==0?"":"selected"}}>Không</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa Truyện</button>
                            <hr>
                            @csrf
                            @method('Put')
                        </form>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.editor')
@endsection

