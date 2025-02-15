<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Templates/Header.vue';
import Footer from '@/Templates/Footer.vue';
import AllRequests from '@/Templates/AllRequests.vue';
</script>

<template>
    <Head title="Управление заявками" />

    <AuthenticatedLayout>
        <template #header>
            <Header />
        </template>
        <template #main>
            <AllRequests />
        </template>
        <template #footer>
            <Footer />
        </template>
    </AuthenticatedLayout>
</template>
