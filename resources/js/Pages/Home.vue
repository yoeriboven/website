<template>
    <section class="h-screen w-screen border-b-8 border-indigo-600 bg-violet-50">
        <div class="w-2/3 mx-auto flex flex-col h-full justify-between">
            <div class="py-8">
                <nav class="flex relative grid justify-items-end">
                    <div class="space-x-4 mr-14">
                        <Link :href="route('blog')" class="text-gray-500 font-light tracking-wide hover:text-gray-700">Articles</Link>
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
                    <div class="mt-8 space-x-4">
                        <a class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            More about me
                        </a>
                        <Link :href="route('contact')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            I need a dev
                        </Link>
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
                        <div
                            v-for="index in 12"
                            :key="index"
                            class="flex flex-col px-4 first:pt-4 last:pb-4 py-2 hover:bg-slate-100 hover:cursor-pointer">
                            <span class="text-gray-700">Implemented Paddle modifiers in Cashier</span>
                            <span class="text-xs text-gray-500">laravel/cashier-paddle</span>
                        </div>
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


    <div class="bg-violet-600 h-96">
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
    </div>

    <Footer />
</template>

<script setup>
import Footer from '@/Shared/Footer'

</script>
