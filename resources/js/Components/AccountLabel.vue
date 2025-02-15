<script setup>
import { computed, onMounted, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import { useUserStore } from '@/Stores/useUserStore.js';

const userStore = useUserStore();

const page = usePage();
const userData = ref(null);
const userId = computed(() => page.props.auth.user?.id);

onMounted(async () => {
    await userStore.fetchUser(userId);
    userData.value = userStore.getCurrentUser();
});
const logout = () => {
    localStorage.removeItem('currentUser');
};
</script>

<template>
    <div class="flex items-center rounded-[20px] bg-dark-green py-[20px]">
        <div class="border-r-2 border-light-green pr-5">
            <img src="/storage/images/user.svg" alt="user" class="pl-5" />
        </div>

        <div v-if="userData === null" class="pl-5">
            <p>Загрузка данных...</p>
        </div>
        <div v-else class="flex gap-3 pl-5 pr-5">
            <p class="text-m text-light-green">{{ userData.fullname }}</p>
            <p class="text-m font-bold text-light-green">
                {{ userData.role.name }}
            </p>
        </div>
        <div>
            <div
                class="flex shrink-0 items-center border-l-2 border-light-green pl-5 pr-5"
            >
                <NavLink
                    @click="logout"
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Выйти
                </NavLink>
            </div>
        </div>
    </div>
</template>

