<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\OnlyForUsers;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\OnlyForGuests;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware'=> [OnlyForGuests::class]], function() {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register-process', [UserController::class, 'registerProcess'])->name('registerProcess');
    Route::post('/login-process', [UserController::class, 'loginProcess'])->name('loginProcess');
});

Route::group(['middleware'=> [OnlyForUsers::class]], function() {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login')->with('success', __('Logout successfully!'));
    })->name('logout');

    Route::resource('tools', ToolsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('tags', TagController::class);
});

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/search', function(Request $request) {
    $list = User::where(function($query) use($request) {
        $query->where('name','like','%'.$request->kw.'%')
              ->orWhere('email','like','%'.$request->kw.'%');
    })->whereNotNull('email_verified_at')->get();

    return view('search', compact('list'));
})->name('search');