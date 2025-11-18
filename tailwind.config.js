import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Joan', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background': '#3D3935',
                'background-darker': '#34302D',
                'primary': '#C4A882',
                'light': '#FFFFFF',
            },
            maxWidth: {
                '8xl': '1440px',
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
