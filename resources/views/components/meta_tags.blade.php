@props(['article'])

@if($article)
    <meta property="og:title" content="{{ $article['title'] }}">
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $article['meta_description'] }}">
    <meta property="og:image" content="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url("/img/social/{$article['slug']}.jpeg") }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="article:author" content="Yoeri Boven">
    <meta name="twitter:card" content="summary_large_image">

    @isset($article['published_date'])
        <meta property="article:published_time" content="{{ $article['publish_date']->toAtomString() }}">
    @endisset

    @isset($article['last_modified'])
        <meta property="article:modified_time" content="{{ $article['last_modified']->toAtomString() }}">
    @endisset
@endif

