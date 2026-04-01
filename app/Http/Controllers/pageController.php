<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
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

    public function login()
    {  
       return view('showpageside.login');
    }

  public function loginSubmit(Request $request){ 
     
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $email = trim($request->email);
    $password = trim($request->password);

    $user = User::where('email', $email)->first();

    // User not found
    if (!$user) {
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    //User is disabled
    if ($user->status == 0) {
        return back()->withErrors(['email' => 'Your account is disabled']);
    }

    //Wrong password
    if (!Hash::check($password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    //Login success
    $request->session()->put('id', $user->id);
    $request->session()->put('name', $user->name);
    $request->session()->put('email', $user->email);
    $request->session()->put('type', $user->role);

    return redirect()->route('dashboard');
}

    public function account()
    {
                return view('showpageside.createAccount');
    }

    public function logout(Request $request)
{
    $request->session()->flush(); // clear all session data
    return redirect()->route('login');
}
}
