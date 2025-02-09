<script setup>
import { ref, onMounted, toRaw } from 'vue';
import AcceptButton from '@/Components/AcceptButton.vue';
import TextArea from '@/Components/TextArea.vue';
import { useUserStore } from '@/Stores/useUserStore.js';
import { useRequestStore } from '@/Stores/useRequestStore.js';
import ValidationFields from '@/Templates/ValidationFields.vue';
import BackLink from '@/Components/BackLink.vue';

const userStore = useUserStore();
const requestStore = useRequestStore();

const users = ref();
const selectedUser = ref('');
const text = ref('');
const title = ref('');
const responseStatus = ref('');

onMounted(async () => {
    users.value = await userStore.getAllUsers();
});

const createRequest = async () => {
    responseStatus.value = '';
    const user = toRaw(selectedUser.value);
    const currentUser = userStore.getCurrentUser();
    const request = {
        user_id: currentUser.id,
        responsible_id: user.id,
        title: title.value,
        description: text.value,
    };
    responseStatus.value = await requestStore.sendForCreateRequest(request);
    if (responseStatus.value.status === 201) {
        selectedUser.value = '';
        title.value = '';
        text.value = '';
    }
};
</script>

<template>
    <div>
        <BackLink :href="'home'"> к заявкам </BackLink>
        <div class="border-4 border-gray">
            <div class="flex w-full max-w-full gap-4 px-12 pt-5">
                <div class="flex w-6/12 max-w-full items-center gap-4">
                    <p>Кому:</p>
                    <select
                        v-model="selectedUser"
                        class="border-gray-300 focus:ring-green-300 w-full rounded-md border bg-white px-3 py-2 focus:outline-none focus:ring"
                    >
                        <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user"
                        >
                            {{ user.fullname }} ({{ user.role.name }})
                        </option>
                    </select>
                </div>

                <div class="flex w-6/12 max-w-full items-center gap-4">
                    <p>Тема:</p>
                    <input
                        type="text"
                        v-model="title"
                        class="border-gray-300 focus:ring-green-300 w-full rounded-md border bg-white px-3 py-2 focus:outline-none focus:ring"
                    />
                </div>
            </div>

            <div>
                <TextArea :disabled="false" v-model="text" />
            </div>

            <div v-if="responseStatus">
                <ValidationFields :status="responseStatus" />
            </div>
            <div class="pb-4 text-center" @click="createRequest">
                <AcceptButton>Отправить</AcceptButton>
            </div>
        </div>
    </div>
</template>
