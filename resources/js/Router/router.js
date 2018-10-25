import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import Products from '../components/product/Products'
import Create from '../components/product/Create'
import Payments from '../components/product/Payments'
import Logout from '../components/login/Logout'
import Categories from '../components/product/Categories'
import HomePage from '../components/product/HomePage'



Vue.use(VueRouter)

const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: Signup },
    { path: '/homepage', component: HomePage, name:'homepage' },
    { path: '/products', component: Products, name:'products' },
    { path: '/logout', component: Logout, name:'logout' },
    { path: '/create', component: Create, name:'create' },
    { path: '/payments', component: Payments, name:'payments' },
    { path: '/categories', component: Categories, name:'categories' },
  ]

  const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang:false,
    mode: 'history'
  })

  export default router