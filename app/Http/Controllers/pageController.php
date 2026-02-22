<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index()
    {
        return view('showpageside.home');
    }

    public function about()
    {
        return view('showpageside.about');
    }

    public function contact()
    {
        return view('showpageside.contact');
    }

     public function services()
    {
            return view('showpageside.services');
    }

    public function features()
    {
            return view('showpageside.features');
    }
    public function project()
    {
            return view('showpageside.project');
    }

    public function team()
    {
                return view('showpageside.team');
    }
    
    public function testimonial()
    {
                return view('showpageside.testimonial');
    }

    public function quote()
    {
                return view('showpageside.quote');
    }

   public function errorhandle()
    {
                return view('showpageside.404');
    }
}
