<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'data' => 'Hello, its the about page !']);
});

Route::get('/blog', function () {
    $data = [
        [
            'id' => 1,
            'slug' => 'blog-a',
            'title' => 'Blog A',
            'author' => 'Zainul Anwar',
            'date' => '12 Juni 2025',
            'description' => 'Firstly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
        [
            'id' => 2,
            'slug' => 'blog-b',
            'title' => 'Blog B',
            'author' => 'Muhammad Raffi Dwi Ashaffah',
            'date' => '12 Juni 2025',
            'description' => 'Secondly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
         [
            'id' => 3,
            'slug' => 'blog-c',
            'title' => 'Blog C',
            'author' => 'Yoga Nugraha',
            'date' => '12 Juni 2025',
            'description' => 'Thirdly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
    ];
    return view('blog', ['title' => 'Blog', 'data' => $data]);
});

Route::get('blog/{slug}', function ($slug) {
    $data = [
        [
            'id' => 1,
            'slug' => 'blog-a',
            'title' => 'Blog A',
            'author' => 'Zainul Anwar',
            'date' => '12 Juni 2025',
            'description' => 'Firstly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
        [
            'id' => 2,
            'slug' => 'blog-b',
            'title' => 'Blog B',
            'author' => 'Muhammad Raffi Dwi Ashaffah',
            'date' => '12 Juni 2025',
            'description' => 'Secondly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
         [
            'id' => 3,
            'slug' => 'blog-c',
            'title' => 'Blog C',
            'author' => 'Yoga Nugraha',
            'date' => '12 Juni 2025',
            'description' => 'Thirdly, lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, natus nemo tempora ex quos eaque magnam doloribus obcaecati nisi rerum voluptate? Neque ratione dolorem fuga eveniet nulla alias repellendus voluptas!'
        ],
    ];
    $blog = Arr::first($data, function($blog) use($slug){
        return $blog['slug'] == $slug;
    });
    if (!is_null($blog)) {
        return view('blog-detail', ['title' => 'Blog Detail', 'blog' => $blog]);
    }else{
        return abort(404);
    }
});

Route::get('/', function () {
    return view('home', ['title' => 'Home', 'data' => 'Hello, its the home page !']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'data' => ['name' => 'Zainul Anwar', 'email' => 'zainul@kosme.co.id']]);
});
