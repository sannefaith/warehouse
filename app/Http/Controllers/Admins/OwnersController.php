<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = User::where('role', 'owner')->orderBy('name')->paginate(6);
        // dd($user);
        return view('admins.owners.showOwners', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admins.owners.editOwners', [
            'user' => $user,
            'allRoles' => Role::all()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         // $role = Role::where('name', $request->roles['user']['user']['name'])->first();
        // if($user->role != 'admin' && $role->name != 'user')
        // {
        //     $user->roles()->sync($role);
        //     $user->update(['role' => 'owner']);
        // }
        $request->validate([
            'role' => 'required'
        ]);

        // dd($request);
        // $user->roles()->sync('role');
        $user->update( $request->only(['role']));
        return redirect(route('admins.owners.showOwners'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete( );

        return redirect(route('admins.owners.showOwners'))->withSuccess('Owner deleted successfully');
    }
}
