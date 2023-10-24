import {createRouter, createWebHashHistory} from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'index',
    component: () => import('@/pages/IndexPage.vue'),
    meta: {
      title: "Főoldal",
      requiesAuth: false
    }
  },
  {
    path: '/masodik',
    name: 'second',
    component: () => import('@/pages/SecondPage.vue'),
    meta: {
      title: "Második",
      requiesAuth: false
    }
  }
]

export const router = createRouter({
  history: createWebHashHistory(),
  routes
});