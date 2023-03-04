<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory};

class SubCategoryController extends Controller
{
    public function Index(){
        $allsubcategorys=SubCategory::all();
        return view('admin.subcategory.allsubcategory',compact('allsubcategorys'));
    }

    public function AddSubCategory(){
        $categorys=Category::latest()->get();
        return view('admin.subcategory.addsubcategory',compact('categorys'));
    }

    public function StoreSubCategory(Request $request){
        $request->validate([
            'subcategory_name' =>'required|unique:sub_categories',
            'category_id' =>'required',
        ]);
        $category_id=$request->category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');

        $subcategory=new SubCategory;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->category_id=$category_id;
        $subcategory->category_name=$category_name;
        $subcategory->slug=strtolower(str_replace(' ','-',$request->subcategory_name));
        $subcategory->save();
         
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','Sub Category Added Successfully!');

    }

    public function EditSubCategory($id){
        $subcategory_info=SubCategory::findOrFail($id);
        return view('admin.subcategory.editsubcategory',compact('subcategory_info'));

    }

    public function UpdateSubCategory(Request $request,$id){
        $request->validate([
            'subcategory_name' =>'required|unique:sub_categories',
        ]);

        $subcategory=SubCategory::find($id);
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->slug=strtolower(str_replace(' ','-',$request->subcategory_name));
        $subcategory->save();
        return redirect()->route('allsubcategory')->with('message','Sub Category Update Successfully!');
    }

    public function DeleteSubCategory($id){
        $cat_id=SubCategory::where('id',$id)->value('category_id');
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        
        SubCategory::find($id)->delete();
        
        return redirect()->route('allsubcategory')->with('message','Sub Category Delete Successfully!');


    }
}

