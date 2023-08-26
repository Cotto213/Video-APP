<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Calculator\Iban;
use Illuminate\Http\Request;
use Inertia\Inertia;

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


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return Inertia::render( 'Register');
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
        //
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
