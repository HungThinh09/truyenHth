<div id="menu" class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Truyện HTH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('truyen-hot')}}">Truyện Hot</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Thể loại
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach($theloai as $theloai1)
              <li class="menu-tab"><a class="dropdown-item " href="{{url('theloai/'.$theloai1->slug)}}">{{$theloai1->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active " href="{{url('truyen-anime')}}" tabindex="-1">Truyện Anime</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " href="{{url('search-chitiet')}}" tabindex="">
              <ion-icon name="search-circle-outline"></ion-icon>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link active " href="{{url('search-chitiet')}}" tabindex="" >đăng xuấ</ion-icon></a>
          </li> --}}

        </ul>

        <form autocomplete="off" class="d-flex" action="{{url('search')}}" method="Get">
          <input class="form-control me-2" type="search" minlength="3" name="key" id="tukhoa" placeholder="Nhập ít nhất 3 kí tự..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
        <ul class="dangnhap">
          @if(!(isset($_SESSION['cus'])))
          <li class="nav-item">
            <a class="nav-link   btn btn-outline-light btn-sm" href="{{url('/dang-nhap')}}" tabindex="">Đăng nhập</ion-icon></a>
          </li>
          <li class="nav-item">
            <a class="nav-link  btn  btn-outline-light btn-sm" href="{{url('/dang-ki')}}" tabindex="">Đăng ký</ion-icon></a>
          </li>
          @else
          <!-- <li class="nav-item">
            <a class="nav-link  " href="#" tabindex="">{{$_SESSION['cus']->name}}</ion-icon></a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="{{url('logout-cus')}}" tabindex="">Đăng xuất</ion-icon></a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{$_SESSION['cus']->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li class="menu-tab"><a class="dropdown-item " href="{{url('logout-cus')}}">Logout</a></li> 
            </ul>
          </li>
          @endif
        </ul>
      </div>

    </div>

  </nav>
  <div id="danhsach">
  </div>
</div>
<style>
  #menu {}

  #menu .navbar {
    margin-top: 5px;
    padding: 5px;
    position: relative;
  }

  .dropdown-menu {
    width: 500px;
  }

  .menu-tab {
    width: 33.3%;
    float: left;

  }

  #navbarSupportedContent #tukhoa {
    font-size: 90%;
  }

  ul.navbar-nav li.nav-item {
    padding: 0 5px;
  }

  #menu form {}

  #menu #danhsach span {
    display: block;

  }

  ul.dangnhap {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    padding-left: 5px;
  }

  ul.dangnhap a{
    color: #fff;
  }
  ul.dangnhap li ul.dropdown-menu{
    width: 100%;
    height: auto;
  } 
  ul.dangnhap li ul.dropdown-menu li{
    width: 100%;
  }
  ul.dangnhap li ul.dropdown-menu li a{
    display: block;
    color: black;
  }
</style>
{{-- <script type="text/javascript">
  $(document).ready(function(){
    $('#tukhoa').keyup(function() {
      var tk=$(this).val();
      if(tk){
       var _token=$('input[name="_token"]').val();
       $.ajax({
        url:"{{url('search')}}",
method:"POST",
data:{tukhoa:tukhoa,_token:_token}
success:function(data){

}
})

}else{
}

});
})
</script> --}}