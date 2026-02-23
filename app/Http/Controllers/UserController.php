<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.common.header');
    }


    public function user(){

        return view('user.user');
    }


    public function add_user(){

        return view('user.add_user');
    }

    public function services(){

        return view('user.service');
    }

    public function add_services(){

        return view('user.add_services');
    }

    public function products(){

        return view('user.product');
    }

    public function add_product(){

        return view('user.add_product');
    }

    public function projects(){

        return view('user.project');
    }

    public function add_project(){

        return view('user.add_project');
    }

    public function team(){

        return view('user.team');
    }

    public function add_team(){

        return view('user.add_team');
    }
}
