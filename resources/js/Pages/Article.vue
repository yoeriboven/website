<template>
<div class="min-h-full bg-violet-50">
    <Header />

    <section class="py-6 w-2/3 mx-auto prose">
        <p class="">{{ formatDate(article.date, "D MMMM YYYY") }}</p>

        <h1>{{ article.title }}</h1>

        <div v-html="article.content"></div>
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
import { formatDate} from "@/functions";

import Header from '@/Shared/Header'
import CTAFooter from '@/Shared/CTAFooter'
import Footer from '@/Shared/Footer'

defineProps({
    article: Object
});

</script>
