import Vue from 'vue'
import router from './router'
import App from './App.vue'
import css from './assets/css/main.css'

new Vue({
  el: '#app',
  router,
  css,
  components: { App },
  template: '<App />'
})