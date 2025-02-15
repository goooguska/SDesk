import axios from 'axios';
import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useUserStore = defineStore('userStore', () => {
    const currentUser = ref(null);

    const getCurrentUser = () => {
        if (currentUser.value === null) {
            const storageUser = localStorage.getItem('currentUser');
            currentUser.value = storageUser ? JSON.parse(storageUser) : null;
        }
        return currentUser.value;
    };

    const setCurrentUser = (user) => {
        localStorage.setItem('currentUser', JSON.stringify(user));
        currentUser.value = user;
    };

    const fetchUser = async (userId) => {
        const { data } = await axios.get(`/api/v1/user/${userId.value}`);
        setCurrentUser(data);
    };

    const getAllUsers = async () => {
        const { data } = await axios.get('/api/v1/users');
        return data;
    };

    const checkIsAdmin = () => {
        const user = getCurrentUser();

        return user.role.isAdmin;
    };

    return {
        fetchUser,
        getCurrentUser,
        setCurrentUser,
        getAllUsers,
        checkIsAdmin,
    };
});
