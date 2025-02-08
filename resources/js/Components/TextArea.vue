<script setup>
import { ref, defineEmits } from 'vue';

const text = ref('');
const emit = defineEmits(['update:text']);

const handleInput = () => {
    emit('update:text', text.value);
};
</script>

<template>
    <div class="max-w-full px-12 py-10">
        <label class="text-lg mb-2 block font-bold text-gray">
            Текст заявки
        </label>
        <textarea
            v-model="text"
            @input="handleInput"
            class="border-gray-300 focus:ring-green-500 h-60 w-full rounded-md border focus:outline-none focus:ring-2"
        ></textarea>
    </div>
</template>
