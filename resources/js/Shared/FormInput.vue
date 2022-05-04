<template>
    <label :for="name" class="block text-sm font-medium text-gray-700">{{ title }}</label>
    <div v-if="!error" class="mt-1">
        <input v-model="value"
               type="text"
               :name="name"
               :id="name"
               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
               :placeholder="placeholder" />
    </div>
    <div v-else>
        <div class="mt-1">
            <input v-model="value"
                   type="text"
                   :name="name"
                   :id="name"
                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                   aria-invalid="true"
                   :aria-describedby="name + '-error'"
                   :placeholder="placeholder"
            />
        </div>
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
