import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
            backgroundColor: {
                'header': '#FFFFFF', 
                'content' : '#E6F4F1',
                'text-header' : '#4be1ff',
                'table': '#003F59',
                'tag':'#005C77',
                'po-button' : '#F1962E'
            },
            textColor: {
                'header': '#005C77',
                'header-path': '#0086A2'
              },
        },
    },

    plugins: [forms,
        require("daisyui"),
        require('@tailwindcss/forms')
    ],
};
