<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>
<body class="antialiased">
    <div class="w-[1200px] h-[630px] bg-violet-600 p-12 text-white text-3xl space-y-3 flex flex-col justify-between">
        <div class="flex justify-between">
            <div class="font-medium text-violet-600 text-xl rounded-2xl bg-violet-300 w-fit px-4 uppercase">New Article</div>
            <div class="font-medium text-violet-600 text-xl rounded-2xl bg-violet-300 w-fit px-4 uppercase">Yoeri.me</div>
        </div>
        <div class="flex mt-4 items-center justify-between space-x-8">
            <div class="">
                <span class="text-3xl">{{ $article->publish_date->toFormattedDateString() }}</span>
                <h1 class="font-extrabold text-7xl leading-tight line-clamp-4">{{ $article->title }}</h1>
            </div>
            <div class="shrink-0">
                <img src="/img/avatar.JPG" class="rounded-full aspect-square w-56" />
            </div>
        </div>

        <div class="bg-violet-400 rounded-xl px-4 py-2 font-medium">
            &#128075 I'm currently available for new projects! Hire me on my site.
        </div>
    </div>
</body>
</html>
