<script setup>
import { Head, Link } from '@inertiajs/vue3';
// import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    cepData: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head title="Consulta CEP" />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-2xl font-semibold mb-6">Consulta CEP</h2>
                        <div v-if="cepData.erro" class="text-red-500">
                            {{ cepData.mensagem || 'CEP não encontrado' }}
                        </div>
                        <div v-else class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold">CEP</h3>
                                    <p>{{ cepData.cep }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Logradouro</h3>
                                    <p>{{ cepData.logradouro }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Complemento</h3>
                                    <p>{{ cepData.complemento || 'Não informado' }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Bairro</h3>
                                    <p>{{ cepData.bairro }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Cidade</h3>
                                    <p>{{ cepData.localidade }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Estado</h3>
                                    <p>{{ cepData.estado }} ({{ cepData.uf }})</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Região</h3>
                                    <p>{{ cepData.regiao }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">DDD</h3>
                                    <p>{{ cepData.ddd }}</p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Códigos</h3>
                                    <div class="space-y-1">
                                        <p><span class="font-medium">IBGE:</span> {{ cepData.ibge }}</p>
                                        <p><span class="font-medium">GIA:</span> {{ cepData.gia }}</p>
                                        <p><span class="font-medium">SIAFI:</span> {{ cepData.siafi }}</p>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">Unidade</h3>
                                    <p>{{ cepData.unidade || 'Não informado' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-center">
                            <Link
                                :href="route('cep.home')"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Voltar
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 