@props(['article'])

@if($article)
    <meta property="og:title" content="{{ $article['title'] }}">
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $article['meta_description'] }}">
    <meta property="og:image" content="{{ asset("img/social/{$article['slug']}.jpeg") }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
@endif

