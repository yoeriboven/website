<template>
    <Head>
        <title>Blog</title>
        <meta
            name="description"
            content="I try to share everything I learn on this blog. You will find articles on Laravel, Inertia, Livewire, Vue.js and so on."
        />
    </Head>

    <div>
        <TopBanner />

        <Header />

        <main class="mx-auto mb-4 w-5/6 py-6 text-left md:w-5/12">
            <h2 class="mb-8 text-center text-3xl font-bold">Blog</h2>

            <ul class="space-y-8">
                <li v-for="article in articles.data" :key="article.id">
                    <Link
                        :href="route('article', article.slug)"
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">{{
                            formatDate(article.publish_date, "D MMMM YYYY")
                        }}</span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                            >{{ article.title }}</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            {{ article.excerpt }}
                        </p>
                    </Link>
                </li>
            </ul>
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
import { formatDate } from "@/functions";

import Header from "@/Shared/Header";
import CTAFooter from "@/Shared/CTAFooter";
import Footer from "@/Shared/Footer";
import { Head } from "@inertiajs/inertia-vue3";
import TopBanner from "@/Shared/TopBanner";

defineProps({
    articles: Object,
});
</script>
