import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

let _isPhone = navigator.userAgent.match(
  /(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i
)
let routes = [], mb = './views/mb', pc = './views/pc';

(() => {
  if (_isPhone) {
    routes = [
      {
        path: '/',
        name: 'home',
        component: () => import(`${mb}/Home.vue`)
      },
      {
        path: '*',
        name: '404',
        component: () => import(`${pc}/404.vue`)
      }
    ]
  } else {
    routes = [
      {
        path: '/',
        name: 'home',
        component: () => import(`${pc}/Home.vue`)
      },
      {
        path: '/login.html',
        name: 'login',
        component: () => import(`${pc}/Login.vue`)
      },
      {
        path: '/:id/list.html',
        name: 'list',
        component: () => import(`${pc}/List.vue`)
      },
      {
        path: '/:id/show.html',
        name: 'show',
        component: () => import(`${pc}/Show.vue`)
      },
      {
        path: '*',
        name: '404',
        component: () => import(`${pc}/404.vue`)
      }
    ]
  }

})()


export default new Router({
  mode: 'history',
  routes: routes
})
