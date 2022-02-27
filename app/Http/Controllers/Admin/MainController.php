<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Theloai;
use App\Models\chapter;

class MainController extends Controller
{
    public function index(){
     return view('admin.home',[
         'title' => 'Trang Quản trị Admin',
     ]);
 }
 public function trangchu()   {
    return view('pages.trangchu', [
        'title' => 'Trang chu HTH',
        'slide' => truyen::orderby('id','DESC')->where('decu', 0)->limit(20)->get(),
        'truyenhot' => $truyen=truyen::orderby('id','DESC')->wherein('decu',[0,1,2])->limit(24)->get(),
        'theloai' => $theloai=theloai::orderby('id','DESC')->where('active',0)->get(),
        'truyenmoi' => $truyen=truyen::orderby('id','DESC')->limit(24)->get(),
        'nav_1' => $truyen=truyen::orderby('id','DESC')->limit(8)->get(),
        'nav_2' => $truyen=truyen::orderby('id','DESC')->wherein('decu',[0,1])->limit(8)->get(),
        'nav_3' => $truyen=truyen::orderby('view','DESC')->limit(8)->get(),
    ]);
}

public function theloai($slug){
    $tentheloai=theloai::where('slug',$slug)->first();
    $id_theloai=$tentheloai->id;
    #$truyen= truyen::orderby('id','DESC')->where('theloai_id',$id_theloai)->orwhere('theloai_id','like','%!!'.$id_theloai.'!!%')->orwhere('theloai_id','like','%!!'.$id_theloai.'')->get();
    return view('pages.theloai',[
        'title'=> 'Truyện '. $tentheloai->name,
        'theloai' => $theloai=theloai::orderby('id','DESC')->where('active',0)->get(),
        'truyen' => truyen::orderby('id','DESC')->where('theloai_id',$id_theloai)->orwhere('theloai_id','like','%!!'.$id_theloai.'!!%')->orwhere('theloai_id','like','%!!'.$id_theloai)->paginate(24),

    ]);
}

public function truyenhot(){
    return view('pages.truyenhot',[
        'title'=>'Truyện Hót',
        'theloai' => $theloai=theloai::orderby('id','DESC')->where('active',0)->get(),
        'truyenhot'=> truyen::orderby('id','DESC')->wherein('decu',[0,1])->paginate(24),
    ]);
}

public function anime(){
    return view('pages.anime',[
        'title' => 'Truyện Anime',
        'theloai' => $theloai=theloai::orderby('id','DESC')->where('active',0)->get(),
        'anime' => truyen::orderby('id','DESC')->where('theloai_id',14)->orwhere('theloai_id','like','%!!14!!%')->orwhere('theloai_id','like','%!!14')->paginate(24),
    ]);
}

public function detail($slug){
    $truyen_id=truyen::where('slug',$slug)->first();
    $chapter=chapter::where('truyen_id',$truyen_id->id)->get();
    return view('pages.detail', [
        'title' =>'Chi tiết truyện',
        'theloai' => $theloai=theloai::orderby('id','DESC')->where('active',0)->get(),
        'truyen' => truyen::where('slug',$slug)->first(),
        'chapter' => chapter::where('truyen_id',$truyen_id->id)->orderby('vitri')->get(),
        'chapterdau'=> chapter::where('truyen_id',$truyen_id->id)->orderby('vitri')->first(),
    ]);
}

public function doctruyen($slug, $slug1=""){
    $title ='Đọc truyện';
    $theloai= theloai::orderby('id','DESC')->where('active',0)->get();

    $truyen=truyen::where('slug',$slug)->first();
    $view=truyen::find($truyen->id);
    $view->view = $truyen->view+1;
    $view->save();
    $chapter=chapter::where('truyen_id',$truyen->id)->get();
    $tongchap=count($chapter);
    $showchap=chapter::where('truyen_id',$truyen->id)->where('slug',$slug1)->first();
    if($showchap->vitri+1<=$tongchap){
        $next=chapter::where('truyen_id',$truyen->id)->where('vitri',$showchap->vitri+1)->first();
    }else{
        $next="";
    } 
    if($showchap->vitri-1>0){
     $back=chapter::where('truyen_id',$truyen->id)->where('vitri',$showchap->vitri-1)->first();
 }else{
    $back="";
}

return view('pages.doctruyen',[
    'nav_1' => truyen::orderby('id','DESC')->limit(8)->get(),
    'nav_2' => truyen::orderby('id','DESC')->wherein('decu',[0,1])->limit(8)->get(),
    'nav_3' => truyen::orderby('view','DESC')->limit(8)->get(),
])->with(compact('title','truyen','theloai','chapter','showchap','next','back'));
}

public function seacrh(Request $Request){
    $a="";
    if(isset($_GET['key'])){
       $a=$_GET['key']; 
   }
   $title ='Truyện '.$a;
   $theloai= theloai::orderby('id','DESC')->where('active',0)->get();
   $truyen=truyen::orderby('id')->where('name','like','%'.$a.'%')->orwhere('tacgia','like','%'.$a.'%')->orwhere('hashtag','like','%'.$a.'%')->paginate(30);
   return view('pages.search')->with(compact('title','theloai','truyen','a'));;
}
public function seacrhchitiet (Request $request){
    $title='Tìm kiếm chi tiết';
    $theloai= theloai::orderby('id','DESC')->where('active',0)->get();
    $ten=$request->input('tentruyen','');
    $tacgia=$request->input('tacgia','');
    $tl1=$request->input('theloai','');
    $xs=$request->input('sapxep','');
    $a='%'.$tl1.'%!!';
    if($request->submit){
        $truyen=truyen::orderby('id',$xs)->where('name','like','%'.$ten.'%')->where('tacgia','like','%'.$tacgia.'%')->get();
        if($ten!=""){
          $thongbao = "Bạn đang tìm truyện: ".$ten;
      }elseif($tacgia!=""){
        $thongbao = "Bạn đang tìm tác giả: ".$tacgia;
    }else{
       $thongbao="";
   }

        #->where('theloai_id','like',''.$tl1.'!!%')->orwhere('theloai_id','like','%!!'.$tl1.'!!%')->orwhere('theloai_id','like','%!!'.$tl1)
   return view('pages.timchitiet')->with(compact('title','theloai','thongbao','ten','truyen'));
}else{
    $thongbao="";
    return view('pages.timchitiet')->with(compact('title','theloai','thongbao','ten'));
} 

}
public function dangki(){
   return view('customer.dangki');
}
public function dangnhap(){
   return view('customer.login');
}
public function error4403(){
   return view('pages.layout.403');
}
public function loi404(){
    return view('pages.layout.404');
 }




}



