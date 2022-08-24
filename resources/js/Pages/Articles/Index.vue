<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    articles: Array
})

</script>

<template>
    <Head title="Artículos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Listado de Artículos 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end p-2">
                    <Link href="/articles/create" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Crear </Link>
                </div>

                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:mx-6 lg:mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table border-separate border-slate-500 hover:table bg-sky-500/100 min-w-full divide-y divide-gray-200">
                                    <thead class="bg-orange-200 hover font-bold">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Artículo
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Descripción
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Imagen
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                                Acción
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="odd:bg-sky-100 even:bg-slate-50 hover:bg-violet-200" v-for="article in articles" :key="article.id">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            {{ article.name }}             
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            {{ article.description }}             
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            {{ article.price }}             
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            {{ article.quantity }}             
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            <img :src="article.image" class="w-12 h-12 rounded-full" />            
                                            </td>
                                            <td class="flex space-x-6 px-6 py-8 whitespace-nowrap text-right text-medium font-medium">
                                                <Link :href="`/articles/${article.id}`" method="delete" as="button" type="button" class="text-red-600 hover:text-red-900">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                Eliminar </Link>

                                                <Link :href="`/articles/${article.id}/edit`" class="text-green-600 hover:text-green-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                     
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>Editar </Link>             
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
    </BreezeAuthenticatedLayout>
</template>