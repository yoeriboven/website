<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <x-meta_tags :article="$page['props']['article'] ?? null"/>

    <script src="https://cdn.usefathom.com/script.js" data-site="ZLTGUHEL" defer></script>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
</head>
<body class="antialiased bg-violet-50 selection:bg-violet-600 selection:text-white">
    @inertia
</body>
</html>
