<script setup>
import AppLogo from '@/Components/AppLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="bg-gray-00 flex min-h-screen flex-col items-center bg-white pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/">
                <AppLogo />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden px-6 py-4 shadow-md sm:max-w-md sm:rounded-xl"
        >
            <slot />
        </div>
    </div>
</template>
