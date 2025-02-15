<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ValidationInput from '@/Components/ValidationInput.vue';

defineProps({
    status: {
        type: String,
    },
});
const form = useForm({
    email: '',
    password: '',
    remember: false,
});
const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Вход" />
        <div v-if="status" class="text-green-600 text-sm mb-4 font-medium">
            {{ status }}
        </div>
        <form @submit.prevent="submit" class="mx-4">
            <div>
                <p class="my-4 text-xl">Вход</p>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                />
                <ValidationInput class="mt-2">
                    {{ form.errors.email }}
                </ValidationInput>
            </div>
            <div class="mt-4">
                <InputLabel for="password" value="Пароль" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                />
                <ValidationInput class="mt-2">
                    {{ form.errors.password }}
                </ValidationInput>
            </div>
            <div class="text-center">
                <PrimaryButton
                    class="my-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Войти
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
