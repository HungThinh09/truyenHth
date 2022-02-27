<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theloai;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Danh sách truyện';
        $truyen=truyen::with('theloai')->orderby('id','DESC')->get();
        $theloai=theloai::orderby('id','DESC')->get();
        return view('admin.truyen.index')->with(compact('title','truyen','theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Thêm truyện';
        $theloai=theloai::orderby('id','DESC')->get();
        return view('admin.truyen.create')->with(compact('title','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $data = $request->validate([
        'name' => 'required|unique:truyen|max:255',
        'slug' => 'required|unique:truyen|max:255',
        'theloai' => 'required',
        'tacgia' => 'required',
        'decu' => 'required',
        'tongchap' => '',
        'content' => 'required',
        'hashtag' => 'required',
        'active' => 'required',
        'hinhanh' => 'required|image|mimes:jpg,png,gif,svg,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    ],[
       'theloai.required' => 'Vui lòng chọn ít nhất 1 thể loại',
       'hinhanh.required' => 'Bạn chưa chọn ảnh',
       'hinhanh.mimes' => 'Bạn phải chọn ảnh có đuôi là jpg,png,gif,svg,jpeg',
       'hinhanh.image' =>  'FIle bạn chọn không phải là ảnh',
       'hinhanh.dimensions' => 'Size ảnh của bạn không phù hợp (max=1000px, min=100px)',
       'hashtag.required' => 'Cần nhập ít nhất 1 Hashtag',
   ],
);
       $name= $data['name'];
       $truyen= new truyen();
       $truyen->name= $data['name'];
       $truyen->slug=$data['slug'];
       $truyen->theloai_id=implode('!!',$data['theloai']);
       $truyen->tacgia=$data['tacgia'];
       $truyen->tongchapter=$data['tongchap'];
       $truyen->content=($data['content']);
       $truyen->hashtag=($data['hashtag']);
       $truyen->active=$data['active'];
       $get_image=$request->hinhanh;
       $path='uploads/truyen/';
       $get_name_image=$get_image->getClientOriginalName();
       $name_image=current(explode('.',$get_name_image));
       $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
       $get_image->move($path,$new_image);
       $truyen->image = $new_image;
       $truyen->decu=$data['decu'];
       $truyen->save();
       return redirect()->back()->with('success','Đã thêm thành công truyện: '.$name);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title='Thêm truyện';
        return view('admin.truyen.index')->with(compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Sửa truyện';
        $truyen = truyen::find($id);
        $theloai=theloai::orderby('id','DESC')->get();
        return view('admin.truyen.edit')->with(compact('title','truyen','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|max:255',
        'theloai' => 'required',
        'tacgia' => 'required',
        'tongchap' => '',
        'decu' => 'required',
        'content' => 'required',
        'hashtag' => 'required',
        'active' => 'required',
        'hinhanh' => 'image|mimes:jpg,png,gif,svg,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    ],[
       'theloai.required' => 'Vui lòng chọn ít nhất 1 thể loại',
       'hinhanh.required' => 'Bạn chưa chọn ảnh',
       'hinhanh.mimes' => 'Bạn phải chọn ảnh có đuôi là jpg,png,gif,svg,jpeg',
       'hinhanh.image' =>  'FIle bạn chọn không phải là ảnh',
       'hinhanh.dimensions' => 'Size ảnh của bạn không phù hợp (max=1000px, min=100px)'
   ],);
      $truyen = truyen::find($id);
      $truyen->name = $data['name'];
      $truyen->slug = $data['slug'];
      $truyen->tacgia = $data['tacgia'];
      $truyen->tongchapter=$data['tongchap'];
      $truyen->content = $data['content'];
      $truyen->hashtag=$data['hashtag'];
      $truyen->active = $data['active'];
      $truyen->theloai_id=implode('!!',$data['theloai']);
      $get_image=$request->hinhanh;
            // them anh vao folder
      if($get_image){
        $path='uploads/truyen/'.$truyen->image;
        if(file_exists($path)){
            unlink($path);
        }
        $path='uploads/truyen/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $truyen->image = $new_image;
    }
    $truyen->decu = $data['decu'];

    $truyen->save();
    return redirect()->back()->with('success','Update thành công ');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = truyen::find($id);
        $path='uploads/truyen/'.$truyen->image;
        if(file_exists($path)){
            unlink($path);
        }
        truyen::find($id)->delete();
        return redirect()->back() ;
    }
}
