<template>
    <Head>
        <title>Freelance webdeveloper</title>
        <meta name="description" content="" />
    </Head>

    <section class="h-auto md:h-screen">
        <TopBanner />

        <Header :showHome="false" class="hidden md:block left-1/2 -translate-x-1/2 absolute" />

        <div class="w-5/6 md:w-2/3 pt-10 md:pt-0 mx-auto h-full flex items-center">
            <div class="grid md:grid-cols-4 gap-x-10 flex">

                <div class="pt-5 md:col-span-3">
                    <div v-if="currentLanguage === 'nl'">
                        <div class="font-extrabold text-4xl text-gray-700 leading-tight">
                            Hoi, ik ben <span class="text-emerald-500">Yoeri</span>
                            en ik maak <span class="text-emerald-500">web apps</span> met <span
                            class="text-[#F05340]">Laravel</span>.
                        </div>
                        <div class="mt-8 prose text-gray-500">
                            <p>Met meer dan een decennium aan ervaring in het bouwen van web-apps help ik u graag met uw project. </p>

                            <p>Tools als PHP, Laravel, Vue.js, Javascript, Git, Inertia JS, LiveWire, Tailwind CSS, PHPUnit en anderen kennen geen geheimen meer voor mij.</p>

                            <p>Ik kan alleen aan een website werken of in een team. Een SaaS bouwen of betalingen accepteren zijn dingen die ik meermaals heb gedaan.</p>

                            <p>Ik sta open voor zowel opdrachten op uurbasis als op projectbasis.</p>

                            <p>Kijk even rond of
                                <Link :href="route('contact')"
                                      class="no-underline font-regular text-emerald-500 hover:text-emerald-400">
                                    neem contact op
                                </Link>
                                en dan praten we snel. :)
                            </p>
                        </div>
                    </div>
                    <div v-else>
                        <div class="font-extrabold text-4xl text-gray-700 leading-tight">
                            Hi, I'm <span class="text-emerald-500">Yoeri</span>
                            and I build <span class="text-emerald-500">web apps</span> using <span
                            class="text-[#F05340]">Laravel</span>.
                        </div>
                        <div class="mt-8 prose text-gray-500">
                            <p>I have been building web applications for over a decade and can help you with your
                                project.</p>

                            <p>I am experienced in PHP, Laravel, Vue.js, Javascript, Git, Inertia JS, Livewire, Tailwind
                                CSS, and more.</p>

                            <p>I have experience building apps from start to finish on my own. Building a SaaS or
                                accepting payments from users are things I can do with my eyes closed. I write PHPUnit
                                tests for all of my projects.</p>

                            <p>I am open to both hourly commitments as well as fixed projects like adding features or
                                starting from scratch.</p>

                            <p>Take a look around or
                                <Link :href="route('contact')"
                                      class="no-underline font-regular text-emerald-500 hover:text-emerald-400">
                                    contact me
                                </Link>
                                and we'll talk soon. :)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex w-52 h-52 justify-center md:justify-end md:mt-10 order-first md:order-last">
                    <img class="aspect-square rounded-full shadow-md border border-2 border-amber-800" src="/img/avatar.webp" alt="A picture of me" />
                </div>
            </div>
        </div>
    </section>

    <section class="mt-12 pb-10 md:pt-0">
        <div class="w-5/6 md:w-2/3 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-4xl text-emerald-500">Blog</h2>
                <p class="prose leading-snug mt-2 text-gray-500 mx-auto">{{ $t('home.blog.description') }}</p>
            </div>
            <div class="mt-6">
                <ul class="grid md:grid-cols-2 gap-y-5 gap-x-7">
                    <li v-for="article in articles.data" :key="article.id">
                        <Link :href="route('article', article.slug)" class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate(article.publish_date, "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">{{ article.title }}</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">{{ article.excerpt }}</p>
                        </Link>
                    </li>
                </ul>

                <div class="mt-5 flex justify-end">
                    <Link :href="route('blog')" as="button"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-emerald-500 hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-300">
                        {{ $t('read_more') }}
                    </Link>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-10 md:py-20">
        <div class="w-5/6 md:w-2/3 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-4xl text-emerald-500">{{ $t('home.os.title') }}</h2>
                <p class="prose leading-snug mt-2 mx-auto text-gray-500">{{ $t('home.os.description') }}</p>
            </div>
            <div class="w-full bg-white shadow-md mx-auto mt-4 rounded-lg">
                <div class="grid grid-cols-3 rounded-lg overflow-hidden h-[28rem]">
                    <div class="overflow-scroll col-span-3 md:col-span-1 divide-y divide-slate-50 md:divide-y-0">
                        <div
                            v-for="project in projects"
                            :key="project.id"
                            @click="showProject(project.id)"
                            class="flex flex-col px-4 first:pt-4 last:pb-4 py-2 hover:bg-slate-100 hover:cursor-pointer">
                            <span class="text-gray-700">{{ project.title }}</span>
                            <div class="flex space-x-1.5 text-xs text-gray-500">
                                <span>{{ project.repo }}</span>
                                <span class="rounded-md px-2"
                                      :class="projectColors(project.project_type.value)"
                                >
                                    {{ project.project_type.label }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block border-l border-slate-50 p-4 col-span-2 overflow-scroll">
                        <div class="flex items-center justify-between">
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
                            <span class="rounded-md px-2 py-1 text-xs text-gray-600 cursor-default"
                                  :class="projectColors(featuredProject.project_type.value)"
                            >
                                {{ featuredProject.project_type.label }}
                            </span>
                        </div>

                        <div v-html="featuredProject.content" class="prose py-2"></div>

                        <a
                            :href="featuredProject.link"
                            target="_blank"
                            class="inline-flex justify-center rounded-md border border-transparent shadow-sm mt-2 px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-400 focus:outline-none sm:text-sm">
                            {{ $t('view_code') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--    <section class="py-12 overflow-hidden md:py-20 lg:py-24">-->
<!--        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--&lt;!&ndash;            <svg class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-mo">&ndash;&gt;-->
<!--&lt;!&ndash;                <title id="svg-mo">Meditatie en Ontspanning</title>&ndash;&gt;-->
<!--&lt;!&ndash;                <defs>&ndash;&gt;-->
<!--&lt;!&ndash;                    <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">&ndash;&gt;-->
<!--&lt;!&ndash;                        <rect x="0" y="0" width="4" height="4" class="text-indigo-300" fill="currentColor" />&ndash;&gt;-->
<!--&lt;!&ndash;                    </pattern>&ndash;&gt;-->
<!--&lt;!&ndash;                </defs>&ndash;&gt;-->
<!--&lt;!&ndash;                <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />&ndash;&gt;-->
<!--&lt;!&ndash;            </svg>&ndash;&gt;-->

<!--            <div class="relative">-->
<!--            &lt;!&ndash;      <img class="mx-auto h-8" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600-mark-gray-800-and-indigo-600-text.svg" alt="Workcation">&ndash;&gt;-->
<!--                <blockquote class="mt-10">-->
<!--                    <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-indigo-600">-->
<!--                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.&rdquo;</p>-->
<!--                    </div>-->
<!--                    <footer class="mt-8">-->
<!--                        <div class="md:flex md:items-center md:justify-center">-->
<!--                            <div class="md:flex-shrink-0">-->
<!--                                <img class="mx-auto h-10 w-10 rounded-full" src="/img/testimonial-sandra.webp" alt="">-->
<!--                            </div>-->
<!--                            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">-->
<!--                                <div class="text-base font-medium text-gray-200">Sandra Diependaal</div>-->

<!--                                <svg class="hidden md:block mx-1 h-5 w-5 text-indigo-300" fill="currentColor" viewBox="0 0 20 20">-->
<!--                                    <path d="M11 0h3L9 20H6l5-20z" />-->
<!--                                </svg>-->

<!--                                <div class="text-base font-medium text-gray-200">Eigenaar Meditatie en Ontspanning</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </footer>-->
<!--                </blockquote>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->


<!--<section class="py-12 bg-violet-50 overflow-hidden md:py-20 lg:py-24">-->
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


    <CTAFooter>
        <template #header>
            {{ $t('home.cta_footer.title') }}
        </template>

        <template #content>
            {{ $t('home.cta_footer.text') }}
        </template>
    </CTAFooter>

    <Footer />

    <ProjectModal
        class="md:hidden"
        :open="showProjectModal"
        @close="showProjectModal = false"
        :featured-project="featuredProject"
    />
</template>

<script setup>
import { ref } from 'vue'
import { formatDate, projectColors, getCurrentLanguage } from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'
import { Head } from '@inertiajs/inertia-vue3'
import TopBanner from "@/Shared/TopBanner";
import ProjectModal from "@/Shared/ProjectModal";

const props = defineProps({
    'projects': Array,
    'articles': Object,
})

const currentLanguage = getCurrentLanguage();
const featuredProject = ref(props.projects[0])
const showProjectModal = ref(false);

function showProject(id) {
    const selectedProject = props.projects.find((project) => project.id === id);

    featuredProject.value = selectedProject;

    showProjectModal.value = true;
}

</script>
