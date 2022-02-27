<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $title= "Danh sách thể loại";
    $theloai= Theloai::orderby('id','DESC')->get();
     return view('admin.theloai.index')->with(compact('title','theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Thêm thể loại";
      return view('admin.theloai.add')->with(compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate(
        [
            'name' => 'required|unique:theloai|max:255',
            'slug' => 'required|unique:theloai|max:255',
            'active' => 'required',

        ]);
       $theloai = new theloai();
       $theloai->name= $data['name'];
       $theloai->slug=$data['slug'];
       $theloai->active=$data['active'];
       $theloai->save();

     return redirect()->back()->with('success', 'Đã thêm thành công : '.$data['name']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title ="Sửa thể loại";
        $theloai= theloai::where('id',$id)->first();
      return view('admin.theloai.edit')->with(compact('title','theloai'));
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
        $data=$request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'active' => 'required',
        ]);
        $theloai= theloai::find($id);
        $theloai->name=$data['name'];
        $theloai->slug=$data['slug'];
        $theloai->active=$data['active'];
        $theloai->save();
        return redirect()->back()->with('status','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       theloai::find($id)->delete();
       return redirect()->back();

    }
}
