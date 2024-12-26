import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                roboto: ['Roboto', 'serif'], // Base Roboto font family
                vt323: ['VT323', 'serif'],  // VT323 font
            },
            fontWeight: {
                thin: '100',
                light: '300',
                normal: '400',
                medium: '500',
                bold: '700',
                black: '900',
            },
            fontStyle: {
                italic: 'italic',
                normal: 'normal',
            },
        },
    },
    plugins: [],
};
