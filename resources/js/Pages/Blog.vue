<template>
    <Head>
        <title>Blog</title>
        <meta name="description" content="I try to share everything I learn on this blog. You will find articles on Laravel, Inertia, Livewire, Vue.js and so on." />
    </Head>

    <div class="bg-violet-50">
        <TopBanner />

        <Header />

        <main class="py-6 mb-4 w-5/6 md:w-5/12 mx-auto text-left">
            <h2 class="text-center mb-8 text-3xl font-bold">Blog</h2>

            <ul class="space-y-8">
                <li v-for="article in articles.data" :key="article.id">
                    <Link :href="route('article', article.slug)" class="flex flex-col group">
                        <span class="text-xs uppercase text-indigo-700">{{ formatDate(article.publish_date, "D MMMM YYYY") }}</span>
                        <span class="text-2xl font-medium text-gray-800 group-hover:text-indigo-700 leading-7">{{ article.title }}</span>
                        <p class="text-gray-600 text-sm leading-snug line-clamp-3 group-hover:text-indigo-700 mt-2 md:mt-1">{{ article.excerpt }}</p>
                    </Link>
                </li>
            </ul>
        </main>

        <CTAFooter>
            <template #header>
                Looking for a Laravel developer?
            </template>

            <template #content>
                Contact me and maybe we'll work together.
            </template>
        </CTAFooter>

        <Footer />
    </div>
</template>

<script setup>
import { formatDate } from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'
import { Head } from '@inertiajs/inertia-vue3'
import TopBanner from "@/Shared/TopBanner";

defineProps({
    articles: Object
});

</script>
