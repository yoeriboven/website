<template>
    <section class="w-2/3 mx-auto py-8">
        <nav class="flex relative grid justify-items-end">
            <div class="space-x-4 mr-14">
                <Link v-if="showHome" :href="route('home')" class="text-gray-500 font-light tracking-wide hover:text-gray-700">Home</Link>
                <Link :href="route('blog')" class="text-gray-500 font-light tracking-wide hover:text-gray-700">Articles</Link>
            </div>

            <div class="absolute right-0 group bg-white shadow-sm rounded-lg w-fit -mt-1 hover:cursor-pointer overflow-hidden">
                <div class="p-2 hover:bg-gray-200">
                    <svg class="w-6 aspect-auto shadow-md"
                         xmlns="http://www.w3.org/2000/svg" id="flag-icons-en" viewBox="0 0 640 480">
                        <path fill="#012169" d="M0 0h640v480H0z"/>
                        <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
                        <path fill="#C8102E" d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/>
                        <path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/>
                        <path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/>
                    </svg>
                </div>
                <div class="hidden group-hover:block p-2 hover:bg-gray-200">
                    <svg class="w-6 aspect-auto shadow-md"
                         xmlns="http://www.w3.org/2000/svg" id="flag-icons-nl" viewBox="0 0 640 480">
                        <path fill="#21468b" d="M0 0h640v480H0z" />
                        <path fill="#fff" d="M0 0h640v320H0z" />
                        <path fill="#ae1c28" d="M0 0h640v160H0z" />
                    </svg>
                </div>
            </div>
        </nav>
    </section>
</template>

<script setup>

defineProps({
    showHome: {
        type: Boolean,
        default: true
    }
});

</script>
