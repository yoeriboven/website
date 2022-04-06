<template>
    <div class="bg-violet-600 h-96">
        <div class="w-2/3 mx-auto grid grid-cols-3 py-12 px-4 sm:px-6 md:py-16 lg:px-0 lg:py-8">

            <div class="col-span-2">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    <slot name="header"></slot>
                </h2>

                <p class="text-xl text-violet-200">
                    <slot name="content"></slot>
                </p>

                <div class="mt-8 flex">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-violet-900 hover:bg-violet-700"> Get started </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-violet-700 bg-violet-100 hover:bg-violet-200"> Learn more </a>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="mx-auto">x</div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>
