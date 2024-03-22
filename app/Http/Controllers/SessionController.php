<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * login actions
     */
    public function create()
    {
        return view('session.create');
    }


    public function store()
    {
        $attributes =  request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){

            //avoid session fixation
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed.
        throw ValidationException::withMessages([
            'email' => 'Your credientials could not be varified.'
        ]);

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
