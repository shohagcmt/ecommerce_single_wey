<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Product,Order};

class OrdersController extends Controller
{
    public function Index(){
        $pendingorders=Order::where('status','pending')->latest()->get();
        return view('admin.orders.pendingorders',compact('pendingorders'));
    }

}
 