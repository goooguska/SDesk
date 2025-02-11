<script setup>
import { Link } from '@inertiajs/vue3';
import AppLogo from "@/Components/AppLogo.vue";

defineProps({
    status: Number,
    title: String
});
</script>

<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50">
        <AppLogo />
        <div class=" mt-[30px] text-center">
            <p class="text-[78px] text-dark-green">{{ title }}</p>
            <Link
                href="/"
                class="inline-block px-6 py-2 text-dark-green text-[35px] underline"
            >
                Вернуться на главную
            </Link>
        </div>
    </div>
</template>
