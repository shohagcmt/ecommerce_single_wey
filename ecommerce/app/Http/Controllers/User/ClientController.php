<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,SubCategory,Product,Cart,ShippingInfo,Order};
use Auth;
class ClientController extends Controller
{
    public function CategoryPage($id){
        $categorys=Category::find($id);
        $products=Product::where('peoduct_category_id',$id)->latest()->paginate(9);
        return view('user.catrgory',compact('categorys','products'));
    }

    public function SingleProduct($id){
        $product=Product::find($id);
        $sub_cat_id=Product::where('id',$id)->value('peoduct_subcategory_id');
        $related_product=Product::where('peoduct_subcategory_id',$sub_cat_id)->latest()->get();
        return view('user.product',compact('product','related_product'));
    }

    public function AddToCart(){
        $user_id=Auth::id();
        $cart_items=Cart::where('user_id',$user_id)->get();
        return view('user.add_to_cart',compact('cart_items'));
    }

    public function AddProductToCart(Request $request){
        $product_price=$request->price;
        $quantity=$request->quentity;
        $price= $product_price*$quantity;
        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$quantity,
            'price'=>$price,
        ]);
        return redirect()->route('addtocart')->with('message','Your item added to cart successfully !');
       
    }

    public function CardRemove($id){
        $card_remove=Cart::find($id)->delete();
        return redirect()->route('addtocart')->with('message','Your item remove form cart successfully !');

    }

    public function GetShippingAddress(){
        return view('user.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        $request->validate([
            'phone_number' =>'required',
            'city_name' =>'required',
            'post_code' =>'required',
        ]);
        $shippingInfo=new ShippingInfo;
        $shippingInfo->user_id=Auth::id();
        $shippingInfo->phone_number= $request->phone_number;
        $shippingInfo->city_name= $request->city_name;
        $shippingInfo->post_code= $request->post_code;
        $shippingInfo->save();
        return redirect()->route('checkout')->with('message','successfully !');

    }

    public function CheckOut(){
        $user_id=Auth::id();
        $cart_items=Cart::where('user_id',$user_id)->get();
        $shipping_address=ShippingInfo::where('user_id',$user_id)->first();
        return view('user.check_out',compact('cart_items','shipping_address'));
    }

    public function PlaceOrder(){
        $user_id=Auth::id();
        $cart_items=Cart::where('user_id',$user_id)->get();
        $shipping_address=ShippingInfo::where('user_id',$user_id)->first();
        foreach($cart_items as $item){
            Order::insert([
                'user_id'=>$user_id,
                'shipping_phone_number'=>$shipping_address->phone_number,
                'shipping_city'=>$shipping_address->city_name,
                'shipping_postcode'=>$shipping_address->post_code,

                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'status'=>'pending',
                'total_price'=>$item->price,

            ]);
            $id=$item->id;
            Cart::findOrFail($id)->delete();
            
        }
        ShippingInfo::where('user_id',$user_id)->delete();
        return redirect()->route('userpendingorders')->with('message','Your Order Has Been Placed successfully !');
    }

    public function UserProfile(){
        return view('user.user_profile');
    }

    public function PendingOrders(){
        $pendingorders=Order::where('status','pending')->latest()->get();
        return view('user.pending_orders',compact('pendingorders'));
    }

    public function History(){
        return view('user.history');
    }

    public function NewRelease(){
        return view('user.new_release');
    }

    public function TodaysDeal(){
        return view('user.todays_deal');
    }

    public function CustomerService(){
        return view('user.customer_service');
    }
}
