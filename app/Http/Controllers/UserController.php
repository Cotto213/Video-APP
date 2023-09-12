<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Faker\Calculator\Iban;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use function PHPUnit\Framework\at;
use function Termwind\render;

class UserController extends Controller
{
    public function getLogin(){
        return Inertia::render('Login');
    }

    public function postLogin(Request $request)
    {
        $attributes=$request->validate([
            'email'=>'required|email|max:50',
            'password'=>'required|string|max:100'
        ]);
        $remember= $request->has('remember_me');
        if(\Auth::attempt($attributes,$remember)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email'=>'Incorrect username or password.'
        ]);
    }

    public function getRegister()
    {
        return Inertia::render('Register');
    }

    public function postRegister(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|max:100|confirmed',
        ]);

        Auth::login(User::create($attributes));
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create( )
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return Inertia::render('Profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
