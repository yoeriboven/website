<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
</head>
<body class="h-full">
<!-- This example requires Tailwind CSS v2.0+ -->
{{--<div class="relative bg-violet-50 overflow-hidden h-screen">--}}
{{--  <div class="max-w-7xl mx-auto">--}}
{{--    <div class="relative z-10 pb-8 bg-violet-50 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-96">--}}
{{--      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-violet-50 transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">--}}
{{--        <polygon points="50,0 100,0 50,100 0,100" />--}}
{{--      </svg>--}}

{{--      <main class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-52">--}}
{{--        <div class="sm:text-center lg:text-left">--}}
{{--          <h1 class="text-4xl tracking-tight font-extrabold text-gray-600 sm:text-5xl md:text-5xl">--}}
{{--            <span class="block">Hi, my name is <span class="text-blue-500">Yoeri</span></span>--}}
{{--            <span class="block">and I'm a <span class="text-[#F05340]">Laravel developer.</span>--}}
{{--          </h1>--}}
{{--          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>--}}
{{--          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">--}}
{{--            <div class="rounded-md shadow">--}}
{{--              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10"> Get started </a>--}}
{{--            </div>--}}
{{--            <div class="mt-3 sm:mt-0 sm:ml-3">--}}
{{--              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10"> Live demo </a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </main>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">--}}
{{--    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="">--}}
{{--  </div>--}}
{{--</div>--}}

    <section class="h-screen w-screen border-b-8 border-indigo-600 bg-violet-50">
        <div class="w-2/3 mx-auto flex flex-col h-full justify-between">
            <div class="py-8">
                <nav class="flex relative grid justify-items-end">
                    <div class="space-x-4 mr-14">
                        <a href="{{ route('blog') }}" class="text-gray-500 font-light tracking-wide hover:text-gray-700">Articles</a>
                    </div>

                    <div class="absolute right-0 group bg-white shadow-sm rounded-lg w-fit -mt-1 hover:cursor-pointer overflow-hidden">
                        <div class="p-2 hover:bg-gray-200">
                            <svg class="w-6 aspect-auto shadow-md"
                                 xmlns="http://www.w3.org/2000/svg" id="flag-icons-nl" viewBox="0 0 640 480">
                                <path fill="#012169" d="M0 0h640v480H0z"/>
                                <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
                                <path fill="#C8102E" d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/>
                                <path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/>
                                <path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/>
                            </svg>
                        </div>
                        <div class="hidden group-hover:block p-2 hover:bg-gray-200">
                            <svg class="w-6 aspect-auto shadow-md"
                                 xmlns="http://www.w3.org/2000/svg" id="flag-icons-nl" viewBox="0 0 640 480">
                                <path fill="#21468b" d="M0 0h640v480H0z" />
                                <path fill="#fff" d="M0 0h640v320H0z" />
                                <path fill="#ae1c28" d="M0 0h640v160H0z" />
                            </svg>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="grid grid-cols-2 -mt-20">
                <div>
                    <div class="font-bold text-4xl text-gray-600 leading-tight">
                        Hi, my name is <span class="text-blue-500">Yoeri</span>
                        <br />
                        and I'm a <span class="text-[#F05340]">Laravel developer.</span>
                    </div>
                    <div class="mt-8">
                        <a class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            More about me
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            I need a dev
                        </a>
                    </div>
                </div>
                <div class="">d</div>
            </div>
            <div></div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="w-2/3 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-3xl">Open source</h2>
                <p class="text-gray-500 text-sm mt-1">Gewoon een stukje tekst</p>
                <div class="border-indigo-600 border-b-2 w-10 mt-2 mx-auto rounded-sm"></div>
            </div>
            <!-- Ding -->
            <div class="w-full bg-white shadow-md mx-auto mt-8 rounded-lg">
                <div class="relative z-10 grid grid-cols-5 rounded-lg overflow-hidden">
                    <div class="col-span-2 max-h-80 overflow-scroll">
                        @foreach(range(0,12) as $x)
                            <div
                                class="flex flex-col px-4 first:pt-4 last:pb-4 py-2 hover:bg-slate-100 hover:cursor-pointer">
                                <span class="text-gray-700">Implemented Paddle modifiers in Cashier</span>
                                <span class="text-xs text-gray-500">laravel/cashier-paddle</span>
                            </div>
                        @endforeach

                    </div>
                    <div class="border-l border-slate-50 p-4 col-span-3 prose overflow-scroll max-h-80">
                        <h3>Implemented Paddle modifiers in Cashier</h3>
                        <p><a href="#">Paddle</a> offers a way to change subscriptions.</p>
                        <p>With modifiers you can offer discounts, bill people based on usage or let them buy credits.</p>
                        <p>I implemented modifiers in <code>laravel/cashier</code> with a PR.</p>
                        <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View code</button>
                        <p>Bla Die Bla</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="w-2/3 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-3xl">Blog</h2>
                <p class="text-gray-500 text-sm mt-1">Gewoon een stukje tekst</p>
            </div>

            <div class="mt-6">
                <ul class="space-y-1.5 ">
                    <li class="flex flex-col">
                        <a href="#" class="font-normal text-gray-700 text-lg">Logging to the database</a>
                        <span class="text-xs text-gray-500 -mt-1">13 March</span>
                    </li>
                    <li><a href="#" class="font-normal text-gray-700 text-lg">How I built social images for this site</a></li>
                    <li><a href="#" class="font-normal text-gray-700 text-lg">Building a multi-lingual site in Laravel</a></li>
                    <li><a href="#" class="font-normal text-gray-700 text-lg">Logging to the database</a></li>
                    <li><a href="#" class="font-normal text-gray-700 text-lg">How I built social images for this site</a></li>
                    <li><a href="#" class="font-normal text-gray-700 text-lg">Building a multi-lingual site in Laravel</a></li>
                </ul>
            </div>
        </div>
    </section>


    <footer class="bg-violet-600 h-96">
        <div class="w-2/3 mx-auto grid grid-cols-3 py-12 px-4 sm:px-6 md:py-16 lg:px-0 lg:py-8">

            <div class="col-span-2">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    <span>Want to see if we are a fit?</span>
                </h2>

                <p class="text-xl text-violet-200">Contact me and immediately schedule a zoom-meeting by clicking below.</p>

                <div class="mt-8 flex">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-violet-900 hover:bg-violet-700"> Get started </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-violet-700 bg-violet-100 hover:bg-violet-200"> Learn more </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="mx-auto">x</div>
            </div>
        </div>
    </footer>

{{--So want to see if we can work together? Contact me and immediately schedule a zoom-meeting by clicking below.--}}

    <div class="bg-violet-700 py-6">
        <div class="text-center w-2/3 mx-auto text-sm flex flex-col md:flex-row justify-between space-y-2 md:space-y-0">
            <div class="text-gray-200">
                <span class="font-medium">&copy; 2022 &dash; Yoeri.me</span>
                <a href="https://www.github.com/yoeriboven/yoerime" target="_blank" class="text-xs hover:underline">(View source)</a>
            </div>
            <div class="flex space-x-4 text-gray-300 mx-auto md:mx-0">
                <a href="" class="hover:text-gray-200">
                    <span class="sr-only">Contact</span>
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"/></svg>
                </a>
                <a href="https://www.twitter.com/yoeriboven" target="_blank" class="hover:text-gray-200">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                </a>
                <a href="https://www.github.com/yoeriboven" target="_blank" class="hover:text-gray-200">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" aria-hidden="true"><!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
