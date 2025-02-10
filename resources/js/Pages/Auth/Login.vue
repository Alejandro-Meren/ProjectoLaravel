<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
    <div>
        <InputLabel for="email" value="Correo Electrónico" class="text-pink-600 dark:text-pink-400 font-semibold" />
        <TextInput
            id="email"
            v-model="form.email"
            type="email"
            class="mt-1 block w-full border-pink-300 focus:border-pink-500 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md"
            required
            autofocus
            autocomplete="username"
        />
        <InputError class="mt-2 text-pink-600 dark:text-pink-400" :message="form.errors.email" />
    </div>

    <div class="mt-4">
        <InputLabel for="password" value="Contraseña" class="text-pink-600 dark:text-pink-400 font-semibold" />
        <TextInput
            id="password"
            v-model="form.password"
            type="password"
            class="mt-1 block w-full border-pink-300 focus:border-pink-500 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md"
            required
            autocomplete="current-password"
        />
        <InputError class="mt-2 text-pink-600 dark:text-pink-400" :message="form.errors.password" />
    </div>

    <div class="block mt-4">
        <label class="flex items-center">
            <Checkbox v-model:checked="form.remember" name="remember" class="text-pink-600 dark:text-pink-400" />
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Recuérdame</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 dark:focus:ring-offset-gray-800">
            ¿Olvidaste tu contraseña?
        </Link>

        <PrimaryButton class="ml-4 bg-pink-500 hover:bg-pink-600 focus:bg-pink-600 active:bg-pink-700 text-white rounded-md shadow-md transition duration-150 ease-in-out" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Iniciar sesión
        </PrimaryButton>
    </div>
</form>
    </AuthenticationCard>
</template>
