<template>
    <Head>
      <title>Blog</title>
    </Head>

    <div class="bg-violet-50">
        <Header />

        <main class="py-6 w-5/6 md:w-5/12 mx-auto text-center md:text-left">
            <h2 class="text-center mb-8 text-3xl font-bold">Blog</h2>

            <ul class="space-y-8">
                <li v-for="article in articles.data" :key="article.id">
                    <Link :href="route('article', article.slug)" class="flex flex-col group">
                        <span class="text-xs uppercase text-indigo-700">{{ formatDate(article.date, "D MMMM YYYY") }}</span>
                        <span class="text-2xl font-medium text-gray-800 group-hover:text-indigo-700">{{ article.title }}</span>
                        <p class="text-gray-600 text-sm leading-snug line-clamp-3 group-hover:text-indigo-700">{{ article.excerpt }}</p>
                    </Link>
                </li>
            </ul>
        </main>

        <CTAFooter>
            <template #header>
                Want to see if we are a fit?
            </template>

            <template #content>
                Contact me and immediately schedule a zoom-meeting by clicking below.
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

defineProps({
    articles: Object
});

</script>
