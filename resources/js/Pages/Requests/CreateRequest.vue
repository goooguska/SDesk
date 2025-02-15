<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Templates/Header.vue';
import Footer from '@/Templates/Footer.vue';
import EditRequest from '@/Templates/EditRequest.vue';
</script>

<template>
    <Head title="Создание заявки" />

    <AuthenticatedLayout>
        <template #header>
            <Header />
        </template>
        <template #main>
            <EditRequest />
        </template>
        <template #footer>
            <Footer />
        </template>
    </AuthenticatedLayout>
</template>
