<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <x-meta_tags :article="$page['props']['article'] ?? null"/>

    @production
        <script src="https://cdn.usefathom.com/script.js" data-site="ZLTGUHEL" defer></script>
    @endproduction

    @vite('resources/css/app.css')
    <link rel="preload" as="image" href="/img/avatar.webp" type="image/webp">

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<body class="antialiased bg-amber-50 selection:bg-emerald-600 selection:text-white">
    @inertia
</body>
</html>
