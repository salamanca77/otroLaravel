<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }
    
    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);


        $user->name = $data['name'];
        $user->email = $data['email'];

        if (($data['password'])) {
            $user->password = bcrypt($data['password']) ;
        }

        $user->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario actualizado exitosamente.',
            'txt' => 'El usuario ha sido actualizado.',
            ]);

        return redirect()->route('admin.users.edit', $user)->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
