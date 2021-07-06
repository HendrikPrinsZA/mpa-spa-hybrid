import { createRouter, createWebHashHistory } from 'vue-router'
import Accounts from '../views/Accounts.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    redirect: '/accounts'
  },
  {
    path: '/accounts',
    name: 'Accounts',
    component: Accounts
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
