<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->role == "admin") {

            return view("all.landing");

        } else {

            if (Auth::user()->role == "chef_department" || Auth::user()->role == "chef_formation") {

                return view("all.landing");

            }else{
                if (Auth::user()->role == "teacher") {

                    return view("all.landing");

                }else{
                    if (Auth::user()->role == "student") {

                        return view("all.landing");

                    }
                }
            }

        }
       // return view('home');
    }
}
