<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@hasSection('title') @yield('title') | @endif vue-context</title>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="{!! mix('css/app.css') !!}">
    </head>
    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-100">
        @include('partials.header')

        <main role="main" class="flex-auto w-full">
            <section class="container px-6 py-12 mx-auto md:px-8">
                <div class="flex flex-col lg:flex-row">
                    @include('partials.side-nav')

                    <div class="w-full break-words content lg:pl-4">
                        @yield('content')
                    </div>
                </div>
            </section>
        </main>

    </body>
</html>
