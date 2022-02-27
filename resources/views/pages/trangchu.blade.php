@extends('pages.layout.main')
@section('slide')
@include('pages.layout.slide')
@endsection
@section('content')
<div id="wapper">
    <div class="row">
        <div class="col-12 col-lg-9">
                <div class="headline">
                    <h3 class="title-page">Truyện Hot</h3>
                    <hr>
                </div>
                <ul class="list-truyen row">
                    @foreach($truyenhot as $key => $truyenhot)
                    <li class="col-6 col-sm-4  col-md-3">
                        <div class="truyen-item ">
                            <div class="truyen-top">
                                <a href="{{url('detail/'.$truyenhot->slug)}}" class="truyen-thumb">
                                    <img src="{{asset('uploads/truyen/'.$truyenhot->image)}}" alt="">
                                </a>
                                <a href="{{url('detail/'.$truyenhot->slug)}}" class="doc-ngay">Đọc ngay</a>    
                            </div>
                            <div class="truyen-info">
                               <div class="truyen-view">
                                <ion-icon name="eye-outline"></ion-icon> 666
                            </div> 
                            <hr>
                            <a href="{{url('detail/'.$truyenhot->slug)}}" class="tentruyen">{{$truyenhot->name}}</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
    </div>
        <div class="col-lg-3 col-6 nav-tas">
            @include('pages.layout.nav-tab')
        </div>
    </div>
</div>





<div id="wapper">
    <div class="headline">
        <h3 class="title-page">Truyện mới ra</h3>
    </div>
    <ul class="list-truyen">
      @foreach($truyenmoi as $key => $truyenmoi)
      <li class="col-xs-6 col-sm-4 col-lg-2 col-md-3 col-6">
        <div class="truyen-item">
            <div class="truyen-top">
                <a href="{{url('detail/'.$truyenmoi->slug)}}" class="truyen-thumb">
                    <img src="{{asset('uploads/truyen/'.$truyenmoi->image)}}" alt="">
                </a>
                <a href="{{url('detail/'.$truyenmoi->slug)}}" class="doc-ngay">Đọc ngay</a>    
            </div>
            <div class="truyen-info">
                <div class="truyen-view">
                    <ion-icon name="eye-outline"></ion-icon> 666
                </div><hr>
                <a href="{{url('detail/'.$truyenmoi->slug)}}" class="tentruyen">{{$truyenmoi->name}}</a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
</div>
@endsection
