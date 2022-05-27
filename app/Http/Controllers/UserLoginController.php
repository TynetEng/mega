<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class UserLoginController extends Controller
{
    public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    try {
        
        $user = Socialite::driver('google')->stateless()->user();
        
        
        $findUser = User::where('google_id', $user->id)->first();
        // var_dump($findUser);

        $duplicateEmail = User::where('email', $user->email)->first();
        

            if($findUser){
                // return "hi";
                Auth::login($findUser);
                $User = auth()->user();
                return "heelo";
                return redirect('/dashboard');
            }
            elseif($duplicateEmail){
                Auth::login($findUser);
                $User = auth()->user();
                return "hi";
                return redirect('/dashboard');
            }else{
                $newUser = User::insert([
                    'firstName' => $user->user['given_name'],
                    'lastName' => $user->user['family_name'],
                    'email' => $user->user['email'],
                    'google_id'=> $user->id,
                    'image'=> 0,
                    'phoneNumber'=>'',
                    'password' => Hash::make('123456dummy'),
                    'remember_token'=>'',
                    'created_at'=>now()
                ]);
                
                Auth::login($newUser);
               
                return redirect()->intended('/dashboard');
            }
        } catch (Exception $e) {
            return "error";
        }
   }
}


