const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1.5rem',
                sm: '1.5rem',
                lg: '2rem'
            },
        },
        extend: {
            fontFamily: {
                sans: ['realist', ...defaultTheme.fontFamily.sans],
                narrow: ['realistnarrow', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'brand': {
                    'light': '#FF891C',
                    DEFAULT: '#FC7900',
                    'purple': {
                        'light': '#841e65',
                        DEFAULT: '#6B0B4E',
                    },
                    'red': '#EA0000',
                    'orange': '#FB3C00',
                    'yellow': '#FEDA01',
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
