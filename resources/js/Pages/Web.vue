<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PortalLogo from "@/Components/PortalLogo.vue";

defineProps({
    materias: Object,
});
</script>

<template>
    <Head title="Portal de Notícias" />

    <div class="bg-custom-primary dark:bg-custom-primary shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <PortalLogo />
                </div>
                <div class="hidden space-x-8 sm:ms-10 sm:mt-5 sm:flex">
                    <Link
                        :href="route('web')"
                        class="font-semibold text-2xl text-white dark:text-white leading-tight hover:text-gray-600"
                    >
                        Home</Link
                    >
                </div>
            </div>
        </div>
    </div>

    <main class="flex flex-col bg-white items-center">
        <div class="container">
            <div class="md:flex-row h-full pt-8 px-80">
                <div class="">
                    <p class="text-2xl text-accent">Blog</p>
                </div>
            </div>
        </div>

        <div class="my-5" v-for="materia in materias.data" :key="materia.id">
            <a
                :href="route('exibeMateria', materia.id)"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-6xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
            >
                <img
                    v-if="materia.imagem == null"
                    class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="./images.png"
                    alt=""
                />

                <img
                    v-if="materia.imagem != null"
                    class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    :src="'http://[::1]:5173/storage/app/' + materia.imagem"
                    alt=""
                />

                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    >
                        {{ materia.titulo }}
                    </h5>
                    <p
                        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                    >
                        {{ materia.descricao }}
                    </p>
                </div>
            </a>
        </div>
    </main>

    <div class="pt-7">
        <footer
            class="bottom-0 left-0 z-20 w-full p-4 bg-custom-footter border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6"
        >
            <span class="text-sm sm:text-center text-white mx-auto"
                >© 2023 Simetra - Laboratório Veterinário <br />
                Todos os direitos reservados.
            </span>
        </footer>
    </div>
</template>
