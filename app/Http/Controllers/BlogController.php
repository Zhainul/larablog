<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show() : View 
    {
        $data = Post::filter(request(['search', 'category', 'user']))->latest()->paginate(10)->withQueryString();
        $header = !request('search') ? 'All Articles' : count($data).' Articles found';
        return view('blog', ['title' => 'Blog', 'header' => $header, 'data' => $data]);
    }

    public function detail(Post $post) : View 
    {
        return view('blog-detail', ['title' => 'Blog', 'header' => 'Article Detail', 'blog' => $post]);
    }
}
