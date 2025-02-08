<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-indigo-500 inline-flex items-center rounded-md border bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-25"
    >
        <slot />
    </button>
</template>
