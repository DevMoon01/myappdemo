<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request as Request;

class AuthController extends Controller
{




    //! Funzione per visualizzazione pagina register
    //? Questa funzione gestisce la 
    //? visualizzazione della pagina di register
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'fullname.required' => 'Il nome completo è obbligatorio.',
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'L\'email deve essere un indirizzo email valido.',
            'email.unique' => 'L\'email è già in uso.',
            'password.required' => 'La password è obbligatoria.',
            'password.min' => 'La password deve contenere almeno 8 caratteri.',
            'password.confirmed' => 'Le password non corrispondono.',
        ]);


        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect(route('login'))
                ->with('success', 'Registrazione completata con successo!');
        }

        return redirect("route('register')")
            ->with(['error' => 'Si è verificato un errore durante la registrazione.']);
    }






















    //! Funzione per visualizzazione pagina login
    //? Questa funzione gestisce la 
    //? visualizzazione della pagina di login
    public function login()
    {
        return view('auth.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'L\'email deve essere un indirizzo email valido.',
            'password.required' => 'La password è obbligatoria.',
            'password.min' => 'La password deve contenere almeno 8 caratteri.',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))
                ->with('success', 'Login effettuato con successo!');
        }

        return redirect(route('login'))
            ->with('error', 'Le credenziali fornite non sono corrette.');
    }















    public function logoutPost()
    {
        Auth::logout();
        return redirect(route('login'))
            ->with('success', 'Logout effettuato con successo!');
    }
}
