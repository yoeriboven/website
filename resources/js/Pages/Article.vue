<template>
    <Head>
        <title>{{ article.title }}</title>
        <meta name="description" :content="article.meta_description" />
        <link rel="canonical" :href="route('article', article.slug)">
    </Head>

    <div>
        <TopBanner />

        <Header />

        <main class="py-6 w-5/6 md:w-2/3 mx-auto prose prose-a:text-emerald-600 prose-a:no-underline prose-p:text-gray-500 prose-ol:text-gray-500">
            <span class="uppercase text-sm text-emerald-600">{{ formatDate(article.publish_date, "D MMMM YYYY") }}</span>

            <h1 class="text-emerald-700">{{ article.title }}</h1>

            <div ref="content" v-html="article.content"></div>
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
import { Head } from "@inertiajs/vue3";
import TopBanner from "@/Shared/TopBanner.vue";
import { nextTick, onMounted, ref, watch } from "vue";

const props = defineProps({
    article: Object
});

const content = ref(null);

const copyIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2m-6 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2Z"/></svg>`;
const checkIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/></svg>`;

// The server embeds each block's exact source as base64 in data-raw, so we
// just decode it (UTF-8 safe) rather than scraping the highlighted markup.
function decodeRaw(encoded) {
    const bytes = Uint8Array.from(atob(encoded), (char) => char.charCodeAt(0));

    return new TextDecoder().decode(bytes);
}

function addCopyButtons() {
    if (! content.value) {
        return;
    }

    // Only blocks that carry embedded source get a button.
    content.value.querySelectorAll("pre[data-raw]").forEach((pre) => {
        if (pre.parentElement?.classList.contains("code-block")) {
            return;
        }

        const wrapper = document.createElement("div");
        wrapper.className = "code-block relative";
        pre.replaceWith(wrapper);
        wrapper.appendChild(pre);

        const button = document.createElement("button");
        button.type = "button";
        button.setAttribute("aria-label", "Copy code");
        button.className =
            "absolute top-2 right-2 inline-flex items-center justify-center p-1.5 rounded-md text-gray-300 bg-white/5 hover:bg-white/10 hover:text-white transition-colors";
        button.innerHTML = copyIcon;

        let resetTimer;

        button.addEventListener("click", async () => {
            try {
                await navigator.clipboard.writeText(decodeRaw(pre.dataset.raw));
            } catch {
                return;
            }

            button.innerHTML = checkIcon;
            button.classList.add("text-emerald-400");

            clearTimeout(resetTimer);
            resetTimer = setTimeout(() => {
                button.innerHTML = copyIcon;
                button.classList.remove("text-emerald-400");
            }, 2000);
        });

        wrapper.appendChild(button);
    });
}

onMounted(addCopyButtons);

// Inertia reuses this component when navigating between articles, so the
// v-html content swaps without a remount — re-run once the DOM updates.
watch(() => props.article.slug, () => nextTick(addCopyButtons));

</script>
