import { defineStore } from 'pinia';

export const useRequestStore = defineStore('requestStore', () => {
    const getAllRequests = async (userId) => {
        const { data } = await axios.get(`/api/v1/requests/${userId}`);
        return data;
    };

    const sendForCreateRequest = async (request) => {
        try {
            const response = await axios.post(`/api/v1/requests`, request);

            return {
                success: true,
                message: response.data.message || 'Заявка успешно создана',
                status: response.status,
            };
        } catch (error) {
            return {
                success: false,
                message: 'Ошибка при создании заявки',
                errors: error.response?.data.errors,
                status: error.response?.status || 500,
            };
        }
    };

    const updateRequest = async (request) => {
        try {
            const response = await axios.put(`/api/v1/requests/${request.id}`, {
                status_id: request.status_id,
            });

            return {
                success: true,
                message:
                    response.data.message || 'Статус заявки успешно обновлен',
                status: response.status,
            };
        } catch (error) {
            return {
                success: false,
                message: 'Ошибка при обновлении заявки',
                errors: error.response?.data.errors,
                status: error.response?.status || 500,
            };
        }
    };

    const deleteRequest = async (requestId) => {
        try {
            const response = await axios.delete(
                `/api/v1/requests/${requestId}`,
            );

            return {
                success: true,
                data: response.data,
                message: response.data?.message || 'Заявка успешно удалена',
                status: response.status,
            };
        } catch (error) {
            throw {
                success: false,
                message:
                    error.response?.data?.message ||
                    'Ошибка при удалении заявки',
                status: error.response?.status || 500,
                errors: error.response?.data?.errors || null,
            };
        }
    };

    return {
        getAllRequests,
        sendForCreateRequest,
        updateRequest,
        deleteRequest,
    };
});
