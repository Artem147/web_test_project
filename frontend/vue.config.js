module.exports = {
  publicPath: '/comments_app/',

  devServer: {
    proxy: {
      '^/comments_app/api': {
        target: 'http://localhost:8000',
        changeOrigin: true
      }
    }
  }
};