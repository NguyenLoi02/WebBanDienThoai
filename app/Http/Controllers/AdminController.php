<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.trang_admin");
    }
    // public function trangchu(){
    //     return view('admin.nhacungcap.DS_nhacungcap');
    // }
}
