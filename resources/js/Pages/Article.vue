<template>
    <Head>
        <title>{{ article.title }}</title>
        <meta name="description" content="{{ article.meta_description }}" />
    </Head>

    <div class="min-h-full bg-violet-50">
        <Header />

        <main class="py-6 w-5/6 md:w-2/3 mx-auto prose prose-img:shadow-sm prose-img:shadow-indigo-100">
            <p class="">{{ formatDate(article.date, "D MMMM YYYY") }}</p>

            <h1>{{ article.title }}</h1>

            <div v-html="article.content"></div>
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
import { formatDate} from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'
import { Head } from '@inertiajs/inertia-vue3'

defineProps({
    article: Object
});

</script>
