import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Admin from '../views/Admin.vue'
import Add from '../views/Add.vue'
import AddReview from '../views/AddReview.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/admin',
    name: 'Admin',
    component: Admin
  },
  {
    path: '/add',
    name: 'Add',
    component: Add
  },
  {
    path: '/add-review',
    name: 'AddReview',
    component: AddReview
  }
]

const router = new VueRouter({
  routes
})

export default router
