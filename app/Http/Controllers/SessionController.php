<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * login page
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * login actions
     */
    public function store()
    {
        $attributes =  request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

         // auth failed.
        if(!auth()->attempt($attributes)){
           
            throw ValidationException::withMessages([
                'email' => 'Your credientials could not be varified.'
            ]);

        }

        //avoid session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');

    }

    /**
     * logout actions
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
