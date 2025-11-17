import forms from '@tailwindcss/forms';

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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background': '#3D3935',
                'background-darker': '#2D2925',
                'primary': '#C4A882',
                'light': '#FFFFFF',
            },
            maxWidth: {
                '8xl': '1920px',
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
