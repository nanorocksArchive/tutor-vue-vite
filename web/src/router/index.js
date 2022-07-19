import LoginPage from "./../atomic/pages/LoginPage.vue";
import DashboardPage from "./../atomic/pages/DashboardPage.vue";
import StudentLecture from "./../atomic/pages/StudentLecture.vue";

import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    component: LoginPage,
  },
  {
    path: "/students/:id/lectures",
    component: DashboardPage,
  },
  {
    path: "/students/:id/lectures/:id",
    component: StudentLecture,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;
