import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// const { addDynamicIconSelectors } = require('@iconify/tailwind');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'guest': "url('/images/aibg(1).jpeg')",
                'front': "url('/images/aibg(2).jpeg')",
            },
            colors: {
                'lgreen': '#95C22B',
                'dblue': '#0B132B',
                'brick': '#fb6705',
            },
        },
    },

    plugins: [
        forms,
        // addDynamicIconSelectors(),
    ],
};
