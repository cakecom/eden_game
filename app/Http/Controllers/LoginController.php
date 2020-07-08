<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login2(){
        return view('login.index');
    }

    public function loginprocess(Request $request){
//dd($request);
        $username= $request->username;
        $password= $request->password;
        $checkuser=Account::select('username')->where('username',$username)->count();
        if(($checkuser)>0){
            $getpassword=Account::select('*')->where('username',$username)->first();
            if($password==$getpassword['password']){
//                $name=$getpassword['PreName']." ".$getpassword['NameFirst']." ".$getpassword['NameLast'];
                $request->session()->put('username',$username);
//                $request->session()->put('name',$name);
//                $request->session()->put('userType',"S");
//                $request->session()->put('pclass',$getpassword['PClass']);
//                $request->session()->put('proom',$getpassword['PRoom']);
                return redirect('/account');
            }else{
                return redirect('/login2');
            }
        }else{
            return redirect('/login2');
        }
    }
    public function logout2(Request $request){
//        dd(55);
        $request->session()->flush();
        return redirect('/login2');
    }
    public function index()
    {
        //
        return view('layouts.app');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
