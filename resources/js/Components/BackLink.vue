<script setup>
import NavLink from '@/Components/NavLink.vue';
defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <NavLink class="mb-2 flex items-center gap-1" :href="route(href)">
        <img src="/storage/images/back-arrow.svg" alt="Back" />
        <p class="text-xl text-dark-green">
            <slot />
        </p>
    </NavLink>
</template>

<style scoped></style>
