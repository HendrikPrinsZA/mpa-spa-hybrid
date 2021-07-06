module.exports = {
  transpileDependencies: [
    'vuetify'
  ],

  pages: {
    index: {
      entry: 'src/main.js',
      filename: process.env.NODE_ENV === 'production' ? 'app.php' : 'index.html',
      title: process.env.VUE_APP_TITLE
    }
  },

  publicPath: process.env.VUE_APP_MPA_PATH ?? '/spa/',
  outputDir: 'live/spa',

  devServer: {

    // Shows a full-screen overlay in the browser when there are compiler errors or warnings. 
    // If you want to show only compiler errors:
    overlay: {
      warnings: true,
      errors: true,
    },

    proxy: {
      '^/api': {
        target: process.env.VUE_APP_MPA_HOST,
        changeOrigin: true,
        logLevel: 'debug' 
      }
    }
  }
}
