@extends('pages.layout.main')
@section('content')
<div class="container" style="">
	<nav aria-lable='breadcrumb'>
		<ol class="breadcrumb">
			<li  class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="" class="disabled">Tìm kiếm chi tiết</a></li>
			<li class="breadcrumb-item"><a href="" class="disabled">Bạn đang tìm :</a></li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-12 ">
			<div id="wapper">
				<div class="headline">
					<h3 class="title-page">{{$title}}</h3>
				</div>
				<div> 
					<form action="" method="post">
						@method('get')
						@csrf
						<table  cellpadding="0" cellspacing=0 width="100%">
							<tr>
								<td>
									<div  class="form-group">
										<label for="tentruyen">Tên truyện</label>
										<input type="text" value="" id="tentruyen" placeholder="Nhập tên truyện..." name="tentruyen" class="form-control">
									</div>
								</td>
								<td>
									<div class="form-group">
										<label for="tacgia">Tác giả</label>
										<input type="text" placeholder="Nhập tên tác giả..." id="tacgia" value="" name="tacgia" class="form-control">
									</div>
								</td>
								<td>
									<div class="form-group">
										<label for="theloai">Thể loại</label>
										<select class="form-control" name="theloai" id="theloai">
											<option value="">--Chọn thể loại--</option>
											@foreach($theloai as $tl)
											<option  value="{{$tl->id}}">{{$tl->name}}</option>
											@endforeach
										</select>
									</div>
								</td>
								<td>
									<div class="form-group">
										<label for="sapxep">sắp xếp</label>
										<select class="form-control" id="sapxep" id="sapxep" name="sapxep">
											<option value="desc">Mới nhất</option>
											<option value="asc">Cũ nhất</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td ><input type="submit" name="submit" class="btn btn-primary form-control" value="Tìm"></td>
							</tr>
						</table>
					</form>
				</div>

				<div>				
					@if(isset($truyen))
					<p>	{{$thongbao}}</p>
					<ul class="list-truyen row">
					@foreach($truyen as $key => $truyen1)
					<li class="col-6 col-sm-4 col-lg-2 col-md-3">
						<div class="truyen-item ">
							<div class="truyen-top">
								<a href="{{url('detail/'.$truyen1->slug)}}" class="truyen-thumb">
									<img src="{{asset('uploads/truyen/'.$truyen1->image)}}" alt="">
								</a>
								<a href="{{url('detail/'.$truyen1->slug)}}" class="doc-ngay">Đọc ngay</a>    
							</div>
							<div class="truyen-info">
								<div class="truyen-view">
									<ion-icon name="eye-outline"></ion-icon> 666
								</div> 
								<hr>
								<a href="{{url('detail/'.$truyen1->slug)}}" class="tentruyen">{{$truyen1->name}}</a>
								<span><i><ion-icon name="person-circle-outline"></ion-icon> {{ucwords($truyen1->tacgia)}}</i></span>
							</div>
						</div>

					</li>
					@endforeach
				</ul>
				@endif
				</div>

			</div>
		</div>
	</div>
</div>
<style>
	.truyen-info span{
		padding: 5px;
	}
</style>
@endsection