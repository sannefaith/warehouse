<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        # code...
        $users = auth()->user()->pluck('id');

        $posts = Post::whereIn('id', $users)->with('user')->latest()->paginate(6);

        return view('posts.index', compact('posts'));
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
            'price' => 'required',
            'image' => ['required','image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'location' => $data['location'],
            'size' => $data['size'],
            'price' => $data['price'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);

    }

    public function show(Post $post)
    {
        # code...
        // dd($post);
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete( );

        return redirect('/profile/'.auth()->user()->id)->withSuccess('Image deleted successfully');
    }
}
