<template>
    <div v-if="$page.props.settings.showHireMeBanner" class="relative bg-amber-800">
        <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
            <div class="text-center sm:px-16">
                <div class="font-medium text-white flex flex-col md:inline-flex md:flex-row">
                    <div class="flex items-center justify-center space-x-2">
                        <img class="cursor-text"
                             style="height:1.25em;"
                             src="/img/waving-hand-120.png"
                             srcset="/img/waving-hand-160.png 2x"
                    />
                        <span>{{ $t('top_banner.availability') }}</span>
                    </div>
                    <span class="block sm:ml-2 sm:inline-block">
                        <Link :href="route('contact')" class="text-white font-bold underline underline-offset-2">
                           {{ $t('top_banner.cta')}} <span aria-hidden="true">&rarr;</span>
                        </Link>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="bg-amber-800 h-1"></div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>
