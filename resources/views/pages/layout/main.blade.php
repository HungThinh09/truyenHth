<!DOCTYPE html>
<html>
<head>
  @include('pages.layout.head')
</head>
<body>

  @include('pages.layout.nav')
  @yield('slide')
  @yield('content')
    @include('pages.layout.backtop')
    @include('pages.layout.footer')
 
  <script type="text/javascript">
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
          0:{
            items:2,
            nav:true
          },
          600:{
            items:3,
            nav:true,

          },
          1000:{
            items:5,
            nav:true,
            loop:false
          }
        }
      })
    });
  </script>
</body>
</html>
