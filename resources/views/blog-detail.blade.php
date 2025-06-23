<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>
    <main class="pt-8 pb-16 lg:pt-10 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="/blog-author/{{ $blog->user->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->user->name }}</a>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-300"><a href="/blog-category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></span>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $blog->created_at->format('d M Y') }}</time></p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $blog->title }}</h1>
            </header>
            {{-- <p class="lead">Flowbite is an open-source library of UI components built with the utility-first
                classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                datepickers.</p> --}}
                <p>{{ $blog->body }}</p>
                <a href="/blog" class="no-underline rounded-full border border-blue-950 bg-white text-blue-950 text-xs px-2 hover:text-white hover:bg-blue-950">&laquo; Back to blog</a>
        </article>
    </div>
    </main>
</x-layout>