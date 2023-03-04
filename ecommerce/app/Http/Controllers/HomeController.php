<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Product};

class HomeController extends Controller
{
    public function Index(){
        $allproducts=Product::latest()->paginate(3);
        return view('user.home',compact('allproducts'));
    }

}
