@extends('pages.layout.main')
@section('content')
<div class="container" style="">
	<nav aria-lable='breadcrumb'>
		<ol class="breadcrumb">
			<li  class="breadcrumb-item"><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="">{{$title}}</a></li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-md-9  col-sm-12 col-xs-12">
			<div id="wapper">
				<div class="headline">
					<h3 class="title-page">{{$title}}</h3>
					<hr>
				</div>
				<ul class="list-truyen row">
					@foreach($truyenhot as $key => $truyenhot1)
					<li class="col-6 col-sm-4 col-lg-3 col-md-4">
						<div class="truyen-item ">
							<div class="truyen-top">
								<a href="{{url('detail/'.$truyenhot1->slug)}}" class="truyen-thumb">
									<img src="{{asset('uploads/truyen/'.$truyenhot1->image)}}" alt="">
								</a>
								<a href="{{url('detail/'.$truyenhot1->slug)}}" class="doc-ngay">Đọc ngay</a>    
							</div>
							<div class="truyen-info">
								<div class="truyen-view">
									<ion-icon name="eye-outline"></ion-icon> 666
								</div> 
								<hr>
								<a href="{{url('detail/'.$truyenhot1->slug)}}" class="tentruyen">{{$truyenhot1->name}}</a>
							</div>
						</div>

					</li>
					@endforeach

				</ul>
				<div class="phantrang">
					{!! $truyenhot->links() !!}
				</div>
			</div>
		</div>
		<div class="col-3 ads">
			ADS
		</div>
	</div>
</div>
@endsection