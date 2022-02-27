@extends('admin.main')
@section('content')
<ol class="breadcrumb">
	<li  class="breadcrumb-item"><a href="{{asset('admin')}}">Trang chủ</a></li>
	<li class="breadcrumb-item"><a href="{{asset('admin/truyen')}}">Truyện</a></li>
	<li class="breadcrumb-item"><a href="{{asset('admin/view/chapter/'.$truyen->slug)}}">Chapter : {{$truyen->slug}}</a></li>
	<li class="breadcrumb-item"><a href="#">Thêm </a></li>
</ol>
<div class="container">
	<div class="row justify-content-center">
		<div class="card col-10">
			<div class="card-header">

			</div>
			<div class="card-body">
				<table>
					<form action="{{url('admin/themchapter') }}" method="Post">

						<div class="form-group">
                            @include('admin.alert')
							<label for="">Tên truyện</label>
							<input class="form-control" type="text"  value="{{$truyen->name}}" readonly="" placeholder="">
							<input type="hidden" value="{{$truyen->id}}" name="truyen_id">
							<label>Chapter số </label><br> 
							<input type="number" required name="vitri" value="{{!empty($vitri->vitri)?$vitri->vitri+1:"1"}}" placeholder="Nhập số thứ tự của Chapter này" class="">
						</div>
						<div class="form-group">
							<label for="name">Tên Chapter</label>
							<input class="form-control" type="text" onkeyup="ChangeToSlug()" name="name" id="name" value="{{old('name')}}" placeholder="Mời nhập tên chapter">
						</div>
						<div class="form-group">
							<label for="">Slug truyện</label>
							 <input type="text" class="form-control" required name="slug" value="{{old('slug')}}"
                                       id="slug" placeholder="Slug tự động tạo ra sau khi nhập tên..."
                                       aria-describedby="">
                         </div>
						<div class="form-group">
							<label for="mota">Mô tả ngắn</label>
							<textarea class="form-control" name="mota" id="mota" rows="5" placeholder="Mời nhập nội dung chính của chapter..."></textarea>
						</div>
						<div class="form-group">
							<label for="content">Nội dung chapter</label>
							<textarea class="form-control" name="content" id="content" rows="10" placeholder="Mời nhập nội dung chính của chapter..."></textarea>

						</div>
						<div class="form-group">
							<label for="">Hiện thị</label>
							<select name="active" id="">
								<option value="0">Có</option>
								<option value="1">Không</option>
							</select>
						</div>
						<button class="btn btn-success" name="submit" type="submit">Thêm chapter</button>
						@csrf
						@method('get')
					</form>
				</table>
			</div>
		</div>
	</div>
</div>
@include('admin.editor')
@endsection
