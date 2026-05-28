<template>
    <Head>
        <title>Blog</title>
        <meta
            name="description"
            content="I try to share everything I learn on this blog. You will find articles on Laravel, Inertia, Livewire, Vue.js and so on."
        />
        <link rel="canonical" :href="route('blog')">
    </Head>

    <div>
        <TopBanner />

        <Header />

        <main class="mx-auto mb-4 w-5/6 py-6 text-left md:w-5/12">
            <h2 class="mb-8 text-center text-3xl font-bold">Blog</h2>

            <ul class="space-y-8">
                <li>
                    <Link
                        :href="route('article', 'automate-your-php-security-updates')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2026-05-28T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Automate your PHP security updates</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            I'm using a GitHub action to automatically create a PR when a new security vulnerability is announced.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'increase-the-timeout-of-laravel-herd')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2024-02-22T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Increase the timeout of Laravel Herd</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            An update of my article about Valet but for Laravel Herd.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'increase-the-timeout-of-laravel-valet')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2023-07-07T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Increase the timeout of Laravel Valet</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            I tried to run a very slow request but kept hitting the timeout. Here's how you can increase the timeout and get on with the development.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'how-i-made-my-blog-multi-lingual')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2022-07-06T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >How I made my blog multi-lingual</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            You can change this site's language by clicking on the flag in the top right. Here's how I did that.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'building-social-images-with-browsershot-and-aws')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2022-06-17T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Building social images with Browsershot and AWS</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            Creating social images for your website is super simple using Browsershot and AWS Lambda.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'logging-to-the-database-with-laravel')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2022-06-07T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Logging to the database with Laravel</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            I wanted to log to the database. Laravel doesn't come with a driver out of the box, so I built one myself.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'testing-your-statamic-implementation')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2022-06-03T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >Testing your Statamic implementation</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            It can be unclear how to write Statamic tests. I wrote a trait that makes it easy to test your Statamic implementation.
                        </p>
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('article', 'a-better-ux-for-laravel-cashier')"
                        prefetch
                        class="group flex flex-col"
                    >
                        <span class="text-xs uppercase text-emerald-600">
                            {{ formatDate("2022-05-26T00:00:00.000000Z", "D MMMM YYYY") }}
                        </span>
                        <span
                            class="text-2xl font-medium leading-7 text-gray-600 group-hover:text-emerald-600"
                        >A better UX for Laravel Cashier</span
                        >
                        <p
                            class="mt-2 text-sm leading-snug text-gray-500 line-clamp-3 group-hover:text-emerald-600 md:mt-1"
                        >
                            Laravel Cashier doesn't have a great UX out of the box. With these changes your users will better understand what's going on.
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
import { Link, Head } from '@inertiajs/vue3'

import Header from "@/Shared/Header.vue";
import CTAFooter from "@/Shared/CTAFooter.vue";
import Footer from "@/Shared/Footer.vue";
import TopBanner from "@/Shared/TopBanner.vue";
</script>
