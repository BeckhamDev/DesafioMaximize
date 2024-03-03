<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PortalLogo from "@/Components/PortalLogo.vue";
import moment from "moment";

defineProps({
    materia: Object,
});
</script>

<template>
    <Head title="Notícia" />

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
        <div class="flex-1 flex flex-col items-center">
            <h1
                class="leading-[44px] py-7 md:text-5xl md:leading-tight lg:text-4xl lg:leading-[1.2] font-bold md:tracking-[-2px]"
            >
                {{ materia.titulo }}
            </h1>
            <div v-if="materia.imagem != null">
                <img
                    class="items-center max-h-80 max-w-96"
                    :src="'http://[::1]:5173/storage/app/' + materia.imagem"
                    alt=""
                />
            </div>

            <p
                class="pt-4 pb-8 md:pt-6 md:pb-12 max-w-screen-md text-lg text-justify lg:text-left"
            >
                {{ materia.texto_completo }}
            </p>
            <p>
                Publicado por: {{ materia.user.name }} - Data:
                {{ moment(materia.created_at).format("DD/MM/YYYY") }}
            </p>
        </div>
    </main>

    <div class="pt-7">
        <footer
            class="fixed bottom-0 left-0 z-20 w-full bg-custom-footter border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6"
        >
            <span class="text-sm sm:text-center text-white mx-auto"
                >© 2023 Simetra - Laboratório Veterinário <br />
                Todos os direitos reservados.
            </span>
        </footer>
    </div>
</template>
