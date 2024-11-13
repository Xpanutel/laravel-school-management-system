import { createRouter, createWebHistory } from 'vue-router';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Profile from './components/Profile.vue';

const routes = [
  { path: '/register', component: Register },
  { path: '/login', component: Login },
  { path: '/profile', component: Profile, meta: { requiresAuth: true } },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Проверяем авторизацию перед доступом к защищенным маршрутам
// router.beforeEach((to, from, next) => {
//   const isAuthenticated = localStorage.getItem('token') !== null;
//   if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
//     next('/login');
//   } else {
//     next();
//   }
// });

export default router;
