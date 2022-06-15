<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>
<body class="antialiased">
    <div class="w-[1200px] h-[630px] bg-amber-50 p-12 text-white text-3xl space-y-3 flex flex-col justify-between">
        <div class="flex justify-between">
            <div class="font-medium text-amber-50 text-xl rounded-2xl bg-amber-800 w-fit px-4 uppercase">New Article</div>
            <div class="font-medium text-amber-50 text-xl rounded-2xl bg-amber-800 w-fit px-4 uppercase">Yoeri.me</div>
        </div>
        <div class="flex mt-4 items-center justify-between space-x-8">
            <div class="">
                <span class="text-3xl text-emerald-600">{{ $article->publish_date->toFormattedDateString() }}</span>
                <h1 class="font-extrabold text-7xl leading-tight line-clamp-4 text-emerald-600">{{ $article->title }}</h1>
            </div>
            <div class="shrink-0">
                <img src="/img/avatar.webp" class="border border-8 border-amber-800 rounded-full aspect-square w-56" />
            </div>
        </div>

        <div class="bg-amber-800 rounded-xl px-4 py-2 font-medium flex items-center space-x-2">
            <img style="height:1em;"
                 src="{{ asset('img/waving-hand-120.png') }}"
                 srcset="{{ asset('img/waving-hand-160.png') }} 2x"
            />
            <span class="text-amber-50">I'm currently available for new projects! Hire me on my site.</span>
        </div>
    </div>
</body>
</html>
