<template>
    <Head>
        <meta property="og:title" :content="article.title">
        <meta property="og:type" content="article" />
        <meta property="og:description" :content="article.meta_description">
        <meta property="og:image" :content="socialImageUrl()">
        <meta property="og:url" :content="currentUrl">
        <meta name="twitter:card" content="summary_large_image">
    </Head>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({
    article: Object
});

const currentUrl = location.href;

function socialImageUrl() {
    let url = location.protocol;
    url += '//';
    url += location.hostname;
    url += '/img/social/';
    url += props.article.slug;
    url += '.jpeg';

    return url;
}
</script>
