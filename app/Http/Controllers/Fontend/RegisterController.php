<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        
    }

    public function index() {

        $template = 'fontend.user.register.index';
        return view('fontend.layout', compact(
            'template'
        ));
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|',
        ]);
        $users = new User;
        $users -> name = $request ->input('name');
        $users -> email = $request ->input('email');
        $users -> password = Hash::make($request->input('password'));   
        $users -> save();

        return redirect()->route('login.index')->with('success', 'Registration successful! Please log in.');

    }
}