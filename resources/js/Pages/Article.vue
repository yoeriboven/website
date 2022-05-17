<template>
    <Head>
        <title>{{ article.title }}</title>
        <meta name="description" :content="article.meta_description" />
    </Head>

    <div class="bg-violet-50">
        <TopBanner />

        <Header />

        <main class="py-6 w-5/6 md:w-2/3 mx-auto prose prose-img:shadow-sm prose-img:shadow-indigo-100 prose-a:text-indigo-600 prose-a:no-underline">
            <span class="uppercase text-sm text-indigo-700">{{ formatDate(article.publish_date, "D MMMM YYYY") }}</span>

            <h1>{{ article.title }}</h1>

            <div v-html="article.content"></div>
        </main>

        <CTAFooter>
            <template #header>
                Looking for a Laravel developer?
            </template>

            <template #content>
                Contact me and I will respond the next business day.
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
import TopBanner from "@/Shared/TopBanner";

defineProps({
    article: Object
});

</script>
