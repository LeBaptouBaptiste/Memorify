/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig'
  ],
  theme: {
    extend: {
      maxWidth: {
        '2xs': '5rem',  // You can adjust the '10rem' value as needed.
      },
    },
  },
  plugins: [],
}
