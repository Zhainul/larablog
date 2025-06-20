<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'header' => 'About Page', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'header' => 'All Articles', 'data' => Post::all()]);
});

Route::get('blog/{post:slug}', function (Post $post) {
    return view('blog-detail', ['title' => 'Blog', 'header' => 'Article Detail', 'blog' => $post]);
});

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'header' => 'Home Page', 'data' => 'Hello, its the home page !']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'header' => 'Contact Page', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});

Route::get('/blog-author/{user:username}', function (User $user) {
    return view('blog', ['title' => 'Blog', 'header' => count($user->post).' Article by '.$user->name, 'data' => $user->post]);
});

Route::get('/blog-category/{category:slug}', function (Category $category) {
    return view('blog', ['title' => 'Blog', 'header' => count($category->post).' Article with category '.$category->name, 'data' => $category->post]);
});
