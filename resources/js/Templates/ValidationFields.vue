<script setup>
import ValidationInput from '@/Components/ValidationInput.vue';

const props = defineProps({
    status: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div>
        <ValidationInput v-if="props.status">
            <span
                :class="{
                    'text-red': !props.status.success,
                    'text-green': props.status.success,
                }"
            >
                {{ props.status.message }}
            </span>
            <ul>
                <li
                    v-for="(messages, index) in props.status.errors"
                    :key="index"
                >
                    <ul>
                        <li
                            class="text-red"
                            v-for="(message, index) in messages"
                            :key="index"
                        >
                            {{ message }}
                        </li>
                    </ul>
                </li>
            </ul>
        </ValidationInput>

        <p v-else>Статус не найден</p>
    </div>
</template>
