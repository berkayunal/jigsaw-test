@php
    $currentLang = isset($setLang) ? $setLang : 'en';
@endphp

<!DOCTYPE html>
<html lang="{{ $currentLang }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        
        <title>@yield('title')</title>
        <meta name="description" content="@yield('metaDescription', '')" />
        <meta name="keywords" content="@yield('metaKeywords', '')" />

        @stack('head')
    </head>

    <body>
        <div id="app">
            <header class="bg-primary py-2">
                <a href="{{ pageLink($currentLang === "en" ? "/" : "/{$currentLang}/") }}" class="text-white w-full text-xl">
                    Home
                </a>
            </header>

            <div class="container max-w-screen-sm px-3 md:p-0">
                <main class="mt-4">
                    @yield('body')
                </main>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
