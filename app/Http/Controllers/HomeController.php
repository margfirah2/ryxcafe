<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

class HomeController extends Controller
{
    //test 12
    public function index()
    {
        $data=food::all();
        return view("home", compact("data"));
    }

    public function redirects()
    {
        $data=food::all();
        $usertype= Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.adminhome');
        }

        else{
            return view('home', compact('data'));
        }
    }

    public function addcart(Request $request, $id)
    {
        
        if(Auth::id()){
            $user_id=Auth::id();

            $foodid=$id;

            $quantity=$request->quantity;

            $cart=new cart;

            $cart->user_id= $user_id;
            $cart->food_id= $foodid;
            $cart->quantity= $quantity;
            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }
}
