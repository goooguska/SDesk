import { defineStore } from 'pinia';

export const useRequestStore = defineStore('requestStore', () => {
    const getAllRequests = async (userId) => {
        const { data } = await axios.get(`/api/v1/requests/${userId}`);
        return data;
    };

    const sendForCreateRequest = async (request) => {
        try {
            const response = await axios.post(`/api/v1/requests`, request);
            return response.status;
        } catch (error) {
            return error.status;
        }
    };

    return { getAllRequests, sendForCreateRequest };
});
