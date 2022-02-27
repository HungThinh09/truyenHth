 <div class="container">
 <div class='my_carousel'> 
  <div class="owl-carousel owl-theme carousel slide"  data-bs-ride="carousel">
    @foreach($slide as $key => $truyen1)
    <div class="item">
      <a href="{{url('detail/'.$truyen1->slug)}}">
        <img src="{{asset('uploads/truyen/'.$truyen1->image)}}" alt="">
        <h6 class="tieude" >{{$truyen1->name}}</h6>
      </a>
    </div>
    @endforeach
  </div>
</div>
</div>
<style>

  .my_carousel{
    width: 70%;
    margin: 0px auto;
    margin-top: 0.3rem;

  }

  .my_carousel .item>a{
   text-decoration: none;
 }
 .my_carousel .item img{
  width: 100%;
  height: 200px;
  position: relative;
}
ul.dropdown-menu.show{
  min-height: 100px;
}
@media only screen and (max-width: 892px){
  .my_carousel .item img{
    height: 175px;
  }
   
}
.my_carousel .item>a>.tieude{
  width: 100%;
  background-color: rgba(27, 20, 100,0.8);
  padding: 0.5rem ;
  position: absolute;
  bottom: -0.5rem;
  left: 0rem;
  color: white;
  border-radius: 10px;
  font-size: 11px;
}
.my_carousel .item>a>.tieude:hover, .my_carousel .item:hover>a>.tieude{
  font-size: 102%;
  background-color: rgba(149, 175, 192,0.8);
  color: black;
 
}
  .my_carousel .item a:hover img{
    filter: grayscale(50%);
  }
</style> 