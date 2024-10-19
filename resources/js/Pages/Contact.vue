<template>
    <Head>
        <title>{{ $t('contact.meta_title') }}</title>
        <meta name="description" :content="pageDescription" />
    </Head>

    <TopBanner />

    <div class="py-8">
        <main class="w-5/6 md:w-1/2 mx-auto">
            <div class="prose prose-h1:mb-0">
                <Link :href="route('home')" prefetch>
                    <img class="mt-6 mb-6 w-24 h-24 aspect-square rounded-full shadow-md" src="/img/avatar.webp" alt="A picture of me" />
                </Link>

                <div v-if="currentLanguage === 'nl'">
                    <h1 class="text-emerald-500">Contact</h1>

                    <p>Ik heb veel ervaring met het bouwen van PHP en Laravel webapps and ga graag met u aan de slag met uw project.</p>

                    <p>Ik ben beschikbaar voor zowel projecten op uurbasis als op projectbasis. In een team of zelfstandig.</p>

                    <p>Of op zoek naar iemand die nieuwe features toevoegt of bestaande onderhoudt? Iemand die uw lijst met bugs wegwerkt? Ik kan u helpen.</p>

                    <p>Hieronder kunt u contact opnemen. Voeg een omschrijving van de opdracht toe en dan krijgt u de volgende werkdag een reactie.</p>
                </div>
                <div v-else>
                    <h1 class="text-emerald-500">Want to talk?</h1>

                    <p>I have multiple years of experience building PHP and Laravel projects and can help you with your project.</p>

                    <p>I'm available for both ongoing hourly projects and projects with a scope.</p>

                    <p>Or looking for someone to add new features or squash your bug list? I'm your guy.</p>

                    <p>Below you can contact me. Let me know what you're looking for and I will respond the next working
                        day.</p>
                </div>
            </div>

            <div class="pt-4 md:w-2/3">
                <h2 class="font-bold text-2xl mb-2 text-emerald-400">{{ $t('contact.form_title') }}</h2>
                <form @submit.prevent="submitForm" class="space-y-6 mt-2">
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ $t('name') }}</label>
                        <input v-model="form.name"
                               type="text"
                               name="name"
                               id="name"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                               :class="{ 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500' : form.errors.name }"
                               :placeholder="$t('contact.form_placeholder_name')"
                        />
                        <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input v-model="form.email"
                               type="email"
                               name="email"
                               id="email"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                               :class="{ 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500' : form.errors.email }"
                               :placeholder="$t('contact.form_placeholder_email')"
                        />
                        <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                    </div>

                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-medium text-gray-700">{{ $t('description') }}</label>
                        <textarea v-model="form.description"
                                  rows="5"
                                  name="description"
                                  id="description"
                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                  :class="{ 'shadow-sm text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-red-300 rounded-md' : form.errors.description }"
                                  :placeholder="$t('contact.form_placeholder_description')" />
                        <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
                    </div>

                    <div v-if="honeypot.enabled" :name="`${honeypot.nameFieldName}_wrap`" style="display:none;">
                        <input type="text" v-model="form[honeypot.nameFieldName]" :name="honeypot.nameFieldName" :id="honeypot.nameFieldName" />
                        <input type="text" v-model="form[honeypot.validFromFieldName]" :name="honeypot.validFromFieldName" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                :disabled="form.processing"
                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-semibold rounded shadow-sm text-white bg-emerald-500 hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-300">
                            {{ $t('send') }}
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <Footer />

    <ContactSuccessModal :open="!! $page.props.flash.success" />

</template>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3'
import ContactSuccessModal from "@/Shared/ContactSuccessModal.vue";
import { computed, onMounted } from 'vue'
import Footer from "@/Shared/Footer.vue";
import TopBanner from "@/Shared/TopBanner.vue";
import { getCurrentLanguage } from "@/functions";

const currentLanguage = getCurrentLanguage();

const props = defineProps({
    honeypot: Object,
})

const form = useForm({
    name: null,
    email: null,
    description: null,
    [props.honeypot.nameFieldName]: '',
    [props.honeypot.validFromFieldName]: props.honeypot.encryptedValidFrom,
})

function submitForm() {
    form.post(route('contact.store'), {
        preserveScroll: true
    })
}

const pageDescription = computed(() => {
    if (currentLanguage.value === 'nl') {
        return "Neem contact op als u op zoek bent naar een ervaren webdeveloper"
    }

    return "Contact me if you're looking for an experience webdeveloper"
})

</script>
