<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '@/Templates/Header.vue';
import Footer from '@/Templates/Footer.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SelectedRequest from '@/Templates/SelectedRequest.vue';
</script>

<template>
    <Head title="Заявка" />

    <AuthenticatedLayout>
        <template #header>
            <Header />
        </template>
        <template #main>
            <SelectedRequest />
        </template>
        <template #footer>
            <Footer />
        </template>
    </AuthenticatedLayout>
</template>
