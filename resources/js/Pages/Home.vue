<template>
    <Head>
        <title>Freelance Laravel developer</title>
        <meta name="description" :content="pageDescription" />
        <link rel="canonical" :href="route('home')">
    </Head>

    <section class="h-auto md:h-screen">
        <TopBanner />

        <Header :showHome="false" class="hidden md:block left-1/2 -translate-x-1/2 absolute" />

        <div class="w-5/6 md:w-2/3 pt-10 md:pt-0 mx-auto h-full flex items-center">
            <div class="grid md:grid-cols-4 gap-x-10">

                <div class="pt-5 md:col-span-3">
                    <div v-if="currentLanguage === 'nl'">
                        <div class="font-extrabold text-4xl text-gray-700 leading-tight">
                            Hoi, ik ben <span class="text-emerald-500">Yoeri</span> <span class="sr-only">Boven</span>
                            en ik maak <span class="text-emerald-500">web apps</span> met <span
                            class="text-[#F05340]">Laravel</span>.
                        </div>
                        <div class="mt-8 prose text-gray-500">
                            <p>Met meer dan een decennium aan ervaring in het bouwen van web-apps help ik u graag met uw project. </p>

                            <p>Tools als PHP, Laravel, Vue.js, Javascript, Git, Inertia JS, LiveWire, Tailwind CSS, PHPUnit en anderen kennen geen geheimen meer voor mij.</p>

                            <p>Ik kan alleen aan een website werken of in een team. Een SaaS bouwen of betalingen accepteren zijn dingen die ik meermaals heb gedaan.</p>

                            <p>Ik sta open voor zowel opdrachten op uurbasis als op projectbasis.</p>

                            <p>Kijk even rond of
                                <Link
                                    :href="route('contact')"
                                    prefetch
                                    class="no-underline font-regular text-emerald-500 hover:text-emerald-400"
                                >
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
                                <Link
                                    :href="route('contact')"
                                    prefetch
                                    class="no-underline font-regular text-emerald-500 hover:text-emerald-400"
                                >
                                    contact me
                                </Link>
                                and we'll talk soon. :)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-auto w-52 h-52 justify-center md:justify-end md:mt-10 order-first md:order-last">
                    <img class="w-52 h-52 aspect-square rounded-full shadow-md border border-2 border-amber-800" src="/img/avatar.webp" alt="A picture of me" />
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
                    <li>
                        <Link :href="route('article', 'automate-your-php-security-updates')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2026-05-28T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Automate your PHP security updates</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">I'm using a GitHub action to automatically create a PR when a new security vulnerability is announced.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'increase-the-timeout-of-laravel-herd')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2024-02-22T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Increase the timeout of Laravel Herd</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">An update of my article about Valet but for Laravel Herd.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'increase-the-timeout-of-laravel-valet')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2023-07-07T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Increase the timeout of Laravel Valet</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">I tried to run a very slow request but kept hitting the timeout. Here's how you can increase the timeout and get on with the development.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'how-i-made-my-blog-multi-lingual')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2022-07-06T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">How I made my blog multi-lingual</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">You can change this site's language by clicking on the flag in the top right. Here's how I did that.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'building-social-images-with-browsershot-and-aws')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2022-06-17T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Building social images with Browsershot and AWS</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">Creating social images for your website is super simple using Browsershot and AWS Lambda.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'logging-to-the-database-with-laravel')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2022-06-07T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Logging to the database with Laravel</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">I wanted to log to the database. Laravel doesn't come with a driver out of the box, so I built one myself.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'testing-your-statamic-implementation')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2022-06-03T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">Testing your Statamic implementation</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">It can be unclear how to write Statamic tests. I wrote a trait that makes it easy to test your Statamic implementation.</p>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('article', 'a-better-ux-for-laravel-cashier')" prefetch class="flex flex-col group">
                            <span class="text-xs uppercase text-emerald-600">{{ formatDate("2022-05-26T00:00:00.000000Z", "D MMMM YYYY") }}</span>
                            <span class="text-lg font-medium text-gray-700 group-hover:text-emerald-600">A better UX for Laravel Cashier</span>
                            <p class="text-gray-500 text-sm leading-snug line-clamp-3 group-hover:text-emerald-600">Laravel Cashier doesn't have a great UX out of the box. With these changes your users will better understand what's going on.</p>
                        </Link>
                    </li>
                </ul>

                <div class="mt-5 flex justify-end">
                    <Link
                        :href="route('blog')"
                        prefetch
                        as="button"
                        class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded-sm shadow-xs text-white bg-emerald-500 hover:bg-emerald-400 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-emerald-300"
                    >
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
                <div class="grid grid-cols-3 rounded-lg overflow-hidden h-112">
                    <div class="overflow-scroll col-span-3 md:col-span-1 divide-y divide-slate-50 md:divide-y-0">
                        <div
                            v-for="project in projects"
                            :key="project.link"
                            @click="showProject(project)"
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
                            class="inline-flex justify-center rounded-md border border-transparent shadow-xs mt-2 px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-400 focus:outline-hidden sm:text-sm">
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
<!--                            <div class="md:shrink-0">-->
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
<!--                        <div class="md:shrink-0">-->
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
import { ref, computed } from 'vue'
import { formatDate, projectColors, getCurrentLanguage } from "@/functions"
import { Link, Head } from '@inertiajs/vue3'

