/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './packages/**/*.blade.php',
    ],
    content: [
        './resources/views/**/*.blade.php',
        './packages/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
      extend: {},
    },
    variants: {
      extend: {
        borderWidth: {
          DEFAULT: '1px',
        }
      },
    },
    plugins: [],
}