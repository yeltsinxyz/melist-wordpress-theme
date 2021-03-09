const colors = require('tailwindcss/colors')

module.exports = {
  purge: {
    content: ["*.php"],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'heading': ['SF Pro Display', 'ui-sans-serif'],
        'body': ['SF Pro Text', 'ui-sans-serif']
      }
    },
    colors: {
      transparent: 'transparent',
      black: colors.black,
      white: colors.white,
      gray: colors.coolGray,
      red: colors.red,
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
