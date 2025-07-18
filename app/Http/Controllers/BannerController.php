<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Http\Request;

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

      public function welcome()
    {
        // $data = BannerModel::all();
        $data = BannerModel::latest()->first();

        return view('welcome', compact('data'));
    }
// fetch
    public function banner()
    {
        $data = BannerModel::all();
        return view('backend.banner', compact('data'));
        // return view('welcome', compact('data'));

    }
// add
    public function addBanner(Request $request)
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
    public function deleteBanner(Request $request){
    $id=$request->dlt_btn;
    BannerModel::where('id', $id)->delete();
    return redirect('/banner');
    }

    //update

    public function updateBanner(Request $request,$id){
    $dataUpdate = BannerModel::where('id', $id)->first();
    
    return view('backend.updateBanner', data: compact('dataUpdate'));
       

    }
    //getId
    //updateID
    public function updateGetDataID(Request $request)
    {
        // echo"hello";die();
        $id= $request->update_btn;
        BannerModel::where('id',$id)->update([
            'title' => $request->title,
            'description' =>  $request->description,
            // 'image' =>  $request->filenames,
            // 'video' =>  $request->videofilenames,
        ]);

        return redirect('banner')->with('success', 'Banner updated successfully!');
    }
    
}
