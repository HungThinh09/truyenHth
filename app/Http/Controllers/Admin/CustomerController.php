<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Theloai;
use App\Models\Truyen;



#$chapter->slug=$request->slug;
#$request->input('tentruyen','');
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo ('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => ' Bạn chưa nhập mật khẩu'
        ]);
        $customer = Customer::where('email', $request->email)->where('password', md5($request->password))->first();
        if ($customer) {
            $_SESSION['cus'] = $customer;
            return view('pages.trangchu', [
                'title' => 'Trang chu HTH',
                'slide' => truyen::orderby('id', 'DESC')->where('decu', 0)->limit(20)->get(),
                'truyenhot' => $truyen = truyen::orderby('id', 'DESC')->wherein('decu', [0, 1, 2])->limit(24)->get(),
                'theloai' => $theloai = theloai::orderby('id', 'DESC')->where('active', 0)->get(),
                'truyenmoi' => $truyen = truyen::orderby('id', 'DESC')->limit(24)->get(),
                'nav_1' => $truyen = truyen::orderby('id', 'DESC')->limit(8)->get(),
                'nav_2' => $truyen = truyen::orderby('id', 'DESC')->wherein('decu', [0, 1])->limit(8)->get(),
                'nav_3' => $truyen = truyen::orderby('view', 'DESC')->limit(8)->get(),
            ]);
        }
        return redirect()->back()->with('error', 'Email or Password không đúng');
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
            'name' => 'required|max:255',
            'sex' => 'required',
            'email' => 'required|unique:customer',
            'phone' => 'required',
            'adress' => 'required',
            'repassword' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'bạn chưa nhập tên',
            'sex.required' => 'Bạn chưa chọn giới tính',
            'email.required' => 'bạn chưa nhập emai',
            'email.unique' => 'Email đã tồn tại',
        ]);
        if ($data['password'] == $data['repassword']) {
            $customer = new customer;
            $customer->name = $data['name'];
            $customer->email = $data['email'];
            $customer->phone = $data['phone'];
            $customer->adress = $data['adress'];
            $customer->sex = $data['sex'];
            $customer->password = md5($data['password']);
            $customer->save();
            return redirect()->back()->with('success', 'Đã taoj thành công user');
        } else {
            return redirect()->back()->with('error', 'Re-Password nhập lại không đúng');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(Request $request )
    {
        $request->session()->forget('cus');
        return view('pages.trangchu', [
            'title' => 'Trang chu HTH',
            'slide' => truyen::orderby('id', 'DESC')->where('decu', 0)->limit(20)->get(),
            'truyenhot' => $truyen = truyen::orderby('id', 'DESC')->wherein('decu', [0, 1, 2])->limit(24)->get(),
            'theloai' => $theloai = theloai::orderby('id', 'DESC')->where('active', 0)->get(),
            'truyenmoi' => $truyen = truyen::orderby('id', 'DESC')->limit(24)->get(),
            'nav_1' => $truyen = truyen::orderby('id', 'DESC')->limit(8)->get(),
            'nav_2' => $truyen = truyen::orderby('id', 'DESC')->wherein('decu', [0, 1])->limit(8)->get(),
            'nav_3' => $truyen = truyen::orderby('view', 'DESC')->limit(8)->get(),
        ]);
    }
}
