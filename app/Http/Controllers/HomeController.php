<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;


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
}
