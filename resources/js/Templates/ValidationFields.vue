<script setup>
import InputError from '@/Components/ValidationInput.vue';
import { onMounted, ref } from 'vue';
import ValidationInput from '@/Components/ValidationInput.vue';

const props = defineProps({
    status: {
        type: Number,
        required: true,
    },
});

const codes = [
    {
        code: 500,
        message: 'Ошибка сервера, попробуйте снова',
        colorClass: 'text-red',
    },
    {
        code: 422,
        message: 'Ошибка валидации, заполните все поля',
        colorClass: 'text-red',
    },
    {
        code: 201,
        message: 'Заявка успешно создана',
        colorClass: 'text-green',
    },
];

const showStatus = ref(null);

onMounted(() => {
    showStatus.value = codes.find((code) => code.code === props.status);
});
</script>

<template>
    <div>
        <ValidationInput v-if="showStatus" :message="showStatus.message">
            <span :class="showStatus.colorClass">
                {{ showStatus.message }}
            </span>
        </ValidationInput>

        <p v-else>Статус не найден</p>
    </div>
</template>
