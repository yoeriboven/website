<template>
    <Head>
        <title>Titel</title>
        <meta name="description" content="Meta desc" />
        <link rel="canonical" :href="route('article', 'nieuwe-slug')">
    </Head>

    <div>
        <TopBanner />

        <Header />

        <main class="py-6 w-5/6 md:w-2/3 mx-auto prose prose-img:shadow-sm prose-img:shadow-emerald-100 prose-a:text-emerald-600 prose-a:no-underline prose-p:text-gray-500 prose-ol:text-gray-500">
            <span class="uppercase text-sm text-emerald-600">
                27 may 2026
            </span>

            <h1 class="text-emerald-700">titel</h1>

            <div>
                content
            </div>
        </main>

        <CTAFooter>
            <template #header> {{ $t('non_home.cta_footer.title') }}</template>

            <template #content>
                {{ $t('non_home.cta_footer.text') }}
            </template>
        </CTAFooter>

        <Footer />
    </div>
</template>

<script setup>
import { formatDate} from "@/functions";

import Header from '@/Shared/Header.vue'
import CTAFooter from '@/Shared/CTAFooter.vue'
import Footer from '@/Shared/Footer.vue'
import { Head, Link } from "@inertiajs/vue3";
import TopBanner from "@/Shared/TopBanner.vue";

</script>
