/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#C4A882',
          50: '#F5EFE6',
          100: '#EDE2D3',
          200: '#DCC9AD',
          300: '#CBB087',
          400: '#C4A882',
          500: '#B89865',
          600: '#9D7F4F',
          700: '#77603D',
          800: '#51412A',
          900: '#2B2216',
        },
        background: {
          DEFAULT: '#3D3935',
          light: '#4A4541',
          dark: '#2E2B28',
          darker: '#34302D',
        },
        light: {
          DEFAULT: '#FAF6F0',
          50: '#FFFFFF',
          100: '#FAF6F0',
          200: '#F5EDE0',
          300: '#F0E4D0',
          400: '#EBDBC0',
        },
      },
    },
  },
  plugins: [],
}
