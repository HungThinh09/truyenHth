@extends('pages.layout.main')
@section('content')
<div class="container" style="">
	<nav aria-lable='breadcrumb'>
		<ol class="breadcrumb">
			<li  class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
			<li class="breadcrumb-item"><a href="#">{{$truyen->name}}</a></li>
		</ol>
	</nav>
	<div class="row">
		<div class=" row col-md-9  col-sm-12 col-xs-12">
			<div class="col-5 detail-anh">
				@if(count($chapter)>0)
				<a href="{{url('doctruyen/'.$truyen->slug.'/'.$chapterdau->slug)}}">
					@else
					<a href="#" class="disabled">
						@endif
						<img src="{{asset('uploads/truyen/'.$truyen->image)}}" alt="{{$truyen->name}}">
						<span>
							{{$truyen->name}}<br>
							<ion-icon name="person-circle-outline"></ion-icon> <i style="font-size:110%;">{{$truyen->tacgia}}</i>	
						</span>
					</a>
				</div>
				<div class="col-7">
					<div class="detail-info">
						<p>Tên truyện : <a class="detail-info-name" href="#">{{$truyen->name}}</a></p>
						<p>Tác giả : <a class="detail-info-tacgia" href="#">{{$truyen->tacgia}}</a></p>
						<p>Thể loại: -
							@php 
							$tl=""; $tl=explode('!!',$truyen->theloai_id);
							@endphp
							@foreach($tl as $key => $tl_id )
							@foreach($theloai as $tl)
							@if($tl_id==$tl->id)
							<a class="detail-info-theloai" href="{{url('theloai/'.$tl->slug)}}" class="tentheloai">{{$tl->name}}</a> -&nbsp;
							@endif
							@endforeach()
							@endforeach
						</p>
						<p class="detail-info-view">Lượt đọc : {{$truyen->view}}&nbsp <ion-icon name="eye-outline"></ion-icon> </p>
						<p>Số Chương : {{count($chapter)>0?count($chapter):'Truyện đang được Update...'}}</p>
						@if(count($chapter)>0)
						<p><a href="#mucluc">Xem mục lục</a></p>
						<a class="btn-outline-primary btn " href="{{url('doctruyen/'.$truyen->slug.'/'.$chapterdau->slug)}}">Đọc ngay</a>
						@else
						<button class="btn-danger btn disabled">Đang update...</button>
						@endif

					</div>
				</div>
				<div class="row detail-mucluc" id="mucluc">
					<div class="">
						<h5>Mục lục</h5>
					</div>
					<hr>
					<div class="noidung-mucluc">
						@if(count($chapter)>0)
						<ol type="1">
							@foreach($chapter as $key => $chap)
							<li><a href="{{url('doctruyen/'.$truyen->slug.'/'.$chap->slug)}}" class="mucluc">Chương {{$key+1}} : {{$chap->name}}</a></li>
							@endforeach
						</ol>
						@else
						<span>Mục lục đang được cập nhật...</span>
						@endif
					</div>
				</div>
			</div>
			<div class="col-3" style="">
				<div class="ads">ADScd</div>
			</div>
		</div>
	</div>
	<style type="text/css">
</style>
@endsection