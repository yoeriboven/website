<template>
    <Head>
        <title>Contact Me</title>
        <meta name="description" content="" />
    </Head>

    <TopBanner />

    <div class="bg-violet-50 min-h-screen py-8">
        <main class="w-5/6 md:w-1/2 mx-auto">
            <div class="prose"><h1>Want to talk?</h1>

                <p>I have multiple years of experience building PHP and Laravel projects and can surely help you.</p>

                <p>I'm available for both ongoing hourly projects and projects in which the scope is already clear.</p>

                <a href="/">Want to know how I approach a fixed project?</a>

                <p>Below you can contact me. Let me know what you're looking for and I will respond the next working
                    day.</p>

                <p>After sending me a message you also have the chance to immediately schedule a meeting with me.</p>
            </div>
            <!-- This example requires Tailwind CSS v2.0+ -->
<!--            <div class="">-->
<!--                <nav class="mx-auto max-w-7xl mt-8" aria-label="Progress">-->
<!--                    <ol role="list"-->
<!--                        class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">-->
<!--                        <li class="relative overflow-hidden lg:flex-1">-->
<!--                            <div class="border border-gray-200 overflow-hidden lg:border-0 lg:border-t">-->
<!--                                &lt;!&ndash; Current Step &ndash;&gt;-->
<!--                                <a href="#" aria-current="step">-->
<!--                                <span-->
<!--                                    class="absolute top-0 left-0 w-1 h-full bg-indigo-600 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"-->
<!--                                    aria-hidden="true"></span>-->
<!--                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">-->
<!--                  <span class="flex-shrink-0">-->
<!--                    <span class="w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">-->
<!--                      <span class="text-indigo-600">01</span>-->
<!--                    </span>-->
<!--                  </span>-->
<!--                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">-->
<!--                    <span class="text-xs font-semibold text-indigo-600 tracking-wide uppercase">Contact me</span>-->
<!--                    <span class="text-sm font-medium text-gray-500">What can I do for you?</span>-->
<!--                  </span>-->
<!--                </span>-->
<!--                                </a>-->

<!--                            </div>-->
<!--                        </li>-->

<!--                        <li class="relative overflow-hidden lg:flex-1">-->
<!--                            <div-->
<!--                                class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0 lg:border-y">-->
<!--                                &lt;!&ndash; Upcoming Step &ndash;&gt;-->
<!--                                <a href="#" class="group">-->
<!--                                <span-->
<!--                                    class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"-->
<!--                                    aria-hidden="true"></span>-->
<!--                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">-->
<!--                  <span class="flex-shrink-0">-->
<!--                    <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">-->
<!--                      <span class="text-gray-500">02</span>-->
<!--                    </span>-->
<!--                  </span>-->
<!--                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">-->
<!--                    <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Meeting</span>-->
<!--                    <span class="text-sm font-medium text-gray-500">Schedule our first meeting.</span>-->
<!--                  </span>-->
<!--                </span>-->
<!--                                </a>-->

<!--                                &lt;!&ndash; Separator &ndash;&gt;-->
<!--                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">-->
<!--                                    <svg class="h-full w-full text-gray-200" viewBox="0 0 12 82" fill="none"-->
<!--                                         preserveAspectRatio="none">-->
<!--                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"-->
<!--                                              vector-effect="non-scaling-stroke" />-->
<!--                                    </svg>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ol>-->
<!--                </nav>-->
<!--            </div>-->
            <div class="pt-10 md:w-2/3">
                <h2 class="font-bold text-2xl mb-2">Contact me</h2>
                <form @submit.prevent="submitForm" class="space-y-6">
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name"
                               type="text"
                               name="name"
                               id="name"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                               :class="{ 'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500' : form.errors.name }"
                               placeholder="Your name"
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
                               placeholder="you@example.com"
                        />
                        <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                    </div>

                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description"
                                  rows="5"
                                  name="description"
                                  id="description"
                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                  :class="{ 'shadow-sm text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-red-300 rounded-md' : form.errors.description }"
                                  placeholder="Please write a short description about what you are looking for." />
                        <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
                    </div>

                    <div v-if="honeypot.enabled" :name="`${honeypot.nameFieldName}_wrap`" style="display:none;">
                        <input type="text" v-model="form[honeypot.nameFieldName]" :name="honeypot.nameFieldName" :id="honeypot.nameFieldName" />
                        <input type="text" v-model="form[honeypot.validFromFieldName]" :name="honeypot.validFromFieldName" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                :disabled="form.processing"
                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-semibold rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send email
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
import { Head, useForm } from '@inertiajs/inertia-vue3'
import ContactSuccessModal from "@/Shared/ContactSuccessModal";
import Footer from "@/Shared/Footer";
import TopBanner from "@/Shared/TopBanner";

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
</script>
