/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/**/*.php', // Tambahkan ini untuk mencakup file di direktori public
    './app/view/**/*.php', // Sesuaikan dengan struktur proyek Anda
    './app/template/**/*.php', // Tambahkan ini jika ada file di folder template
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

