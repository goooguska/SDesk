<script setup>
import { computed, onMounted, ref } from 'vue';
import { useRequestStore } from '@/Stores/useRequestStore';
import { useUserStore } from '@/Stores/useUserStore.js';
import { Link } from '@inertiajs/vue3';

const requestStore = useRequestStore();
const userStore = useUserStore();

const requests = ref([]);
const searchTitle = ref('');
const sortBy = ref('date');

onMounted(async () => {
    const user = userStore.getCurrentUser();
    requests.value = await requestStore.getAllRequests(user.id);
});

const formatDate = (dateString) => {
    if (!dateString) return '';
    return new Date(dateString).toLocaleDateString('ru-RU');
};

const filteredRequests = computed(() => {
    let result = [...requests.value];

    if (searchTitle.value) {
        const searchTerm = searchTitle.value.toLowerCase();
        result = result.filter((request) =>
            request.title.toLowerCase().includes(searchTerm),
        );
    }

    if (sortBy.value === 'date') {
        result.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
    } else if (sortBy.value === 'status') {
        result.sort((a, b) => a.status.name.localeCompare(b.status.name));
    }

    return result;
});
</script>

<template>
    <div class="w-xl p-4">
        <div class="mb-4 flex justify-between">
            <div class="relative w-64">
                <input
                    type="text"
                    v-model="searchTitle"
                    placeholder="Поиск по теме..."
                    class="border-gray-300 focus:ring-green-300 w-full rounded-md border py-2 pl-3 pr-10 focus:outline-none focus:ring"
                />
                <img
                    src="/storage/images/search-icon.svg"
                    class="absolute right-3 top-1/2 h-5 w-5 -translate-y-1/2 transform"
                />
            </div>

            <div class="flex items-center gap-4">
                <p>Сортировать по:</p>
                <select
                    v-model="sortBy"
                    class="border-gray-300 focus:ring-green-300 w-48 rounded-md border bg-white px-3 py-2 focus:outline-none focus:ring"
                >
                    <option value="date">дате</option>
                    <option value="status">статусу</option>
                </select>
            </div>
        </div>

        <div
            class="overflow-hidden rounded-md border border-4 border-gray shadow-md"
        >
            <table class="w-full border-collapse">
                <thead class="bg-most-light-gray">
                    <tr class="border-gray-300 border-b text-left text-gray">
                        <th class="px-4 py-3">Тема</th>
                        <th class="px-4 py-3">Дата подачи</th>
                        <th class="px-4 py-3">Руководитель</th>
                        <th class="px-4 py-3">Сотрудник</th>
                        <th class="px-4 py-3">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="request in filteredRequests"
                        :key="request.id"
                        class="border-gray-300 hover:bg-gray-100 cursor-pointer border-b"
                    >
                        <Link
                            :href="
                                route('requests.showRequest', {
                                    requestId: request.id,
                                })
                            "
                            class="contents"
                        >
                            <td
                                class="px-4 py-3 text-xl font-medium text-dark-green"
                            >
                                {{ request.title }}
                            </td>
                            <td class="px-4 py-3 text-xl text-dark-green">
                                {{ formatDate(request.created_at) }}
                            </td>
                            <td class="px-4 py-3 text-xl text-dark-green">
                                <template v-if="request.responsible">
                                    {{ request.responsible.fullname }}
                                </template>
                                <span v-else class="text-gray-500 italic"
                                    >Не назначен</span
                                >
                            </td>
                            <td class="px-4 py-3 text-xl text-dark-green">
                                {{ request.user.fullname }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-xl text-dark-green">
                                    {{ request.status.name }}
                                </span>
                            </td>
                        </Link>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
