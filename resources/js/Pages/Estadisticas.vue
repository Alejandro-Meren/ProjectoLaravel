<script setup>
import { ref, onMounted } from 'vue';
import { Bar, Pie } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement } from 'chart.js';
import AppLayout from '@/Layouts/AppLayout.vue';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, ArcElement);

const citasData = ref([]);
const serviciosData = ref([]);
const productosData = ref([]);

const fetchData = async () => {
  // Simula la obtención de datos desde una API
  citasData.value = [10, 20, 30, 40, 50, 60, 70]; // Datos de ejemplo
  serviciosData.value = [100, 200, 300, 400, 500]; // Datos de ejemplo
  productosData.value = [15, 25, 35, 45, 55]; // Datos de ejemplo
};

onMounted(() => {
  fetchData();
});
</script>

<template>
  <AppLayout title="Estadísticas">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Estadísticas
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Citas por Semana</h3>
            <Bar :data="{
              labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
              datasets: [{
                label: 'Citas',
                backgroundColor: '#f87979',
                data: citasData
              }]
            }" />
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Ingresos por Servicios</h3>
            <Bar :data="{
              labels: ['Corte', 'Tinte', 'Peinado', 'Manicura', 'Pedicura'],
              datasets: [{
                label: 'Ingresos',
                backgroundColor: '#36a2eb',
                data: serviciosData
              }]
            }" />
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Productos Más Vendidos</h3>
            <Pie :data="{
              labels: ['Champú', 'Acondicionador', 'Gel', 'Laca', 'Cera'],
              datasets: [{
                label: 'Ventas',
                backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#ff9f40'],
                data: productosData
              }]
            }" />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
/* Estilos adicionales si es necesario */
</style>