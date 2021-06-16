<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'size' => 'required',
            'image' => ['required','image'],
        ]);

        dd(request('image')->store('uploads', 'public'));
        
        auth()->user()->posts()->create($data);

        dd($data);

    }
}
