@extends('admin.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
        <li class="breadcrumb-item"><a href="#">Chapter</a></li>
    </ol>
    <div class="card">
        <form action="{{url()->current().'/create'}}" method="post" style="position: absolute; right:2rem;">
            @csrf
            @method('get')
            <input type="hidden" name="soid" value="{{$truyen->id}}" placeholder="">
            <button class="btn btn-success" name="submit" type="submit">
                <ic class="fas fa-plus-square"></i> &nbsp Thêm Chapter
            </button>
        </form>
        <br>
        <div class="card-body">

            <table class="table" cellpadding="0">
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tên chapter</th>
                    <th>Mô tả ngắn</th>
                    <th width="5%">Active</th>
                    <th width="5%">&nbsp</th>
                </tr>
                @foreach($chapter as $key =>$chap)
                    <tr>

                        <td>{{$key+1}}</td>
                        <td>{{$chap->name}}</td>
                        <td>{{$chap->mota}}</td>
                        <td>
                            @if($chap->active==0)
                                <i class="fas fa-check-circle" style="color:green"></i>
                        @endif

                        <td width="10%">
                                
                            <a href="{{url('admin/view/chapter/edit',[$chap->id])}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{url('admin/chapter/del',[$chap->id])}} " method="Post">
                                @csrf
                                @method('delete')
                                <button type="submit"  onclick="return confirm('Bạn có chắc muốn xóa chapter mà không thể khôi phục lại?')" class="btn btn-outline-danger">
                                        <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
         
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

