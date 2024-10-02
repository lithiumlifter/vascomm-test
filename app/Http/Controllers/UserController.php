<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewUserMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('adminpage.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('adminpage.pages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
        ]);

        $password = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        // Mail::to($user->email)->send(new NewUserMail($user, $password));

        return redirect()->route('manage-user')->with('success', 'User created and email sent!');
    }

    public function show(User $user)
    {
        return view('adminpage.pages.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('adminpage.pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);
    
        return redirect()->route('manage-user')->with('success', 'User updated successfully!');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('manage-user')->with('success', 'User deleted successfully!');
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'active' ? 'pending' : 'active';
        $user->save();

        return redirect()->route('manage-user')->with('success', 'User status updated successfully!');
    }

    
}
