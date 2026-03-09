<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    function registerProcess(RegisterRequest $request) {

       $validated = $request->validated();

        User::create($validated);
        //flash session-el mentem a sikeres üzenetet: (3 módszerrel is megoldható)
       // $request->session()->flash('success', 'A regisztráció sikeres volt.')    1.megoldás
       //Session::flash('success', 'A regisztráció sikeres volt.');   2.megoldás
       // 3. megoldás:
       return redirect()->back()->with('success', __('Registered successfully!') );
    }
    
  
    function loginProcess(Request $request){
        //Auth::attempt - beléptet, ha nem sikerül false értéket ad vissza
         //Auth::check - megnézi be van-e lépve a felhasználó
          //Auth::login - beléptet
           //Auth::logout - kiléptet
            //Auth::user()->name, az adatbázisban levő adatokat tartalmazza

            $loginresult = Auth::attempt($request->only(['email','password']),
             $request->remember ); 

            if($loginresult) {
                 return redirect()->to('/profile')->with('success', __('Logged in successfully!'));
               }else {
                 return redirect()->back()->with('error', __('Login failed!'));
               }
            }
        }