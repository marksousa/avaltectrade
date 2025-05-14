<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { router } from '@inertiajs/vue3';

const cep = ref('');
const error = ref('');

const isValidCep = computed(() => {
    const cleanCep = cep.value.replace(/[-\s]/g, '');
    return /^\d{8}$/.test(cleanCep);
});

const handleSubmit = () => {
    const cleanCep = cep.value.replace(/[-\s]/g, '');
    
    if (!isValidCep.value) {
        error.value = 'Por favor, insira um CEP válido com 8 dígitos';
        return;
    }

    error.value = '';
    router.visit(route('cep.show', { cep: cleanCep }));
};

const handleInput = (event) => {
    let value = event.target.value.replace(/[^\d-]/g, '');
    
    const digits = value.replace(/[^\d]/g, '');
    if (digits.length > 8) {
        value = digits.slice(0, 8);
    }
    
    if (digits.length > 5) {
        value = `${digits.slice(0, 5)}-${digits.slice(5)}`;
    }
    
    cep.value = value;
};
</script>

<template>
    <Head title="Consulta CEP" />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-semibold">Consulta de CEP</h2>
                            <Link 
                                :href="route('home')"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Voltar
                            </Link>
                        </div>

                        <form @submit.prevent="handleSubmit">
                            <div class="flex flex-col gap-4">
                                <div>
                                    <label for="cep" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP</label>
                                    <input 
                                        type="text" 
                                        id="cep" 
                                        v-model="cep"
                                        @input="handleInput"
                                        placeholder="00000-000"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                        :class="{ 'border-red-500': error }"
                                    >
                                    <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
                                </div>
                                <div>
                                    <button 
                                        type="submit" 
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md border border-transparent hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-indigo-600"
                                        :disabled="!isValidCep"
                                    >
                                        Consultar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 