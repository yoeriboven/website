<template>
    <section class="h-screen w-screen border-b-8 border-indigo-600 bg-violet-50">
        <Header :showHome="false" />

        <div class="w-2/3 mx-auto flex flex-col h-full justify-between mt-52">
            <div class="grid grid-cols-2">
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
                    <div class="col-span-2 h-80 overflow-scroll">
                        <div
                            v-for="project in projects"
                            :key="project.id"
                            @click="showProject(project.id)"
                            class="flex flex-col px-4 first:pt-4 last:pb-4 py-2 hover:bg-slate-100 hover:cursor-pointer">
                            <span class="text-gray-700">{{ project.title }}</span>
                            <span class="text-xs text-gray-500">{{ project.repo }}</span>
                        </div>
                    </div>
                    <div class="border-l border-slate-50 p-4 col-span-3 overflow-scroll max-h-80">
                        <div class="flex items-center relative">
                            <a :href="featuredProject.link" target="_blank"
                               class="flex after:content-['\00A0\00A0\00A0\00A0\00A0'] items-center text-xl font-semibold hover:underline">
                                <h3>{{ featuredProject.title }}</h3>
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-5 -mb-0.5 h-5 w-5 "
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </div>

                        <div v-html="featuredProject.content" class="prose py-2"></div>

                        <a :href="featuredProject.link" target="_blank" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View code</a>
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


    <CTAFooter>
        <template #header>
            Want to see if we are a fit?
        </template>

        <template #content>
            Contact me and immediately schedule a zoom-meeting by clicking below.
        </template>
    </CTAFooter>

    <Footer />
</template>

<script setup>
import { ref } from 'vue'

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'

const props = defineProps({
    'projects': Array
})

const featuredProject = ref(props.projects[0])

function showProject(id) {
    const selectedProject = props.projects.find((project) => project.id === id);

    featuredProject.value = selectedProject;
}

</script>
