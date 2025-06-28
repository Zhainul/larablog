<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'header' => 'About Page', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', function () {
    $data = Post::filter(request(['search', 'category', 'user']))->latest()->get();
    $header = !request('search') ? 'All Articles' : count($data).' Articles found';
    return view('blog', ['title' => 'Blog', 'header' => $header, 'data' => $data]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('blog-detail', ['title' => 'Blog', 'header' => 'Article Detail', 'blog' => $post]);
});

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'header' => 'Home Page', 'data' => 'Share experiences and knowledge about technology and programming.']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'header' => 'Contact Page', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});

Route::get('/login', function () {
    return view('login');
});
