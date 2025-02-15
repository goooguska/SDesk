import { defineStore } from 'pinia';

export const useStatusStore = defineStore('statusStore', () => {
    const getAllStatuses = async () => {
        const { data } = await axios.get(`/api/v1/statuses/`);
        return data;
    };

    return { getAllStatuses };
});
