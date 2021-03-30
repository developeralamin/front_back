<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('auth.login');
    }

    //  public function about_us()
    // {
    // 	return view('frontend.single_pages.about_us');
    // }

    // public function contact()
    // {
    // 	return view('frontend.single_pages.contact');
    // }
}
