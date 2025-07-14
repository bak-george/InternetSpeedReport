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
                roboto: ['Ubuntu', 'serif'],
            },
            colors: {
                purple: '#3F4896',
                orangeRed: '#CF553E',
                carrotOrange: '#F79928',
                blackNight: '#100E11',
                ashGray: '#C6D8D3'
            },
        },
    },
    plugins: [],
};
