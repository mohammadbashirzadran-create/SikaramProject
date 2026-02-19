<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

     public function services()
    {
            return view('service');
    }

    public function features()
    {
            return view('feature');
    }
    public function project()
    {
            return view('project');
    }

    public function team()
    {
                return view('team');
    }
    
    public function testimonial()
    {
                return view('testimonial');
    }

    public function quote()
    {
                return view('quote');
    }

   public function errorhandle()
    {
                return view('404');
    }
}
