<template>
    <section class="h-screen border-b-8 border-indigo-600 bg-violet-50">
        <Header :showHome="false" class="left-1/2 -translate-x-1/2 absolute" />

        <div class="w-2/3 mx-auto h-full flex">
            <div class="grid grid-cols-2 items-center gap-x-10">
                <div class="pt-5">
                    <div class="font-bold text-4xl text-gray-600 leading-tight">
                        Hi, my name is <span class="text-blue-500">Yoeri</span>
                        <br />
                        and I'm a <span class="text-[#F05340]">Laravel developer. </span>
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
                <div>
                    <img class="w-52 h-52 mx-auto rounded-full shadow-md" src="/img/avatar.JPG" alt="" />
                </div>
            </div>
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

    <section class="py-12 bg-violet-500 overflow-hidden md:py-20 lg:py-24">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!--            <svg class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-mo">-->
<!--                <title id="svg-mo">Meditatie en Ontspanning</title>-->
<!--                <defs>-->
<!--                    <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">-->
<!--                        <rect x="0" y="0" width="4" height="4" class="text-indigo-300" fill="currentColor" />-->
<!--                    </pattern>-->
<!--                </defs>-->
<!--                <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />-->
<!--            </svg>-->

            <div class="relative">
            <!--      <img class="mx-auto h-8" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-and-indigo-600-text.svg" alt="Workcation">-->
                <blockquote class="mt-10">
                    <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-200">
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.&rdquo;</p>
                    </div>
                    <footer class="mt-8">
                        <div class="md:flex md:items-center md:justify-center">
                            <div class="md:flex-shrink-0">
                                <img class="mx-auto h-10 w-10 rounded-full" src="/img/testimonial-sandra.webp" alt="">
                            </div>
                            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                <div class="text-base font-medium text-gray-200">Sandra Diependaal</div>

                                <svg class="hidden md:block mx-1 h-5 w-5 text-indigo-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 0h3L9 20H6l5-20z" />
                                </svg>

                                <div class="text-base font-medium text-gray-200">Eigenaar Meditatie en Ontspanning</div>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>


<!--<section class="py-12 bg-gray-50 overflow-hidden md:py-20 lg:py-24">-->
<!--    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--        <svg class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-mo">-->
<!--            <title id="svg-mo">Meditatie en Ontspanning</title>-->
<!--            <defs>-->
<!--                <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">-->
<!--                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />-->
<!--                </pattern>-->
<!--            </defs>-->
<!--            <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />-->
<!--        </svg>-->

<!--        <div class="relative">-->
<!--        &lt;!&ndash;      <img class="mx-auto h-8" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-and-indigo-600-text.svg" alt="Workcation">&ndash;&gt;-->
<!--            <blockquote class="mt-10">-->
<!--                <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900">-->
<!--                    <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.&rdquo;</p>-->
<!--                </div>-->
<!--                <footer class="mt-8">-->
<!--                    <div class="md:flex md:items-center md:justify-center">-->
<!--                        <div class="md:flex-shrink-0">-->
<!--                            <img class="mx-auto h-10 w-10 rounded-full" src="img/testimonial-sandra.webp" alt="">-->
<!--                        </div>-->
<!--                        <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">-->
<!--                            <div class="text-base font-medium text-gray-900">Sandra Diependaal</div>-->

<!--                            <svg class="hidden md:block mx-1 h-5 w-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">-->
<!--                                <path d="M11 0h3L9 20H6l5-20z" />-->
<!--                            </svg>-->

<!--                            <div class="text-base font-medium text-gray-500">Eigenaar Meditatie en Ontspanning</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </footer>-->
<!--            </blockquote>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


    <section class="py-20 bg-slate-50">
        <div class="w-2/3 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-3xl">Blog</h2>
                <p class="text-gray-500 text-sm mt-1">Gewoon een stukje tekst</p>
                <div class="border-indigo-600 border-b-2 w-10 mt-2 mx-auto rounded-sm"></div>
            </div>

            <div class="mt-6">
                <ul class="grid grid-cols-2 gap-y-5 gap-x-5">
                    <li v-for="article in articles" :key="article.id">
                        <a :href="route('article', article.slug)" class="flex flex-col group">
                            <span class="text-xs uppercase text-indigo-700">{{ formatDate(article.date, "D MMMM YYYY") }}</span>
                            <span class="text-xl font-medium text-gray-700 group-hover:text-indigo-700">{{ article.title }}</span>
                            <p class="text-gray-600 text-sm leading-snug line-clamp-3 group-hover:text-indigo-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est arcu, maximus nec varius sit amet, dignissim vitae ligula. Donec interdum tristique suscipit. Nulla scelerisque augue sed nulla gravida luctus vel sit amet mauris. In pretium eros leo, nec fermentum nibh porttitor eget.</p>
                        </a>
                    </li>
                </ul>

                <div class="mt-5 flex justify-end">
                    <Link :href="route('blog')" as="button"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Read more
                    </Link>
                </div>
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
import { formatDate } from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'

const props = defineProps({
    'projects': Array,
    'articles': Array,
})

const featuredProject = ref(props.projects[0])

function showProject(id) {
    const selectedProject = props.projects.find((project) => project.id === id);

    featuredProject.value = selectedProject;
}

</script>
