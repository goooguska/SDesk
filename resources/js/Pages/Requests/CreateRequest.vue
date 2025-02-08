<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Header from '@/Templates/Header.vue';
import Footer from '@/Templates/Footer.vue';
</script>

<template>
    <Head title="Главная" />

    <AuthenticatedLayout>
        <template #header>
            <Header />
        </template>
        <template #main>

        </template>
        <template #footer>
            <Footer />
        </template>
    </AuthenticatedLayout>
</template>
