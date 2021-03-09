module.exports = {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
    cssnano: env === "production" ? { preset: "default" } : false
  },
}
