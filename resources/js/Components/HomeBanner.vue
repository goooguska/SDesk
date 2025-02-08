<script setup>
import { useUserStore } from '@/Stores/useUserStore.js';
import { onMounted, ref } from 'vue';

const userStore = useUserStore();
const userName = ref(null);

onMounted(() => {
    const currentUser = userStore.getCurrentUser();
    userName.value = currentUser.fullname;
});
</script>

<template>
    <div class="rounded-[20px] bg-dark-green py-9 text-center">
        <p class="text-[30px] text-light-green">
            Добро пожаловать, {{ userName }}
        </p>
    </div>
</template>
