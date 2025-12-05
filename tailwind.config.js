import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // enable dark mode via .dark class

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
        theme: {
            extend: {
                colors: {
                    ui: {
                        lightBg: "#F9FAFB",
                        darkBg: "#111827",

                        lightCard: "#FFFFFF",
                        darkCard: "#1F2937",

                        textLight: "#374151",
                        textDark: "#D1D5DB",

                        primary: "#C287E8",
                        primaryHover: "#E6ADEC",

                        danger: "#EF4444",
                    }
                },

                boxShadow: {
                    soft: "0 2px 8px rgba(0,0,0,0.08)",
                    dark: "0 2px 8px rgba(0,0,0,0.35)",
                },

                borderRadius: {
                    brand: "0.5rem",
                },

                transitionDuration: {
                    brand: "250ms",
                },

                fontFamily: {
                    brand: ["Figtree", ...defaultTheme.fontFamily.sans],
                },
            }

        },
         


    plugins: [
        forms,
    ],
};
