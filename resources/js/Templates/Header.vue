<script setup>
import { Link } from '@inertiajs/vue3';
import AppLogo from '@/Components/AppLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import AccountLabel from '@/Components/AccountLabel.vue';
</script>

<template>
    <nav class="relative bg-white">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="z-10 flex shrink-0 items-center">
                    <Link :href="route('home')">
                        <AppLogo
                            class="fill-current text-gray-800 block h-9 w-auto"
                        />
                    </Link>
                </div>

                <div class="absolute left-1/2 z-0 -translate-x-1/2 transform">
                    <div
                        class="flex w-[910px] justify-between rounded-[20px] bg-dark-green px-[30px] py-[20px]"
                    >
                        <NavLink :href="route('home')"> Главная </NavLink>
                        <NavLink :href="route('requests.createRequest')">
                            Создание заявки
                        </NavLink>
                        <NavLink :href="route('requests.manageRequest')">
                            Управление заявками
                        </NavLink>
                    </div>
                </div>

                <div class="z-10">
                    <AccountLabel />
                </div>
            </div>
        </div>
    </nav>
</template>
