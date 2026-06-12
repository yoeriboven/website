@props(['article'])

@if($article)
    <meta property="og:site_name" content="Yoeri.me">
    <meta property="og:title" content="{{ $article['title'] }}">
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $article['meta_description'] }}">
    <meta property="og:image" content="{{ asset('img/articles/og/'.$article['slug'].'.jpeg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:author" content="Yoeri Boven">

    <meta name="twitter:card" content="summary_large_image" />
    <meta property="twitter:domain" content="yoeri.me">
    <meta property="twitter:url" content="https://yoeri.me/">
    <meta name="twitter:title" content="{{ $article['title'] }}" />
    <meta name="twitter:description" content="{{ $article['meta_description'] }}" />
    <meta name="twitter:image" content="{{ asset('img/articles/og/'.$article['slug'].'.jpeg') }}" />

    @isset($article['publish_date'])
        <meta property="article:published_time" content="{{ $article['publish_date']->toAtomString() }}">
    @endisset
@endif

