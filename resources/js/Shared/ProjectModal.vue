<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen py-4 px-4 text-center sm:block sm:p-0">
                <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative max-h-[35rem] overflow-y-scroll inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                            <div>
                                <div>
                                    <DialogTitle as="h3" class="text-xl leading-6 font-semibold text-gray-700">
                                        {{ featuredProject.title }}
                                    </DialogTitle>
                                    <span class="text-gray-500">{{ featuredProject.repo }}</span>
                                </div>

                                <span class="mt-2 inline-block rounded-md px-2 py-1 text-xs text-gray-600 cursor-default"
                                      :class="projectColors(featuredProject.project_type.value)"
                                >
                                    {{ featuredProject.project_type.label }}
                                </span>

                                <div class="mt-2 prose focus:prose-a:outline-none">
                                    <p v-html="featuredProject.content" class="text-sm text-gray-500"></p>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6 space-y-2">
                                <a :href="featuredProject.link"
                                   target="_blank"
                                   class="inline-flex justify-center w-full rounded-md shadow-sm px-4 py-2 border border-gray-300 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:text-sm">
                                    View code
                                </a>
                                <button
                                      @click="$emit('close')"
                                      class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-400 focus:outline-none sm:text-sm">
                                    Go back
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { projectColors } from "@/functions";

const props = defineProps({
    open : {
        type: Boolean,
        default: false,
    },
    featuredProject : Object,
})
</script>
