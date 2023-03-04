<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Index(){
        $categorys=Category::latest()->get();
        return view('admin.category.allcategory',compact('categorys'));
    }

    public function AddCategory(){
        return view('admin.category.addcategory');
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' =>'required|unique:categories',
        ]);
        $category=new Category;
        $category->category_name =$request->category_name;
        $category->slug =strtolower(str_replace(' ','-',$request->category_name));
        $category->save();
        return redirect()->route('allcategory')->with('message','Category Added Successfully!');

    }

    public function EditCategory($id){
        $category_info=Category::findOrFail($id);
        return view('admin.category.editcategory',compact('category_info'));
      
    }

    public function UpdateCategory(Request $request,$id){
        //$category_id=$request->category_id;
        $request->validate([
            'category_name' =>'required|unique:categories',
        ]);
        $category=Category::find($id);
        $category->category_name =$request->category_name;
        $category->slug =strtolower(str_replace(' ','-',$request->category_name));
        $category->save();
        return redirect()->route('allcategory')->with('message','Category Update Successfully!');
     }

     public function DeleteCategory($id){
        Category::find($id)->delete();
        return redirect()->route('allcategory')->with('message','Category Delete Successfully!');
     }
}
