<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.index');
    }
}
