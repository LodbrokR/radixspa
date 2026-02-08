/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './**/*.php',
        './assets/**/*.js',
        './inc/**/*.php'
    ],
    theme: {
        extend: {
            colors: {
                primary: '#f59e0b',
                'background-light': '#f8fafc',
                'background-dark': '#0a0a0a',
                'surface-dark': '#111111',
            },
            fontFamily: {
                sans: ['-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', 'sans-serif'],
            },
        },
    },
    plugins: [],
    darkMode: 'class',
}
