<template>
    <div class="bg-amber-700">
        <div class="w-5/6 md:w-2/3 mx-auto grid py-6 gap-y-5 md:grid-cols-3 md:py-16 lg:px-0 lg:pt-8 lg:pb-12">
            <div class="col-span-1 md:col-span-2 text-center md:text-left">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    <slot name="header"></slot>
                </h2>

                <p class="text-xl text-amber-100">
                    <slot name="content"></slot>
                </p>

                <div class="mt-8 flex mx-auto md:mx-0 md:w-fit">
                    <div class="inline-flex w-full rounded-md shadow">
                        <Link :href="route('contact')" class="w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-500 hover:bg-emerald-600">{{ $t('contact_me') }}</Link>
                    </div>
                </div>
            </div>

            <div class="flex order-first md:order-none justify-center md:justify-end">
                <img class="w-40 h-40 rounded-full shadow-md" src="/img/avatar.webp" alt="A picture of me" />
            </div>
        </div>
    </div>
</template>

<script setup>

</script>
