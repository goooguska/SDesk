<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    modelValue: String,
    disabled: Boolean,
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="max-w-full px-12 py-10">
        <label class="text-lg mb-2 block font-bold text-gray">
            Текст заявки
        </label>
        <textarea
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            :disabled="disabled"
            class="border-gray-300 focus:ring-green-500 disabled:bg-gray-200 h-60 w-full rounded-md border focus:outline-none focus:ring-2 disabled:cursor-not-allowed"
        ></textarea>
    </div>
</template>
