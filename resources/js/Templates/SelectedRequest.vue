<script setup>
import { useUserStore } from '@/Stores/useUserStore.js';
import TextArea from '@/Components/TextArea.vue';
import BackLink from '@/Components/BackLink.vue';
import { router } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const userStore = useUserStore();
const request = router.page.props.request[0];
const user = request.user;
onMounted(() => {
    console.log(request);
});
const formatDate = (dateString) => {
    if (!dateString) return '';
    return new Date(dateString).toLocaleDateString('ru-RU');
};
</script>

<template>
    <div>
        <BackLink :href="'home'"> к заявкам </BackLink>
        <div class="border-4 border-gray">
            <div>
                <ul>
                    <li>Заявка №{{request.id}}</li>
                    <li>{{request.title}}</li>
                    <li>{{user.fullname}}</li>
                    <li>  {{ formatDate(request.created_at) }}</li>
                </ul>
            </div>
            <div>
                <TextArea :disabled="true" v-model="request.description" />

            </div>
            <div></div>
        </div>
    </div>
</template>

<style scoped></style>
