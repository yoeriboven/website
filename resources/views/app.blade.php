<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <x-meta_tags :article="$page['props']['article'] ?? null"/>

    @production
        <script src="https://metal-pretty.yoeri.me/script.js" data-site="ZLTGUHEL" defer></script>
    @endproduction

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="preload" as="image" href="/img/avatar.webp" type="image/webp">

    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body class="antialiased bg-amber-50 selection:bg-emerald-600 selection:text-white">
    @inertia
</body>
</html>
