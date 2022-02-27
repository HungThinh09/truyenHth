<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">New</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Hot</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Xem nhiều</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <ul id="danhsac-nav">
      @foreach($nav_1 as $nav_moi)
      <li>
        <a href="{{url('detail/'.$nav_moi->slug)}}" class="anhtruyen">
          <img src="{{asset('uploads/truyen/'.$nav_moi->image)}}" alt="Not loader">
        </a>
        <div class="info ">
          <a href="{{url('detail/'.$nav_moi->slug)}}" class="tentruyen ">{{$nav_moi->name}}</a>
          <p><ion-icon name="person-circle-outline"></ion-icon> {{$nav_moi->tacgia}} - {{$nav_moi->view != null ?$nav_moi->view:'0';}} <ion-icon name="eye-outline"></ion-icon> </p>
        </div>
      </li>
      @endforeach
    </ul>
  </div>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <ul id="danhsac-nav">
      @foreach($nav_2 as $nav_moi)
      <li>
        <a href="{{url('detail/'.$nav_moi->slug)}}" class="anhtruyen">
          <img src="{{asset('uploads/truyen/'.$nav_moi->image)}}" alt="Not loader">
        </a>
        <div class="info ">
          <a href="{{url('detail/'.$nav_moi->slug)}}" class="tentruyen ">{{$nav_moi->name}}</a>
          <p><ion-icon name="person-circle-outline"></ion-icon> {{$nav_moi->tacgia}} - {{$nav_moi->view != null ?$nav_moi->view:'0';}} <ion-icon name="eye-outline"></ion-icon></p>
        </div>
      </li>
      @endforeach
    </ul>
  </div>


  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <ul id="danhsac-nav">
      @foreach($nav_3 as $nav_moi)
      <li>
        <a href="{{url('detail/'.$nav_moi->slug)}}" class="anhtruyen">
          <img src="{{asset('uploads/truyen/'.$nav_moi->image)}}" alt="Not loader">
        </a>
        <div class="info ">
          <a href="{{url('detail/'.$nav_moi->slug)}}" class="tentruyen ">{{$nav_moi->name}}</a>
          <p><ion-icon name="person-circle-outline"></ion-icon> {{$nav_moi->tacgia}} - {{$nav_moi->view != null ?$nav_moi->view:'0';}} <ion-icon name="eye-outline"></ion-icon></p>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<style type="text/css">

</style>