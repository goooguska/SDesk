import { defineStore } from 'pinia';

export const useRoleStore = defineStore('roleStore', () => {
    const getAllRoles = async () => {
        const { data } = await axios.get(`/api/v1/roles/`);
        return data;
    };

    return { getAllRoles };
});
