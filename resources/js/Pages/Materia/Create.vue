<template>
    <Head title="Nova Matéria" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nova Matéria
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-screen-lg mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <h2
                        class="font-semibold text-lg text-gray-800 leading-tight text-center"
                    >
                        Cadastrar Matéria
                    </h2>
                    <div class="py-2">
                        <InputLabel for="titulo" value="Título" />

                        <TextInput
                            id="titulo"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.titulo"
                            autofocus
                            autocomplete="username"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.titulo"
                        />
                    </div>

                    <div class="py-2">
                        <InputLabel for="descricao" value="Descrição" />

                        <TextInput
                            id="descricao"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.descricao"
                            autocomplete="username"
                        />

                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.descricao"
                        />
                    </div>

                    <div class="py-2">
                        <InputLabel
                            for="texto_completo"
                            value="Corpo da Matéria"
                        />

                        <textarea
                            id="texto_completo"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.texto_completo"
                            autofocus
                            autocomplete="username"
                            placeholder="Insira o corpo da matéria."
                        ></textarea>

                        <InputError
                            class="mt-2"
                            :message="form.errors.texto_completo"
                        />
                    </div>

                    <div class="mt-2">
                        <InputLabel for="imagem" value="Imagem" />

                        <TextInput
                            id="imagem"
                            type="file"
                            class="mt-1 block w-full"
                            @input="form.imagem = $event.target.files[0]"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.imagem"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Salvar
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { useAttrs } from "vue";

const attrs = useAttrs();

const form = useForm({
    titulo: "",
    descricao: "",
    texto_completo: "",
    descricao: "",
    imagem: null,
    user_id: attrs.auth.user.id,
});

const submit = () => {
    form.post(route("materia.store"));
};
</script>
