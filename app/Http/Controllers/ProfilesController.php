<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        // $user = User::findOrFail($user);
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        # code...
        return view('profiles.edit', compact('user'));
    }

    public function update()
    {
        # code...
        $data = request()->validate([
            'description' => '',
            'phone' => '',
            'office' => '',
            'image' => '',
        ]);

        dd($data);
    }

}
