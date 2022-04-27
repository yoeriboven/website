<template>
    <Head>
      <title>Contact</title>
    </Head>

    <div class="bg-violet-50 min-h-screen pt-24">
        <section class="w-1/2 mx-auto">
            <div class="prose"><h1>Want to talk?</h1>

                <p>I have multiple years of experience building PHP and Laravel projects and can surely help you.</p>

                <p>I'm available for both ongoing hourly projects and projects in which the scope is already clear.</p>

                <a href="/">Want to know how I approach a fixed project?</a>

                <p>Below you can contact me. Let me know what you're looking for and I will respond the next working
                    day.</p>

                <p>After sending me a message you also have the chance to immediately schedule a meeting with me.</p>
            </div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="">
                <nav class="mx-auto max-w-7xl mt-8" aria-label="Progress">
                    <ol role="list"
                        class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">
                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0 lg:border-t">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                <span
                                    class="absolute top-0 left-0 w-1 h-full bg-indigo-600 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                    aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                  <span class="flex-shrink-0">
                    <span class="w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                      <span class="text-indigo-600">01</span>
                    </span>
                  </span>
                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                    <span class="text-xs font-semibold text-indigo-600 tracking-wide uppercase">Contact me</span>
                    <span class="text-sm font-medium text-gray-500">What can I do for you?</span>
                  </span>
                </span>
                                </a>

                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div
                                class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0 lg:border-y">
                                <!-- Upcoming Step -->
                                <a href="#" class="group">
                                <span
                                    class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                    aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                  <span class="flex-shrink-0">
                    <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                      <span class="text-gray-500">02</span>
                    </span>
                  </span>
                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                    <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Meeting</span>
                    <span class="text-sm font-medium text-gray-500">Schedule our first meeting.</span>
                  </span>
                </span>
                                </a>

                                <!-- Separator -->
                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-200" viewBox="0 0 12 82" fill="none"
                                         preserveAspectRatio="none">
                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                              vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

        </section>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

</script>
