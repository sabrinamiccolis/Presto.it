/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [require("tw-elements/dist/plugin.cjs")],
  darkMode: "class"
}

