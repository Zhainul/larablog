<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <article class="py-5 max-w-screen-md">
        <h3 class="text-xl font-bold text-gray-900">{{ $blog->title }}</h3>
        <div class="text-sm text-gray-500">
            <a href="/blog-author/{{ $blog->user->id }}">{{ $blog->user->name }}</a> | {{ $blog->created_at->diffForHumans() }}
        </div>
        <p class="font-light my-4">{{ $blog->body }}</p>
        <a href="/blog" class="rounded-full border border-blue-950 bg-white text-blue-950 text-xs px-2 hover:text-white hover:bg-blue-950">&laquo; Back to blog</a>
    </article>
</x-layout>