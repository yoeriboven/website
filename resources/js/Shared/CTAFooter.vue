<template>
    <div class="bg-violet-600">
        <div class="w-5/6 md:w-2/3 mx-auto grid grid-rows-2 py-6 md:grid-rows-none md:grid-cols-3 md:py-16 lg:px-0 lg:pt-8 lg:pb-12">

            <div class="col-span-1 md:col-span-2 h-fit text-center md:text-left">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    <slot name="header"></slot>
                </h2>

                <p class="text-xl text-violet-200">
                    <slot name="content"></slot>
                </p>

                <div class="mt-8 flex mx-auto w-fit md:mx-0">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-violet-900 hover:bg-violet-700"> Get started </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-violet-700 bg-violet-100 hover:bg-violet-200"> Learn more </a>
                    </div>
                </div>
            </div>

            <div class="flex order-first md:order-none h-fit">
                <img class="w-40 h-40 mx-auto rounded-full shadow-md" src="/img/avatar.JPG" alt="" />
            </div>
        </div>
    </div>
</template>

<script setup>

</script>
