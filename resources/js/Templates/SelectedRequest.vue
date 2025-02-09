<script setup>
import { useUserStore } from '@/Stores/useUserStore.js';
import TextArea from '@/Components/TextArea.vue';
import BackLink from '@/Components/BackLink.vue';
import { router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
import { useStatusStore } from '@/Stores/useStatusStore.js';
import RejectButton from '@/Components/RejectButton.vue';
import AcceptButton from '@/Components/AcceptButton.vue';
import StatusEnum from '@/Enums/StatusEnum.js';
import ValidationFields from '@/Templates/ValidationFields.vue';
import ValidationInput from '@/Components/ValidationInput.vue';
import { useRequestStore } from '@/Stores/useRequestStore.js';

const userStore = useUserStore();
const statusStore = useStatusStore();
const requestStore = useRequestStore();
const currentRequest = router.page.props.request[0];
const requestUser = currentRequest.user;
const currentStatus = currentRequest.status;
const message = ref('');
const responseStatus = ref('');

const statuses = ref();
const selectedStatus = ref(currentStatus.id);

onMounted(async () => {
    statuses.value = await statusStore.getAllStatuses();
});

const rejectRequest = async () => {
    responseStatus.value = '';
    message.value = '';

    if (selectedStatus.value !== StatusEnum.REJECTED) {
        message.value = 'Неверный статус! Ожидается "Отклонена"';
        return;
    }
    const request = {
        id: currentRequest.id,
        status_id: selectedStatus.value,
    };
    responseStatus.value = await requestStore.updateRequest(request);
};

const acceptRequest = async () => {
    responseStatus.value = '';
    message.value = '';

    if (selectedStatus.value === StatusEnum.REJECTED || selectedStatus.value === StatusEnum.NEW) {
        message.value = 'Неверный статус! Ожидается "В работе" или "Выполнена"';
        return;
    }

    const request = {
        id: currentRequest.id,
        status_id: selectedStatus.value,
    };
    responseStatus.value = await requestStore.updateRequest(request);
}


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
                <ul class="flex justify-evenly bg-most-light-gray py-7">
                    <li class="text-xl text-gray">
                        Заявка №{{ currentRequest.id }}
                    </li>
                    <li class="text-xl text-gray">
                        {{ currentRequest.title }}
                    </li>
                    <li class="text-xl text-gray">
                        {{ requestUser.fullname }}
                    </li>
                    <li class="text-xl text-gray">
                        {{ formatDate(currentRequest.created_at) }}
                    </li>
                </ul>
            </div>
            <div>
                <TextArea
                    :disabled="true"
                    v-model="currentRequest.description"
                />
            </div>
            <div v-if="responseStatus">
                <ValidationFields :status="responseStatus" />
            </div>
            <div v-if="message">
                <ValidationInput class="text-red"
                    >{{ message }}
                </ValidationInput>
            </div>
            <div v-if="userStore.checkIsAdmin()">
                <div class="flex w-full items-center justify-between">
                    <div class="flex w-10/12 max-w-full items-center gap-4">
                        <div
                            class="w-full max-w-[260px] border-4 border-gray py-8 text-center"
                        >
                            <p class="text-xl text-dark-green">
                                {{ currentStatus.name }}
                            </p>
                        </div>
                        <div>
                            <select
                                v-model="selectedStatus"
                                class="border-gray-300 focus:ring-green-300 w-48 rounded-md border bg-white px-3 py-2 focus:outline-none focus:ring"
                            >
                                <option value="" disabled>
                                    Выберите статус
                                </option>
                                <option
                                    v-for="status in statuses"
                                    :key="status.id"
                                    :value="status.id"
                                >
                                    {{ status.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="mr-10 flex w-10/12 max-w-full justify-end gap-4"
                    >
                        <RejectButton @click="rejectRequest"
                            >Отклонить</RejectButton
                        >
                        <AcceptButton @click="acceptRequest"
                            >Подтвердить</AcceptButton
                        >
                    </div>
                </div>
            </div>

            <div v-else></div>
        </div>
    </div>
</template>
