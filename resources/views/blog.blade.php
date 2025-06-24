<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-2">
            @foreach ($data as $blog)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <a href="/blog-category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                    </span>
                    <span class="text-sm">{{ $blog->created_at->diffForHumans(); }}</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog->body, 150, '...') }}</p>
                <div class="flex justify-between items-center">
                    <a href="/blog-author/{{ $blog->user->username }}">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $blog->user->name }}" />
                            <span class="font-medium dark:text-white">
                                {{ $blog->user->name }}
                            </span>
                        </div>
                    </a>
                    <a href="/blog/{{ $blog->slug }}" class="inline-flex items-center text-sm text-primary-600 dark:text-primary-500 rounded-full px-2 no-underline border border-primary-600 bg-white hover:text-white hover:bg-primary-950 hover:border-primary-950">
                        Read more &raquo;
                    </a>
                </div>
            </article>
            @endforeach                   
        </div>  
    </div>
</x-layout>