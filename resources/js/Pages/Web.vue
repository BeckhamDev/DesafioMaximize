<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PortalLogo from "@/Components/PortalLogo.vue";
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

        <div class="my-5">
            <a
                href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-6xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
            >
                <img
                    class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="./imagem.jpg"
                    alt=""
                />
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    >
                        A Porra do Lorax é investigado por participação em
                        esquema de tráfico.
                    </h5>
                    <p
                        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                    >
                        Personagem mundialmente conhecido tem nome incluido na
                        lista de principais suspeitos de chefiar quadrilha
                        especializada em tráfico de anões venezuelanos.
                    </p>
                </div>
            </a>
        </div>
        <a
            href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-6xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
        >
            <img
                class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="./dantas.jpg"
                alt=""
            />
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5
                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                >
                    Jovem é encontrado em estado de choque após descobrir que
                    seu "Suporte de Placa de vídeo" é na verdade um pedaço de
                    plástico qualquer.
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    Seus familiares informaram que o mesmo pagou uma quantia
                    exorbitante de dinheiro para comprar o suporte que foi
                    importado da ásia.
                </p>
            </div>
        </a>
    </main>

    <div class="pt-7">
        <footer
            class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-custom-footter dark:border-gray-600"
        >
            <span
                class="text-sm text-gray-500 sm:text-center dark:text-white mx-auto"
                >© 2023 Simetra - Laboratório Veterinário <br />
                Todos os direitos reservados.
            </span>
        </footer>
    </div>
</template>
