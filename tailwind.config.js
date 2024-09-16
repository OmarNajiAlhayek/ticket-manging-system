/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            primary: "theme('colors.blue.600')",
            primaryhover: "theme('colors.blue.700')",
          },
      },
    },
    plugins: [],
  }
