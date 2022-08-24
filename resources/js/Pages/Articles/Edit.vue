<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    article: Object,
    image: String
});

const form = useForm({
        name: props.article.name,
        description: props.article.description,
        price: props.article.price,
        quantity: props.article.quantity,
        image: null,
    })
    
    function updateArticle() {
        Inertia.post(`/articles/${props.article.id}`, {
            _method: 'put',
            name: form.name,
            description: form.description,
            price: form.price,
            quantity: form.quantity,
            image: form.image
        })
    }

</script>

<template>
    <Head title="Artículos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Actualizar Artículos 
            </h2>
        </template>

        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-3 p-3">
                    <Link href="/articles" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-medium text-darkblue rounded">Regresar </Link>
                </div>

                <div class="">
                    <div class="grid place-content-center mt-1">
                        <form @submit.prevent="updateArticle" class="bg-orange-200 shadow-md m-2 p-2 rounded">
                            <div class="sm:col-span-8">
                                <label for="title" class="block text-medium font-medium text-gray-700">Artículo</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" v-model="form.name" class="block-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="description" class="block text-medium font-medium text-gray-700">Descripción</label>
                                <div class="mt-1">
                                    <input type="text" id="description" name="description" v-model="form.description" class="block-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="price" class="block text-medium font-medium text-gray-700">Precio</label>
                                <div class="mt-1">
                                    <input type="text" id="price" name="price" v-model="form.price" class="block-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="quantity" class="block text-medium font-medium text-gray-700">Cantidad</label>
                                <div class="mt-1">
                                    <input type="text" id="quantity" name="quantity" v-model="form.quantity" class="block-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3">
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="image" class="block text-medium font-medium text-gray-700">Imagen</label>
                                <div class="m-2 p-2">
                                    <img :src="image" class="w-32 h-32" /> 
                                </div>
                                <div class="mt-1">
                                    <input type="file" id="image" name="image" @input="form.image = $event.target.files[0]" class="block-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5 file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-medium file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100">
                                </div>
                            </div>
                            <div class="m-2 p-2">
                                <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Actualizar Artículo</button>
                            </div>  
                        </form>
                    </div>            
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
