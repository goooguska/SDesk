import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            white: '#FFFFFF',
            green: '#24B23E',
            black: '#000000',
            gray: '#828B8D',
            red: '#B91C1C',
            pink: '#FEE2E2',

            'dark-green': '#047857',
            'light-green': '#D1FAE5',
            'light-gray': '#CED4D7',
            'most-light-gray': '#E9EBED',
        },
        fontSize: {
            xs: '12px',
            s: '14px',
            m: '16px',
            l: '18px',
            xl: '20px',
        },
        extend: {
            fontFamily: {
                sans: ['Monda', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
