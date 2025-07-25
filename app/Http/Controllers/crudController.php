<?php

namespace App\Http\Controllers;

use App\Models\crud;
use App\Models\CrudDetails;
use App\Models\BannerModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        $data = BannerModel::latest()->first();
        $crudData = crud::all();

        return view('welcome', compact('data','crudData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crud()
    {
         $crudData = crud::with(['crudDetails', 'crudDetailsHasMany'])->whereNull('deleted_at')->get();
        // $crudData = DB::table('crud')->with('crudDetails')->whereNull('deleted_at')->get();
        // echo "<pre/>";
        // print_r($crudData);die();
        return view('backend.crud', compact('crudData'));
    }
     public function addModal(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required',
            'price' => 'required|string|max:255',
            'stock' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',

        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();

            $filenames = time() . '.' . $extension;

            $file->move('assets/images/', $filenames);

          
        }       

        crud::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $filenames,
            'price' =>$validated['price'],
            'stock' =>$validated['stock'],
            'color' =>$validated['color'],
            'size' =>$validated['size'],

        ]);

        return redirect('crud')->with('success', 'Product added successfully!');
    }

    public function crudDelete(Request $request){
        $id = $request->crud_dlt_btn;
        crud::where('id',$id)->delete();
        return redirect('crud');
    }

    
    public function crudUpdate(Request $request, $id){
    $crudUpdate = crud::where('id',$id)->first();
    return view('backend.crudUpdate', compact('crudUpdate'));
    }

    public function crudUpdateGetDataId(Request $request)
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
        // echo"hello";die();
        $id = $request->update_btn;
        crud::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filenames,
            'price' =>$request->price,
            'stock' =>$request->stock,
            'color' =>$request->color,
            'size' =>$request->size,
        ]);

        return redirect('crud')->with('success', 'Product updated successfully!');
    }
}
