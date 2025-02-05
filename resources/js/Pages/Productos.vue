<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue';

const productos = ref([]);
const currentPage = ref(1);
const lastPage = ref(1);

const fetchProductos = async () => {
    const response = await axios.get('/api/productos', {
        headers: {
            'Authorization': `Bearer ${localStorage.getItem('token')}`
        }
    });
    productos.value = response.data.data;
};

const nextPage = () => {
    if (currentPage.value < lastPage.value) {
        fetchProductos(currentPage.value + 1);
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        fetchProductos(currentPage.value - 1);
    }
};

onMounted(() => {
    fetchProductos();
});
</script>

<template>
    <AppLayout title="Productos">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Lista de Productos
            </h2>
        </template>

        <div class="py-12 min-h-screen">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <div v-for="producto in productos" :key="producto.id" class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ producto.nombre }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Precio: ${{ producto.precio }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Stock: {{ producto.stock }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ producto.descripcion }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <button @click="prevPage" :disabled="currentPage === 1" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded">
                            Anterior
                        </button>
                        <span class="text-gray-600 dark:text-gray-400">Página {{ currentPage }} de {{ lastPage }}</span>
                        <button @click="nextPage" :disabled="currentPage === lastPage" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>