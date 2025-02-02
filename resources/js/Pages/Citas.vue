<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faUser, faPhone, faScissors, faDollarSign, faCalendarAlt, faUserTie, faPencilAlt, faTrashAlt } from '@fortawesome/free-solid-svg-icons';
import { format } from 'date-fns';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';


library.add(faUser, faPhone, faScissors, faDollarSign, faCalendarAlt, faUserTie, faPencilAlt, faTrashAlt);
axios.defaults.baseURL = 'http://127.0.0.1:8000/api';

const citas = ref([]);
const servicios = ref([]);
const usuarios = ref([]);
const newCita = ref({ cliente_nombre: '', cliente_telefono: '', servicio_id: '', fecha_hora: '', precio: '', user_id: '' });
const editingCita = ref(null);

const fetchCitas = async () => {
    const response = await axios.get('/citas');
    citas.value = response.data;
};

const fetchServicios = async () => {
    const response = await axios.get('/servicios');
    servicios.value = response.data;
};

const fetchUsuarios = async () => {
    const response = await axios.get('/usuarios');
    usuarios.value = response.data;
};

const saveCita = async () => {
    try {
        if (editingCita.value) {
            await axios.put(`/citas/${editingCita.value.id}`, newCita.value);
        } else {
            await axios.post('/citas', newCita.value);
        }
        newCita.value = { cliente_nombre: '', cliente_telefono: '', servicio_id: '', fecha_hora: '', precio: '', user_id: '' };
        editingCita.value = null;
        fetchCitas();
    } catch (error) {
        console.error(error);
    }
};

const editCita = (cita) => {
    newCita.value = { ...cita, cliente_nombre: cita.cliente.nombre, cliente_telefono: cita.cliente.telefono, servicio_id: cita.servicio.id, user_id: cita.user.id };
    editingCita.value = cita;
};

const deleteCita = async (id) => {
    try {
        await axios.delete(`/citas/${id}`);
        fetchCitas();
    } catch (error) {
        console.error(error);
    }
};

const updatePrecio = (servicioId) => {
    const servicio = servicios.value.find(s => s.id === servicioId);
    if (servicio) {
        newCita.value.precio = servicio.precio;
    } else {
        newCita.value.precio = '';
    }
};

watch(() => newCita.value.servicio_id, (newVal) => {
    updatePrecio(newVal);
});

onMounted(() => {
    fetchCitas();
    fetchServicios();
    fetchUsuarios();
});

const formatDateTime = (dateTime) => {
    return format(new Date(dateTime), 'dd/MM/yyyy HH:mm');
};

const formatPhoneNumber = (phoneNumber) => {
    if (!phoneNumber) return '';
    return phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
};
</script>

<template>
    <AppLayout title="Citas">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Citas en la Peluquería
            </h2>
        </template>

        <div class="py-12 min-h-screen">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="flex">
                        <div class="w-1/3"> <!-- Cambiado de w-1/2 a w-1/3 -->
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-6">{{ editingCita ? 'Editar Cita' : 'Agregar Cita' }}</h3>
                            <form @submit.prevent="saveCita" class="space-y-6">
                                <div class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'user']" class="text-gray-500" />
                                    <label for="cliente_nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del Cliente</label>
                                </div>
                                <input v-model="newCita.cliente_nombre" type="text" id="cliente_nombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" required>

                                <div class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'phone']" class="text-gray-500" />
                                    <label for="cliente_telefono" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono del Cliente</label>
                                </div>
                                <input v-model="newCita.cliente_telefono" type="text" id="cliente_telefono" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" required>

                                <div class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'scissors']" class="text-gray-500" />
                                    <label for="servicio_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Servicio</label>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1">
                                        <label for="servicio_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Servicio</label>
                                        <select v-model="newCita.servicio_id" id="servicio_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" required>
                                            <option value="" disabled>Seleccione un servicio</option>
                                            <option v-for="servicio in servicios" :key="servicio.id" :value="servicio.id">
                                                {{ servicio.nombre }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex-1">
                                        <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                                        <input v-model="newCita.precio" type="text" id="precio" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" readonly>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'user-tie']" class="text-gray-500" />
                                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Peluquero</label>
                                </div>
                                <select v-model="newCita.user_id" id="user_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" required>
                                    <option value="" disabled>Seleccione un peluquero</option>
                                    <option v-for="usuario in usuarios" :key="usuario.id" :value="usuario.id">
                                        {{ usuario.name }}
                                    </option>
                                </select>
                                <div class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'calendar-alt']" class="text-gray-500" />
                                    <label for="fecha_hora" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha y Hora</label>
                                </div>
                                <input v-model="newCita.fecha_hora" type="datetime-local" id="fecha_hora" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300" required>
                                <div>
                                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 text-white font-semibold rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-102 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-gray-500">
                                        {{ editingCita ? 'Actualizar' : 'Agregar' }}
                                    </button>                           
                            </div>
                            </form>
                        </div>
                        <div class="w-px bg-gray-300 mx-4"></div> <!-- Línea vertical -->
                        <div class="w-2/3"> <!-- Cambiado de w-1/2 a w-2/3 -->
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-6">Lista de Citas</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cliente</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Teléfono</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Servicio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Precio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha y Hora</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Peluquero</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
        <tr v-for="cita in citas" :key="cita.id" class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ cita.id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ cita.cliente?.nombre || 'N/A' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ formatPhoneNumber(cita.cliente?.telefono) || 'N/A' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ cita.servicio?.nombre || 'N/A' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ cita.servicio?.precio || 'N/A' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ formatDateTime(cita.fecha_hora) }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ cita.user?.name || 'N/A' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                <button @click="editCita(cita)" class="px-3 py-2 bg-yellow-500 text-white rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150 ease-in-out">
                    <font-awesome-icon :icon="['fas', 'pencil-alt']" class="text-base" />
                </button>
                <button @click="deleteCita(cita.id)" class="px-3 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 ml-2 transition duration-150 ease-in-out">
                    <font-awesome-icon :icon="['fas', 'trash-alt']" class="text-base" />
                </button>
            </td>
        </tr>
    </tbody>
</table>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>