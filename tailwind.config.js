/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'raleway': ['Raleway', 'sans-serif'],
        'raleway-bold': ['Raleway-Bold', 'sans-serif'],
      },
      fontSize: {
        'small': '0.875rem', // Si tu veux personnaliser la taille 'small' selon ta définition
        'larger': '1.25rem', // Idem pour 'larger'
      },
    },
  },
  plugins: [],
}