<template>
<div class="bg-violet-50">
    <Header />

    <section class="py-6 w-5/12 mx-auto">
        <h2 class="text-center mb-8 text-3xl font-bold">Blog</h2>

        <ul class="space-y-8">
            <li v-for="article in articles.data" :key="article.id">
                <a :href="route('article', article.slug)" class="flex flex-col group">
                    <span class="text-xs uppercase text-indigo-700">{{ formatDate(article.date, "D MMMM YYYY") }}</span>
                    <span class="text-2xl font-medium text-gray-800 group-hover:text-indigo-700">{{ article.title }}</span>
                    <p class="text-gray-600 text-sm leading-snug line-clamp-3 group-hover:text-indigo-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est arcu, maximus nec varius sit amet, dignissim vitae ligula. Donec interdum tristique suscipit. Nulla scelerisque augue sed nulla gravida luctus vel sit amet mauris. In pretium eros leo, nec fermentum nibh porttitor eget.</p>
                </a>
            </li>
        </ul>
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
</div>
</template>

<script setup>
import { formatDate } from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'

defineProps({
    articles: Object
});

</script>
