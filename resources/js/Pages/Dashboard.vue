<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
import { ref, onMounted } from "vue";

const materias = ref({ data: {} });

const getResults = (page = 1) => {
    axios.get(`/materia/todas?page=${page}`).then((response) => {
        materias.value = response.data;
    });
};

onMounted(() => {
    getResults();
});

console.log(materias);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2">
                    <div class="mr-4 flex">
                        <Link
                            href="/materia/cadastro"
                            class="px-4 py-3 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                            >Cadastrar Matéria
                        </Link>
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                                >
                                    <th class="px-4 py-3">Título</th>
                                    <th class="px-4 py-3">Autor</th>
                                    <th class="px-4 py-3">
                                        Data de Publicação
                                    </th>
                                    <th class="px-4 py-3"></th>
                                    <th class="px-4 py-3"></th>
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >
                                <tr
                                    v-for="materia in materias.data"
                                    :key="materia.id"
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400"
                                >
                                    <td class="px-4 py-3 text-sm">
                                        <p class="font-semibold">
                                            {{ materia.titulo }}
                                        </p>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ materia.user.name }}
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ materia.created_at }}
                                    </td>

                                    <td class="pl-2 pr-4">
                                        <button
                                            class="text-sm bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                        >
                                            <Link href="#">Editar</Link>
                                        </button>
                                    </td>

                                    <td class="pl-2 pr-4">
                                        <button
                                            class="text-sm bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
                                        >
                                            <Link href="#">Excluir</Link>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <TailwindPagination
                            :data="materias"
                            @pagination-change-page="getResults"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
