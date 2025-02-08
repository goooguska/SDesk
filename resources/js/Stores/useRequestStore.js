import { defineStore } from 'pinia';

export const useRequestStore = defineStore('requestStore', () => {
    const getAllRequests = async (userId) => {
        const { data } = await axios.get(`/api/v1/requests/${userId}`);
        return data;
    };

    return { getAllRequests };
});
