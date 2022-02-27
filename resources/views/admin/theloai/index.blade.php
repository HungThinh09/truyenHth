@extends('admin.main')
@section('content')
<ol class="breadcrumb">
        <li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/theloai')}}">Thể loại</a></li>
        <li class="breadcrumb-item"><a href="#">Danh sách thể loại</a></li>
    
</ol>
    
    <div class="card">
        <a style="position: absolute; right:2rem;" class="btn btn-success" href="{{route('theloai.create')}}"><ic class="fas fa-plus-square"></i> Thêm thể loại</a>
        <br>
        <div class="card-body">
            <table class="table" cellpadding="0"> 
                <tr>
                    <th width="5%">STT</th>
                    <th>Tên thể lọai</th>
                    <th>slug thể loại</th>
                    <th width="20%">add to Menu</th>
                    <th width="15%">Action</th>
                </tr>
                <tbody>
                @foreach($theloai as $key => $theloai)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$theloai->name}}</td>
                        <td>{{$theloai->slug}}</td>
                        <td>
                            @if($theloai->active==0)<span class="btn btn-success">Yes<span>
							@else <span class="btn btn-danger">No<span>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <a href="{{route('theloai.edit',[$theloai->id])}}"
                                   class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                {{-- <a href="{{url('admin/theloai/del')}}/{{$theloai->id}}"  onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-outline-danger">Xóa</a> --}}
                                <form action="{{route('theloai.destroy',[$theloai->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa thể loại {{$theloai->name}}')">
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
