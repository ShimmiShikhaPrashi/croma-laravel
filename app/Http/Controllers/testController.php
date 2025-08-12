<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Category;



class testController extends Controller
{
    public function index(){
    //   User has one contact 
      
    // $user = User::with('contact')->first(); 
    //  return $user->contact;
    // dd($user->toArray());
    //   $contact = Contact::with('user')->first(); 
    // dd($contact->toArray());

    //onetoMany
    // $user = User::with(['contact','posts'])->find(1);
    // dd($user->toArray());
    // $post = Post::with(['user'])->find(1);
    // dd($post->toArray());

    //ManyToMany
    $categories = Category::all();
    $post = Post::with('categories')->first(); 
    $post->categories()->attach($categories);
    // $post->categories()->sync([1,2]);
    // $post->categories()->detach([1,2]);


    $post = Post::with('categories')->first(); 

    dd($post->toArray());
    }
    public function subscribe()
    {
        return view('subscribe');
    }

}
