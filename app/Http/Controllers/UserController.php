<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'type' => 'required',
            'phone' => 'required',

        ]);

        // Create the user (you would typically use a User model here)
         User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // ✅ VERY IMPORTANT
        'gender' => $request->gender,
        'type' => $request->type,
        'phone' => $request->phone,
        'role' => $request->role,
    ]);
        // User::create($request->all());

       return redirect()->back()->with('success', 'User created successfully');
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

    public function testimonials(){

        return view('user.testimonials');
    }

    public function add_testimonials(){

        return view('user.add_testimonials');
    }

    public function quotes(){

        return view('user.quotes');
    }

    public function add_quotes(){

        return view('user.add_quotes');
    }

    public function contact(){

        return view('user.contact');
    }

    public function profile(){
        return view('user.profile');
    }

    public function site_setting(){
        return view('user.site_setting');
    }

    public function category(){

         return view('user.category');
    }
}
