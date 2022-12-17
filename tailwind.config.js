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
      'prim-light-blue' : '#A2DBFA',
      'prim-white' : '#E8F0F2',
      'prim-dark-green' : '#053742',
      'prim-dark-blue' : '#39A2DB',
      'success' : '#29CBA4',
      'fail' : '#FF7777',
      'yellow' : '#F9FA9B',
    }
  },
  plugins: [],
}
