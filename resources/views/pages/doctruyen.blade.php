@extends('pages.layout.main')
@section('content')
<div class="container" style="">
	<nav aria-lable='breadcrumb'>
		<ol class="breadcrumb">
			<li  class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="{{asset('detail/'.$truyen->slug)}}">{{$title}}</a></li>
			<li class="breadcrumb-item"><a href="{{asset('detail/'.$truyen->slug)}}">{{$truyen->name}}</a></li>
		</ol>
	</nav>
	<div class="row">
		<div class=" row col-md-9  col-sm-12 col-xs-12">
			<div class="col-5 detail-anh">
				<a href="">
					<img src="{{asset('uploads/truyen/'.$truyen->image)}}" alt="{{$truyen->name}}">
					<span>
						{{$truyen->name}}<br>
						<ion-icon name="person-circle-outline"></ion-icon> <i style="font-size:90%;">{{$truyen->tacgia}}</i>	

					</span>
				</a>
			</div>
			<div class="col-7">
				<div class="detail-info">
					<p>Tên truyện : <a class="detail-info-name" href="{{asset('detail/'.$truyen->slug)}}">{{$truyen->name}}</a></p>
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
					<p class="detail-info-view">Lượt đọc : {{$truyen->view+1}}&nbsp <ion-icon name="eye-outline"></ion-icon> </p>
					<p>Số Chương : {{count($chapter)>0?count($chapter):'Truyện đang được Update...'}}</p>
					@if(count($chapter)>0)
					<p>Chọn chương: 
						<hr>
						<select name="select-chapter" class="form-control" id="select-chapter" class="custom-select select-chapter">
							@foreach($chapter as $key => $chap)
							<option class="ten-chap" value="{{url('doctruyen/'.$truyen->slug.'/'.$chap->slug)}}">Chương {{$key+1}} : {{$chap->name}}</option>
							@endforeach
						</select>
					</p>
					@else
					<button class="btn-danger btn disabled">Đang update...</button>
					@endif
					
				</div>
			</div>
			<div class="row doc-chapter">
				<div class="noidung">
					<h5>Nội dung</h5>			
					@if($back!="")
					<a href="{{url('doctruyen/'.$truyen->slug.'/'.$back->slug)}}" class="btn btn-primary btn-sm"><ion-icon name="arrow-undo-circle"></ion-icon> Chương trước</a>
					@endif
					@if($next!="")
					<a href="{{url('doctruyen/'.$truyen->slug.'/'.$next->slug)}}" class="btn btn-primary btn-sm">Chương kế tiếp <ion-icon name="arrow-redo-circle"></ion-icon></a>
					@endif
				</div>
				<hr>
				<div class="content">
					<div class="tieude-content">
						Chương {{$showchap->vitri}} : <span>{{$showchap->name}}</span>
					</div>
					<div class="noidung-content">
						{!! $showchap->content!!}
						<div>--- Hết chương {{$showchap->vitri}} : <span>{{$showchap->name}} ---</div>
					</div>
					<div class="backandnext">
						@if($back!="")
						<a href="{{url('doctruyen/'.$truyen->slug.'/'.$back->slug)}}" class="btn btn-outline-primary btn-sm"><ion-icon name="arrow-undo-circle"></ion-icon> Chương trước</a>
						@endif
						@if($next!="")
						<a href="{{url('doctruyen/'.$truyen->slug.'/'.$next->slug)}}" class="btn btn-outline-primary btn-sm">Chương kế tiếp <ion-icon name="arrow-redo-circle"></ion-icon></a>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-3 " style="margin: 0 auto;">
			<div class="ads">
				<p>123</p>
				<p>2312</p>
			</div>
			<div class="nav-tas row">
				@include('pages.layout.nav-tab')
			</div>
			
		</div>
	</div>
</div>
<style type="text/css">


</style>


<script type="text/javascript">
	$(document).ready(function(){
		$('#select-chapter').on('change',function(){
			var url=$(this).val();
			if(url){
				window.location = url;
			}else{
				return false;
			}
		});
		currun_chapter();
		function currun_chapter(){
			var url=window.location.href;
			$('select[name="select-chapter"]').find('option[value="'+url+'"]').attr("selected", true);
		}
	})

</script>
@endsection