<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;




class HomeController extends Controller
{
    public function index()
    {
        $user_id=Auth::id();

        $count=cart::where('user_id',$user_id)->count();
        $data=food::all();
        return view("home",compact("data","count"));
    }

    public function redirects()
    {
        $data=food::all();


        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.adminhome');
        }
        else
        {
            $user_id=Auth::id();

            $count=cart::where('user_id',$user_id)->count();

            return view('home',compact('data','count'));
        }
    }

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user_id=Auth::id();

            $foodid=$id;

            $quantity=$request->quantity;

            $price=$request->price;

            $cart=new cart;

            $cart->user_id=$user_id;

            $cart->food_id=$foodid;

            $cart->quantity=$quantity;

            $cart->price=$price;

            $cart->totalprice=$quantity*$price;


            $cart->save();


            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showcart(Request $request,$id)
    {

        $user_id=Auth::id();

        $count=cart::where('user_id',$user_id)->count();

        $data=cart::where('user_id',$id)->join('food', 'carts.food_id', '=', 'food.id')->select('food.*','carts.*','carts.id as cart_id')->get();


        return view('showcart',compact('count','data'));

    }

    public function home()
    {
        $data=food::all();

        $user_id=Auth::id();

        $count=cart::where('user_id',$user_id)->count();

        return view('home',compact('count','data'));
    }

    public function removeCart($id)
    {
      Cart::destroy($id);
      return redirect()->back();

    }

    public function check(Request $request,$id)
    {
        $user_id=Auth::id();

        $count=cart::where('user_id',$user_id)->count();

        $data=cart::where('user_id',$id)->join('food', 'carts.food_id', '=', 'food.id')->select('food.*','carts.*','carts.id as cart_id')->get();

        $total=cart::where('user_id',$id)->sum('carts.totalprice');

        return view("checkout",compact("data","count","total"));

    }

    public function order(Request $request,$id)
    {
        $data=food::all();

        $user_id=Auth::id();

        $count=cart::where('user_id',$user_id)->count();

        $cartitems = cart::where('user_id',$id)->get();
        foreach($cartitems as $item)
        {
            $order= new Order;
            $order->user_id=$user_id;
            $order->product=$item->foodname;
            $order->qty=$item->quantity;
            $order->total_price=$request->price;
            $order->save();
            cart::where('user_id',$id)->delete();
        }

        return view('home',compact('count','data'));

    }

}
