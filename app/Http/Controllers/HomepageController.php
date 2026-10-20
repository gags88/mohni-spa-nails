<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $banners = Banner::latest()->paginate(5);
        
        return view('index',compact('banners'));
    }
}
