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
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        # code...
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'description' => 'required',
            'phone' => ['required','numeric'],
            'office' => 'required',
            'image' => '',
        ]);

        auth()->user->profile->update($data);

        return redirect("/profile/{$user->id}");

    }

}
