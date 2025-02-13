<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue';

const productos = ref([]);
const currentPage = ref(1);
const lastPage = ref(1);

const fetchProductos = async (page = 1) => {
    try {
        const response = await axios.get(`/productos?page=${page}`, {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`
            }
        });
        productos.value = response.data.data;
        currentPage.value = response.data.current_page;
        lastPage.value = response.data.last_page;
    } catch (error) {
        console.error('Error fetching products:', error);
    }
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
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Productos</h2>
        </template>

        <div class="py-12 min-h-screen bg-gradient-to-r from-gray-100 to-gray-300 dark:from-gray-900 dark:to-gray-700">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div v-for="producto in productos" :key="producto.id" class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ producto.nombre }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">Precio: <span class="font-bold text-gray-800 dark:text-gray-200">${{ producto.precio }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400 mb-2">Stock: <span class="font-bold text-gray-800 dark:text-gray-200">{{ producto.stock }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400">{{ producto.descripcion }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-8">
                        <button @click="prevPage" :disabled="currentPage === 1" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-300 disabled:opacity-50">
                            Anterior
                        </button>
                        <span class="text-gray-600 dark:text-gray-400">Página {{ currentPage }} de {{ lastPage }}</span>
                        <button @click="nextPage" :disabled="currentPage === lastPage" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-300 disabled:opacity-50">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>