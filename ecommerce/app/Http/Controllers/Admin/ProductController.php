<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Product,Order};
use File;

class ProductController extends Controller
{
    public function Index(){
        $products=Product::all();
        return view('admin.product.allproduct',compact('products'));
    }

    public function AddProduct(){
        $catagorys=Category::latest()->get();
        $subcatagorys=SubCategory::latest()->get();
        return view('admin.product.addproduct',compact('catagorys','subcatagorys'));
    }

    public function storeproduct(Request $request){
        $request->validate([
            'product_name' =>'required|unique:products',
            'price' =>'required',
            'quantity' =>'required',
            'Product_short_des' =>'required',
            'product_long_des' =>'required',
            'peoduct_category_id' =>'required',
            'peoduct_subcategory_id' =>'required',
            'product_img' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //category
        $category_id=$request->peoduct_category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');
        //subcategory
        $subcategory_id=$request->peoduct_subcategory_id;
        $subcategory_name=SubCategory::where('id',$subcategory_id)->value('subcategory_name');
        //image
        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('Upload/product/'),$img_name);
        $img_url='Upload/product/'.$img_name;

        $product=new Product;
        $product->product_name=$request->product_name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->Product_short_des=$request->Product_short_des;
        $product->product_long_des=$request->product_long_des;
        $product->peoduct_category_id=$category_id;
        $product->product_category_name=$category_name;
        $product->peoduct_subcategory_id=$subcategory_id;
        $product->product_subcategory_name=$subcategory_name;
        $product->product_img=$img_url;
        $product->slug=strtolower(str_replace(' ','-',$request->product_name));
        $product->save();
         
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('allproduct')->with('message','Product Added Successfully!');

    }

    public function EditProductImg($id){
        $productimg=Product::find($id);
        return view('admin.product.editproductimg',compact('productimg'));
    }

    public function UpdateImgProduct(Request $request,$id){
        $request->validate([
            'product_img' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //image
        $image=$request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('Upload/product/'),$img_name);
        $img_url='Upload/product/'.$img_name;

        $product=Product::find($id);
        $product->product_img=$img_url;
        $product->save();
        return redirect()->route('allproduct')->with('message','Product Added Successfully!');

    }

    public function EditProduct($id){
        $products=Product::find($id);
        return view('admin.product.editproduct',compact('products'));

    }

    public function UpdateProduct(Request $request,$id){
        $request->validate([
            'product_name' =>'required',
            'price' =>'required',
            'quantity' =>'required',
            'Product_short_des' =>'required',
            'product_long_des' =>'required',
        ]);
        
        $product=Product::find($id);
        $product->product_name=$request->product_name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->Product_short_des=$request->Product_short_des;
        $product->product_long_des=$request->product_long_des;
        $product->slug=strtolower(str_replace(' ','-',$request->product_name));
        $product->save();
        return redirect()->route('allproduct')->with('message','Product Update Successfully!');
    
    }

    public function DeleteProduct($id){
        $cat_id=Product::where('id',$id)->value('peoduct_category_id');
        $sub_cat_id=Product::where('id',$id)->value('peoduct_subcategory_id');
        Category::where('id',$cat_id)->decrement('product_count',1);
        SubCategory::where('id',$sub_cat_id)->decrement('product_count',1);
        
        Product::find($id)->delete();
        
        return redirect()->route('allproduct')->with('message','Sub Category Delete Successfully!');

    }

}
