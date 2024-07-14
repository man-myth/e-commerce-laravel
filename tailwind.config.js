import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'primary':'#FF6F61',
                'secondary':'#4A90E2',
        
                'primary-dark': '#D9534F',
                'primary-light': '#FF9985',
                'secondary-dark': '#357ABD',
                'secondary-light': '#6BB9F0',
                
                'accent-color-1': '#F5A623',
                'accent-color-2': '#50E3C2',
                'accent-color-3': '#7ED321',
                
                'background-color': '#F7F7F7',
                'text-color': '#333333',
                'secondary-text-color': '#666666',
                'border-color': '#E0E0E0',
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