import Header from '@/Shared/Header.vue'
import CTAFooter from '@/Shared/CTAFooter.vue'
import Footer from '@/Shared/Footer.vue'
import TopBanner from "@/Shared/TopBanner.vue"
import ProjectModal from "@/Shared/ProjectModal.vue"

const projects = [
    {
        title: 'Implemented Paddle modifiers in Cashier',
        content: `<p>Paddle offers a way to change subscriptions.</p><p>With modifiers you can offer discounts, bill people based on usage or let them buy credits.</p><p>I implemented modifiers in <code>laravel/cashier</code> with a PR.</p><p>This PR shows I can work in existing codebases and write code in the same style.</p>`,
        repo: 'laravel/cashier-paddle',
        link: 'https://github.com/laravel/cashier-paddle/pull/95',
        project_type: { value: 'pr', label: 'PR' },
    },
    {
        title: 'Yoeri.me',
        content: `<p>The source code of this website is publicly available.</p><p>Take a look on GitHub to see whether my work appeals to you. :)</p>`,
        repo: 'yoeriboven/website',
        link: 'https://github.com/yoeriboven/website',
        project_type: { value: 'project', label: 'Project' },
    },
    {
        title: 'Laravel now passes route parameters to views',
        content: `<p>While working on <a href="https://github.com/yoeriboven/website/commit/b73340f435310666eeb2d2db4aa23b7596ee3be9">this commit</a> I noticed <code>Route::view</code> did not pass route parameters to the view.</p><p>I sent this PR to the Laravel framework to fix this issue.</p><p>Great code cleanup!</p>`,
        repo: 'laravel/framework',
        link: 'https://github.com/laravel/framework/pull/42461',
        project_type: { value: 'pr', label: 'PR' },
    },
    {
        title: 'Socopo.xyz',
        content: `<p>Socopo is a SaaS app including payments. I built it a few years ago.</p><p>You can subscribe to Instagram accounts and get a Slack notification when one of the accounts posts something new.</p>`,
        repo: 'yoeriboven/socopo',
        link: 'https://github.com/yoeriboven/socopo',
        project_type: { value: 'project', label: 'Project' },
    },
    {
        title: 'Partial queue faking in Laravel',
        content: `<p>I wanted to test that <code>JobOne</code> dispatched <code>JobTwo</code>.</p><p>When using <code>Queue::fake()</code> both jobs would be faked so <code>JobOne</code> could never dispatch the other job.</p><p>With this PR you could say <code>Queue::fake(JobTwo::class)</code> and only fake a certain job.</p>`,
        repo: 'laravel/framework',
        link: 'https://github.com/laravel/framework/pull/41344',
        project_type: { value: 'pr', label: 'PR' },
    },
    {
        title: 'Created a database driver for logging in Laravel',
        content: `<p>For a project I wanted to know when a specific action happened. Notifications to e-mail or Slack were overkill. I wanted to see it in the app's dashboard.</p><p>That's why I created and open sourced a database logging driver for Laravel.</p><pre><code data-theme="github-dark" data-lang="php" class='torchlight' style='background-color: #24292e; --theme-selection-background: #39414a;'><!-- Syntax highlighted by torchlight.dev --><div class='line'><span style="color:#444d56; margin-right:10px;margin-left:-5px;" class="line-number">1</span><span style="color: #79B8FF;">Log</span><span style="color: #F97583;">::</span><span style="color: #B392F0;">channel</span><span style="color: #E1E4E8;">(</span><span style="color: #9ECBFF;">&#39;db&#39;</span><span style="color: #E1E4E8;">)</span><span style="color: #F97583;">-&gt;</span><span style="color: #B392F0;">info</span><span style="color: #E1E4E8;">(</span><span style="color: #9ECBFF;">&#39;Your message&#39;</span><span style="color: #E1E4E8;">);</span></div></code></pre><p>Now whenever this action happens it will show up in the dashboard.</p>`,
        repo: 'yoeriboven/laravel-log-db',
        link: 'https://github.com/yoeriboven/laravel-log-db',
        project_type: { value: 'package', label: 'Package' },
    },
    {
        title: 'Added method to Stringable',
        content: `<p>I tried to get a piece of a string which wasn't straightforward to do with Laravel's stringable class.</p><p>So I sent in a PR.</p><p>More info on GitHub.</p>`,
        repo: 'laravel/framework',
        link: 'https://github.com/laravel/framework/pull/41144/files',
        project_type: { value: 'pr', label: 'PR' },
    },
]

const currentLanguage = getCurrentLanguage();
const featuredProject = ref(projects[0])
const showProjectModal = ref(false);

function showProject(project) {
    featuredProject.value = project;

    showProjectModal.value = true;
}

const pageDescription = computed(() => {
    if (currentLanguage.value === 'nl') {
        return 'Yoeri Boven is een Nederlandse Laravel developer met meer dan een decennium aan ervaring in softwareontwikkeling.'
    }

    return 'Yoeri Boven is a Dutch Laravel developer with over a decade of experience in software engineering'
})

</script>
