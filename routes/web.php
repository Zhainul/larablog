<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'data' => Blog::all()]);
});

Route::get('blog/{blog:slug}', function (Blog $blog) {
    return view('blog-detail', ['title' => 'Blog Detail', 'blog' => $blog]);
});

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'data' => 'Hello, its the home page !']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});
