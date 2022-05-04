<template>
    <label :for="name" class="block text-sm font-medium text-gray-700">{{ title }}</label>
    <div v-if="!error" class="mt-1">
        <textarea v-model="value"
                  rows="5"
                  :name="name"
                  :id="name"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                  :placeholder="placeholder" />
    </div>
    <div v-else class="mt-1">
        <textarea v-model="value"
                  rows="5"
                  :name="name"
                  :id="name"
                  class="shadow-sm text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-red-300 rounded-md"
                  :placeholder="placeholder"
                  aria-invalid="true"
                  :aria-describedby="name + '-error'" />
        <p class="mt-2 text-sm text-red-600" :id="name + '-error'">{{ error }}</p>
    </div>
</template>

<script setup>
defineProps({
    value: String,
    error: String,
    title: String,
    name: String,
    placeholder: String
});
</script>
