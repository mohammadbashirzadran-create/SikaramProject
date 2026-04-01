<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('user.common.header');
    }


    public function user(){

     $users = User::all();

        return view('user.user', compact('users'));
    }

    public function user_edit($id){

        $user = User::findOrFail($id);

        return view('user.user_edit', compact('user'));
    }
 
    public function user_update(Request $request, $id){

        $user = User::findOrFail($id);


        if ($user->status == 0) {
             return redirect()->back()->withErrors(['error' => 'Cannot update disabled user']);
       }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',
            'gender' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'role' => $request->role,
        'thumbnail' => $request->thumbnail,
        'updated_at' => now(),
    ];

    // Fetch old user
    $oldUser = DB::table('users')->where('id', $id)->first();

    // Handle Profile Image
    if ($request->hasFile('thumbnail')) {
        // Delete old image
        if ($oldUser->thumbnail && file_exists(public_path('uploads/' . $oldUser->thumbnail))) {
            unlink(public_path('uploads/' . $oldUser->thumbnail));
        }

        // Upload new image
        $file = $request->file('thumbnail');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        $data['thumbnail'] = $filename;
    }

     $user->update($data);

     return redirect()->route('users')->with('success', 'User updated successfully!');
  }

    
    public function add_user(){

        return view('user.add_user');
    }

    public function storeuser(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //upload image
        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $thumbnail = $filename;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role' => $request->role,
            'thumbnail' => $thumbnail,
        ];

        //insert user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'thumbnail' => $data['thumbnail'],
            'password' => Hash::make($request->password),
        ]);
       
        return redirect()->route('users')->with('success', 'User created successfully!');
    }

    public function delete_user($id){

        $user = User::findOrFail($id);

        // Delete profile image
        if ($user->thumbnail && file_exists(public_path('uploads/' . $user->thumbnail))) {
            unlink(public_path('uploads/' . $user->thumbnail));
        }

        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }

    public function services(){
       $services = Service::all();

        return view('user.service',compact('services'));
    }

    public function service_edit($id){

        $services= Service::findOrFail($id);

        return view('user.edit_service', compact('services'));
    }

    public function user_service_update(Request $request, $id){

        $services = Service::findOrFail($id);

        if ($services->status == 0) {
             return redirect()->back()->withErrors(['error' => 'Cannot update disabled service']);
       }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
    // Keep old image by default
    $imageName = $services->image;

    // If new image uploaded
    if ($request->hasFile('image')) {

        // delete old image
        if ($services->image && file_exists(public_path('uploads/'.$services->image))) {
            unlink(public_path('uploads/'.$services->image));
        }

        // upload new image
        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads'), $imageName);
    }

         $data = [
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imageName,
        'updated_at' => now(),
    ];
    $services->update($data);

     return redirect()->route('user.services')->with('success', 'Service updated successfully!');
  }

    public function add_services(){
        return view('user.add_services');
    }

    public function store_service(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        //upload image
        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);
        }

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'user_id' => session('id'),
        ]);
       

        return redirect()->route('user.services')->with('success', 'Service created successfully!');
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


    public function toggle($id){

    $user = User::findOrFail($id);
    $user->status = !$user->status;
    $user->save();

    return redirect()->back(); 
}
  public function toggle_service($id){

    $services = Service::findOrFail($id);
    $services->status = !$services->status;
    $services->save();

    return redirect()->back(); 
  }
}
