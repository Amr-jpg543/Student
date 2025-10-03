<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('website.index');
    }
    // public function contact(){
    //     return view('website.contact');
    // }
}
