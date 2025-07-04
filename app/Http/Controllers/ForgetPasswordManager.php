<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class ForgetPasswordManager extends Controller
{
    public function forgetPassword()
    {
        return view("forget-password");
    }




    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ], [
            'email.required' => 'Email richiesta',
            'email.email' => 'Perfavore inserire un indirizzo email valido',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);


        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });


        return redirect()->to(route('forget.password'))->with('success', 'Link di reset password inviato alla tua email. Controlla la tua casella di posta elettronica.');
    }





    public function resetPassword($token)
    {
        return view('new-password', compact('token'));
    }



    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'email.required' => 'Email richiesta',
            'email.email' => 'Perfavore inserire un indirizzo email valido',
            'password.required' => 'Password richiesta',
            'password.min' => 'La password deve essere di almeno 8 caratteri',
            'password.confirmed' => 'Le password non corrispondono',
            'password_confirmation.required' => 'Conferma password richiesta',
        ]);


        $updatePassword = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset.password'))
                ->with(['error' => 'Token di reset password non valido o scaduto.']);
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success','Password aggiornata con successo. Ora puoi accedere con la tua nuova password.');
    }
}
