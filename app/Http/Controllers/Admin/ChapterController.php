<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Theloai;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $truyen = truyen::where('slug', $slug)->first();
        $truyenid=$truyen->id;
        $chapter =chapter::where('truyen_id', $truyenid)->orderby('vitri')->get();
        $title = 'Chapter ('.count($chapter).'/'.$truyen->tongchapter.')';
        return view('admin.truyen.chapter.index')->with(compact('title', 'truyen','chapter'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $title = "Thêm Chapter";
        $id = $request->soid;
        $truyen = truyen::where('id', $id)->first();
        $vitri =chapter::where('truyen_id', $truyen->id)->orderby('vitri','desc')->first('vitri');
        return view('admin.truyen.Chapter.create')->with(compact('title', 'id', 'truyen','vitri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title='Thêm truyện';
        $theloai=theloai::orderby('id');
        $truyen=truyen::where('id',$request->truyen_id)->first();
        $check=chapter::where('truyen_id',$request->truyen_id)->where('vitri',$request->vitri)->first();
        $request->session()->forget('success'); $request->session()->forget('error');
        if($check==''){
            $chapter= new chapter();
            $chapter->truyen_id=$request->truyen_id;
            $chapter->name=$request->name;
            $chapter->slug=$request->slug;
            $chapter->vitri=$request->vitri;
            $chapter->mota=$request->mota;
            $chapter->content=$request->content;
            $chapter->active=$request->active;
            $chapter->save();
            $request->session()->flash('success', 'Thêm thành công chapter : '.$request->name);
        }else{
            $request->session()->flash('error', 'Chapter số '.$request->vitri.' đã tồn tại. Hãy thêm chapter khác!!!');
        }
        return view('admin.truyen.chapter.create')->with(compact('truyen','title','theloai'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = "Sửa Chapter";
        $chapter=chapter::where('id', $id)->first();
        $truyen = truyen::where('id', $chapter->truyen_id)->first();
        return view('admin.truyen.Chapter.edit')->with(compact('title', 'id', 'truyen','chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $chapid=$request->chap_id;
        $chapter= chapter::find($chapid);
        $chapter->name=$request->name;
        $chapter->slug=$request->slug;
        $chapter->mota=$request->mota;
        $chapter->content=$request->content;
        $chapter->active=$request->active;
        $chapter->save();
        return redirect()->back()->with('success','Sửa thành công');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     chapter::find($id)->delete();
     return redirect()->back() ;
 }
}
