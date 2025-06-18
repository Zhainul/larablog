<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    @foreach ($data as $blog)
    <article class="py-5 max-w-screen-md border-b border-gray-300">
        <a href="/blog/{{ $blog->slug }}" class="hover:underline">
            <h3 class="text-xl font-bold text-gray-900">{{ $blog->title }}</h3>
        </a>
        <div class="text-sm text-gray-500">
            <a class="hover:underline" href="/blog-author/{{ $blog->user->id }}">{{ $blog->user->name }}</a> | {{ $blog->created_at->diffForHumans(); }}
        </div>
        <p class="font-light my-4">{{ Str::limit($blog->body, 200, '...') }}</p>
        <a href="/blog/{{ $blog->slug }}" class="rounded-full border border-blue-950 bg-white text-blue-950 text-xs px-2 hover:text-white hover:bg-blue-950">Readmore &raquo;</a>
    </article>
    @endforeach
</x-layout>