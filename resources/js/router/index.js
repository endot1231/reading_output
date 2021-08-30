import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'

// regitster vue.js to Vue
Vue.use(VueRouter)

// define routes 
const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/login',
    component: Login
  }
]

const router = new VueRouter({
  mode: 'history', 
  routes
})

export default router