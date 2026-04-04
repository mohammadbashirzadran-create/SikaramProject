<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Product;
use App\Models\Category;
use App\Models\Project;
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

     return redirect()->route('services')->with('success', 'Service updated successfully!');
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


        return redirect()->route('services')->with('success', 'Service created successfully!');
    }
    public function products(){

      $products = Product::with(['user', 'category'])->get();

        return view('user.product', compact('products'));
    }

    public function add_product(Request $request){

     $category = Category::all();

        return view('user.add_product', compact('category'));
    }


    public function store_product(Request $request){

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
           'description' => 'required|string',
           'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //upload image
        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

           if ($file->isValid()) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);
            } else {
                return redirect()->back()->withErrors(['image' => 'Uploaded file is not valid']);
            }
        }

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
            'user_id' => session('id'),
        ]);


        return redirect()->route('products')->with('success', 'Product created successfully!');
    }

        public function product_edit($id){

            $product = Product::findOrFail($id);
            $category = Category::all();

            return view('user.edit_product', compact('product', 'category'));
        }

        public function update_product(Request $request, $id){

            $product = Product::findOrFail($id);

            if ($product->status == 0){
                return redirect()->back()->withErrors(['error' => 'Cannot update disabled product']);
            }

            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

        // Keep old image by default
        $imageName = $product->image;
        // If new image uploaded
        if ($request->hasFile('image')) {
            // delete old image
            if ($product->image && file_exists(public_path('uploads/'.$product->image))) {
                unlink(public_path('uploads/'.$product->image));
            }
            // upload new image
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);
        }

         $data = [
        'name' => $request->name,
        'category_id' => $request->category,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageName,
        'updated_at' => now(),
    ];
         $product->update($data);
        return redirect()->route('products')->with('success', 'Product updated successfully!');
        }

    // public function projects(){

    //     return view('user.project');
    // }

    // public function add_project(){

    //     return view('user.add_project');
    // }

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

       $category = DB::table('categories')->get();

         return view('user.category', compact('category'));
    }

    public function add_category(Request $request){

        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        DB::table('categories')->insert([
            'name' => $request->name,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         return redirect()->route('category')->with('success', 'Category created successfully!');
    }

    public function edit_category($id){

        $category = DB::table('categories')->where('id', $id)->first();

        return view('user.edit_category', compact('category'));
    }

     public function update_category(Request $request, $id){

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

         return redirect()->route('category')->with('success', 'Category updated successfully!');
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

  public function toggle_category($id){

    $category = DB::table('categories')->where('id', $id)->first();
    $newStatus = !$category->status;
    DB::table('categories')->where('id', $id)->update(['status' => $newStatus]);

    return redirect()->back();
  }

  public function toggle_product($id){

    $product = Product::findOrFail($id);
    $product->status = !$product->status;
    $product->save();

    return redirect()->back();
  }


  //project  codes





    // List all projects
    public function projects() {
        $projects = Project::latest()->get();
        return view('user.project', compact('projects'));
    }

    // Show add project form
    public function add_project() {
        return view('user.add_project');
    }

    // Store new project
    public function store_project(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Project::create([

            'title' => $request->title,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
            'user_id' => session('id'),
        ]);

        return redirect()->route('projects')->with('success', 'Project added successfully');
    }

    // Show edit form
    public function edit_project($id) {
        $project = Project::findOrFail($id);
        return view('user.edit_project', compact('project'));
    }

    // Update project
    // public function update_project(Request $request, $id) {
    //     $project = Project::findOrFail($id);

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'location' => 'required|string|max:255',
    //         'capacity' => 'required|numeric',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image|max:2048',
    //         'status' => 'required|boolean',
    //     ]);

    //     $data = $request->only(['title', 'location', 'capacity', 'description', 'status']);

    //     if($request->hasFile('image')){
    //         if($project->image && file_exists(public_path('uploads/'.$project->image))){
    //             unlink(public_path('uploads/'.$project->image));
    //         }
    //         $file = $request->file('image');
    //         $filename = time().'_'.$file->getClientOriginalName();
    //         $file->move(public_path('uploads'), $filename);
    //         $data['image'] = $filename;
    //     }

    //     $project->update($data);

    //     return redirect()->route('projects')->with('success', 'Project updated successfully');
    // }

    public function update_project(Request $request, $id)
{
    $project = Project::findOrFail($id);

    // Check if project is disabled
    if ($project->status == 0) {
        return redirect()->back()->with('error', 'You cannot edit this project because it is disabled. Enable it first.');
    }

    $request->validate([
        'title' => 'required|string',
        'location' => 'required|string',
        'capacity' => 'required|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['title', 'location', 'capacity', 'description']);

    // Handle image upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $data['image'] = $filename;
    }

    $project->update($data);

    return redirect()->route('projects')->with('success', 'Project updated successfully');
    }

    // Toggle project status
    public function toggle_project($id){
        $project = Project::findOrFail($id);
        $project->status = !$project->status;
        $project->save();

        return redirect()->back()->with('success', 'Project status updated');
    }

    // Delete project
    public function delete_project($id){
        $project = Project::findOrFail($id);

        if($project->image && file_exists(public_path('uploads/'.$project->image))){
            unlink(public_path('uploads/'.$project->image));
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
  //end of project codes

