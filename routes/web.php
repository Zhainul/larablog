<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'data' => Post::all()]);
});

Route::get('blog/{post:slug}', function (Post $post) {
    return view('blog-detail', ['title' => 'Blog Detail', 'blog' => $post]);
});

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'data' => 'Hello, its the home page !']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});
