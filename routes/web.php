<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'header' => 'About Page', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', [BlogController::class, 'show']);
Route::get('/blog/{post:slug}', [BlogController::class, 'detail']);

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'header' => 'Home Page', 'data' => 'Share experiences and knowledge about technology and programming.']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'header' => 'Contact Page', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});

Route::get('/login', function () {
    return view('login');
});
