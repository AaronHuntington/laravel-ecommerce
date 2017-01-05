<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    var $image_filePath = '../images/advertising/homeBillboard/'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billboards = Advertising::where('type','homeBillboard')->get();
        $img_filePath = $this->image_filePath;

        return view('welcome', compact('billboards','img_filePath'));
    }
}