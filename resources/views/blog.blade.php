<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <div class="py-6 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search articles..." type="search" id="search" name="search" autocomplete="off" value="{{ request('search') }}">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="py-6 px-4 mx-auto max-w-screen-xl lg:py-6 lg:px-6">
        @if (sizeof($data))
        <div class="grid gap-8 lg:grid-cols-2 my-4">
            @foreach ($data as $blog)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <a href="/blog?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                    </span>
                    <span class="text-sm">{{ $blog->created_at->diffForHumans(); }}</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog->body, 150, '...') }}</p>
                <div class="flex justify-between items-center">
                    <a href="/blog?user={{ $blog->user->username }}">
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
        {{ $data->links() }}
        @else
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Articles not found.</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that articles.</p>
                <a href="/blog" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">&laquo; Back to blog</a>
            </div>   
        </div>
        @endif  
    </div>
</x-layout>