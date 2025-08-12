<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\CrudTest;
use App\Models\testModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileUpdateMail;
class BannerController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // this is using in crudController 
    // public function welcome()
    // {
    //     // $data = BannerModel::all();
    //     $data = BannerModel::latest()->first();

    //     return view('welcome', compact(var_name: 'data'));
    // }
    // fetch
    public function banner()
    {
        $crudtest = CrudTest::all();
        $data = BannerModel::all();

        return view('backend.banner', compact('crudtest', 'data'));
    }
    // add
    public function addBanner(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',//left(title) =db, right(title) =blade
            'description' => 'required|string',
            'image' => 'required',
            // 'video' => 'required|file|mimetypes:video/mp4'
            'video' => 'required|file|mimetypes:video/mp4|max:10240' // 10MB

        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $filenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/images/', $filenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $videofilenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/video/', $videofilenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }


        BannerModel::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $filenames,
            'video' => $videofilenames
        ]);

        return redirect('/banner')->with('success', 'Banner added successfully!');
    }
    public function addModal(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',//left(title) =db, right(title) =blade
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'video' => 'required|file|mimetypes:video/mp4'
            'video' => 'required|file|mimetypes:video/mp4|max:10240' // 10MB

        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $filenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/images/', $filenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $videofilenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/video/', $videofilenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }


        BannerModel::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $filenames,
            'video' => $videofilenames
        ]);

        return redirect('/banner')->with('success', 'Banner added successfully!');
    }
    //delete
    public function deleteBanner(Request $request)
    {
        $id = $request->dlt_btn;
        BannerModel::where('id', $id)->delete();
        return redirect('/banner')->with('error', 'Banner deleted successfully');
    }

    // it is used to pass id in update button to open edit page with one id
    // here use first() which return one row from db
    public function updateBanner(Request $request, $id)
    {
        $dataUpdate = BannerModel::where('id', $id)->first();

        return view('backend.updateBanner', data: compact('dataUpdate'));

    }

    //getId
    //updateID
    public function updateGetDataID(Request $request)
    { 
        $filenames=$request->old_image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $filenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/images/', $filenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }
        $videofilenames=$request->video;
        if ($request->hasFile('video')) {
            $file = $request->file('video');

            // Get the file's extension
            $extension = $file->getClientOriginalExtension();

            // Create a unique filename
            $videofilenames = time() . '.' . $extension;

            // Store the file in 'public/images' directory in storage (use 'public' disk)
            $file->move('assets/video/', $videofilenames);

            // Save the file's path in the database
            // $student->image = $filenames;
        }
        // echo"hello";die();
        $id = $request->update_btn;
        BannerModel::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' =>  $filenames,
            'video' =>  $videofilenames,
        ]);

        return redirect('banner')->with('success', 'Banner updated successfully!');
    }

    public function activeStatus(Request $request)
    {
        $id = $request->input('user_id');
        $status = $request->input('status'); // 1 or 2

        BannerModel::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect('banner')->with('success', 'Banner status updated successfully!');
    }


    public function addTest(Request $request){
        CrudTest::create([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name
        ]);

    return redirect('banner');
    }
    public function deleteTest(Request $request){
    $id = $request->crud_dlt_btn;
    CrudTest::where('id',$id)->delete();
    return redirect('banner');
    }

    public function updateTest(Request $request, $id){
    $crudUpdate = CrudTest::where('id',$id)->first();
    return view('backend.crudUpdate', compact('crudUpdate'));
    }

    public function updateTestGetDataId(Request $request){
    $id = $request->update_btn;  
    CrudTest::where('id',$id)->update([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name
    ]);
    return redirect('banner');
    }

    public function profile(){
         $user = Auth::user();
        return view('backend.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    if ($request->filled('old_password') || $request->filled('new_password')) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with(['old_password' => 'Old password is incorrect']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
    }

    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    Mail::to('shimmikachhap@gmail.com')->send(new ProfileUpdateMail($user));

    return redirect('profile')->with('success', 'Profile updated successfully!');
    }
   

}
