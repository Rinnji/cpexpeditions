import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-blue": "#142D65",
                "primary-blue-hover": "#254896",
                "primary-yellow": "#FAB200",
                "accent-yellow": "#F1EBD9",
                "accent-green": "#0DFD3A",
            },
        },
    },

    plugins: [forms],
};
