<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link :href="props.href" class="text-xl font-bold text-light-green">
        <slot />
    </Link>
</template>
