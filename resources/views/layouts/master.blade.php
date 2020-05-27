@extends('layouts.base')

@section('content')
<header class="relative flex justify-between items-center h-24 py-4 px-4 bg-white" role="banner">
    <div class="flex items-center container mx-auto">
        <div class="flex items-center">
            <a href="/" title="{{ config('app.name') }} home" class="items-center inline-flex">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="hidden sm:flex items-center justify-end flex-1 text-sm text-right md:pl-10 sm:text-base">
            <a href="{{ config('docs.githubRepo') }}">
                <svg class="w-6 ml-3 text-gray-800 fill-current sm:w-8 sm:ml-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>GitHub</title><path d="M10 0a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.9 1.52 2.34 1.08 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.64s.84-.27 2.75 1.02a9.58 9.58 0 0 1 5 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.4.1 2.64.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85l-.01 2.75c0 .26.18.58.69.48A10 10 0 0 0 10 0"></path></svg>
            </a>
        </div>

        <div
            x-data="{ open: false }"
            x-show="open"
            @@set-nav-open.window="open = $event.detail"
            class="fixed inset-0 z-20"
            style="background: rgba(0, 0, 0, 0.5); display: none;"
        >
            <div
                x-show.transition.opacity="open"
                class="fixed left-0 top-0 p-6"
            >
                @include('partials.menu-toggle')
            </div>

            <div
                x-show.transition.translate="open"
                @click.away="$dispatch('set-nav-open', false)"
                class="bg-white bottom-0 fixed right-0 top-0 z-10 p-4 w-4/6 overflow-y-auto"
            >
                <div class="flex flex-col pt-4">
                    <a href="{{ config('docs.githubRepo') }}" class="text-blue-800">Github</a>
                </div>

                <div>
                    <hr class="border-gray-200 mb-0 mt-8">
                    <div class="-ml-8">
                        @yield('nav-menu')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.menu-toggle')

</header>

<main role="main" class="flex-auto w-full">
    @yield('content')
</main>
@overwrite
