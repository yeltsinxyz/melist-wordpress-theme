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
    }
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
