<script setup>
import { Link } from '@inertiajs/vue3';
import AppLogo from '@/Components/AppLogo.vue';

</script>

<template>
    <div
        class="bg-gray-50 flex min-h-screen flex-col items-center justify-center"
    >
        <AppLogo />
        <div class="mt-[30px] text-center">
            <p class="text-[78px] text-dark-green">{{ title }}</p>
            <Link
                href="/"
                class="inline-block px-6 py-2 text-[35px] text-dark-green underline"
            >
                Вернуться на главную
            </Link>
        </div>
    </div>
</template>
