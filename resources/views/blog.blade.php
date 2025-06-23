<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($data as $blog)
                <article class="flex max-w-xl flex-col items-start justify-between">
                    <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16" class="text-gray-500">{{ $blog->created_at->diffForHumans(); }}</time>
                    <a href="/blog-category/{{ $blog->category->slug }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $blog->category->name }}</a>
                    </div>
                    <div class="group relative">
                    <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                        <a href="/blog/{{ $blog->slug }}">
                        <span class="absolute inset-0"></span>
                        {{ $blog->title }}
                        </a>
                    </h3>
                    <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ Str::limit($blog->body, 200, '...') }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full bg-gray-50" />
                    <div class="text-sm/6">
                        <p class="font-semibold text-gray-900">
                        <a href="/blog-author/{{ $blog->user->username }}">
                            <span class="absolute inset-0"></span>
                            {{ $blog->user->name }}
                        </a>
                        </p>
                        {{-- <a href="/blog/{{ $blog->slug }}" class="rounded-full border border-blue-950 bg-white text-blue-950 text-xs px-2 hover:text-white hover:bg-blue-950">Readmore &raquo;</a> --}}
                    </div>
                    </div>
                </article>
                @endforeach
                <!-- More posts... -->
            </div>
        </div>
    </div>
</x-layout>