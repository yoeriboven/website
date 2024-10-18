<template>
    <Head>
        <title>{{ article.title }}</title>
        <meta name="description" :content="article.meta_description" />
    </Head>

    <div>
        <TopBanner />

        <Header />

        <main class="py-6 w-5/6 md:w-2/3 mx-auto prose prose-img:shadow-sm prose-img:shadow-emerald-100 prose-a:text-emerald-600 prose-a:no-underline prose-p:text-gray-500 prose-ol:text-gray-500">
            <span class="uppercase text-sm text-emerald-600">{{ formatDate(article.publish_date, "D MMMM YYYY") }}</span>

            <h1 class="text-emerald-700">{{ article.title }}</h1>

            <div v-html="article.content"></div>
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
import { Head } from '@inertiajs/vue3'
import TopBanner from "@/Shared/TopBanner.vue";

defineProps({
    article: Object
});

</script>
