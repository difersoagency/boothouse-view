/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    colors: {
      'prim-red' : '#F03861',
      'prim-white' : '#FEF2F2',
      'prim-yellow' : '#F5D97E',
      'prim-brown' : '#7D5E3F',
      'success' : '#29CBA4',
    }
  },
  plugins: [],
}
