@extends('admin.main')
@section('content')
   <ol class="breadcrumb">
        <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
        <li class="breadcrumb-item"><a href="#">Danh sách Truyện</a></li>
    </ol>
    <div class="card">
        <a style="position: absolute; right:2rem;" class="btn btn-success" href="{{route('truyen.create')}}"><ic class="fas fa-plus-square"></i> Thêm Truyện</a>
        <br>
        <div class="card-body">
             <table class="table" cellpadding="0">
                <tr>
                    <th width="5%">STT</th>
                    <th>Tên truyện</th>
                    <th>Thể loại</th>
                    <th width="30%">Tác giải</th>
                    <th width="10%">Hiển thị</th>
                    <th width="10%">Ảnh</th>
                    <th width="12%">Action</th>
                </tr>
                <tbody>
                @foreach($truyen as $key => $truyen)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$truyen->name}}</td>
                        <td>
                            @php
                            $tl_id=explode('!!', $truyen->theloai_id);
                            @endphp
                            @foreach($tl_id as $key=> $tl_id)
                                     @foreach($theloai as $tl)
                                        @if($tl->id==$tl_id)
                                            <li class="list-unstyled">- {{$tl->name}}</li>
                                        @endif
                                     @endforeach
                            @endforeach

                        </td>
                        <td>{!!$truyen->tacgia!!}</td>
                        <td>
                            @if($truyen->active==0)<span class="btn btn-success">Yes<span>
                            @else <span class="btn btn-danger">No<span>
                            @endif
                        </td>
                        <td><img src="{{asset('uploads/truyen/'.$truyen->image)}}" width="75" height="100" alt="Not found">
                        <td>
                            <div class="row">
                                 <a href="{{url('admin/view/chapter',[$truyen->slug])}}"
                                   class="btn btn-outline-success ">Chapter</a>
                                <a href="{{route('truyen.edit',[$truyen->id])}}"
                                   class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{route('truyen.destroy',[$truyen->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa truyện {{$truyen->name}}')">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

