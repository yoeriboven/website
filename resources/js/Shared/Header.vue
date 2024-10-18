<template>
    <header class="w-5/6 md:w-2/3 py-2 md:py-8 mx-auto">
        <nav class="flex justify-between items-center">
            <div class="w-14 h-14">
                <Link :href="route('home')" v-if="showHome">
                    <img class="rounded-full shadow-md" src="/img/avatar.webp"  alt="A picture of me"/>
                </Link>
            </div>
            <div class="flex relative justify-items-end">
                <div class="space-x-4 mr-14">
                    <Link :href="route('blog')" class="text-gray-500 font-light tracking-wide hover:text-gray-700">
                        {{ $t('header.articles') }}
                    </Link>
                </div>

                <div
                    class="absolute right-0 group bg-white shadow-sm rounded-lg w-fit -mt-1 hover:cursor-pointer overflow-hidden">
                    <button v-for="(lang, index) in languages"
                            :key="lang"
                            @click="changeLanguage(lang)"
                            :class="{ 'hidden group-hover:block' : index === 1}"
                            class="p-2 hover:bg-gray-200"
                    >
                        <svg v-if="lang === 'en'" class="w-6 aspect-auto shadow-md"
                             xmlns="http://www.w3.org/2000/svg" id="flag-icons-en" viewBox="0 0 640 480">
                            <path fill="#012169" d="M0 0h640v480H0z" />
                            <path fill="#FFF"
                                  d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z" />
                            <path fill="#C8102E"
                                  d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z" />
                            <path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z" />
                            <path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z" />
                        </svg>

                        <svg v-if="lang === 'nl'" class="w-6 aspect-auto shadow-md"
                             xmlns="http://www.w3.org/2000/svg" id="flag-icons-nl" viewBox="0 0 640 480">
                            <path fill="#21468b" d="M0 0h640v480H0z" />
                            <path fill="#fff" d="M0 0h640v320H0z" />
                            <path fill="#ae1c28" d="M0 0h640v160H0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup>
import { onMounted, ref, inject } from "vue";
import { getActiveLanguage, loadLanguageAsync } from "laravel-vue-i18n";
import { Link } from '@inertiajs/vue3'
import axios from 'axios'

defineProps({
    showHome: {
        type: Boolean,
        default: true
    }
});

onMounted(() => {
    orderLanguages();

});

const languages = ref(["en", "nl"]);

function orderLanguages(lang) {
    const activeLanguage = lang ?? getActiveLanguage();

    if (activeLanguage === "en") {
        languages.value = ["en", "nl"];
    } else {
        languages.value = ["nl", "en"];
    }
}
const emitter = inject('emitter');

function changeLanguage(lang) {
    if (lang === getActiveLanguage()) {
        return;
    }

    axios.post(route('language-change', lang))
        .then(function(response) {
            loadLanguageAsync(lang);

            emitter.emit('changedLanguage', {lang: lang});

            if (response.status === 204) {
                orderLanguages(lang);
            }
        })
}

</script>
