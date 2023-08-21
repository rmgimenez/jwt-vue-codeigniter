import { createRouter, createWebHashHistory } from 'vue-router';

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Dashboard from './pages/Dashboard.vue';
import Login from './pages/login.vue';

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/login', component: Login },
  { path: '/dashboard', component: Dashboard, meta: { requiresAuth: true } },
];

export const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  routes, // short for `routes: routes`
});
