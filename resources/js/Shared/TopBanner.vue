<template>
    <div v-if="$page.props.settings.showHireMeBanner" class="relative bg-violet-600">
        <div class="max-w-7xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
            <div class="text-center sm:px-16">
                <p class="font-medium text-white">
                    <span class="">&#128075 I'm currently available for new projects! </span>
                    <span class="block sm:ml-2 sm:inline-block">
                        <Link :href="route('contact')" class="text-white font-bold underline">
                            Hire me <span aria-hidden="true">&rarr;</span>
                        </Link>
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>
