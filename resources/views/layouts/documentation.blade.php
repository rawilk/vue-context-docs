@extends('layouts.master')

@section('nav-menu')
    <nav class="nav-menu">
        @include('partials.menu', ['items' => $pages->all()])
    </nav>
@endsection

@section('content')
@yield('header')

<section class="container px-6 py-12 mx-auto md:px-8">
    <div class="flex flex-col lg:flex-row">
        <nav class="nav-menu hidden lg:block">
            @include('partials.menu', ['items' => $pages->all()])
        </nav>

        <div class="w-full break-words lg:pl-4 content" style="overflow: auto;" v-pre>
            <h1>{!! $title !!}</h1>

            @yield('content')

            <div class="pt-8 pb-6 mt-12 border-t-2">
                @include('partials.footer-links')
            </div>
        </div>
    </div>
</section>
@overwrite
