import AdminPage from "./../atomic/pages/AdminPage.vue";
import LoginPage from "./../atomic/pages/LoginPage.vue";
import GroupsPage from "./../atomic/pages/GroupsPage.vue";
import StudentsPage from "./../atomic/pages/StudentsPage.vue";
import LecturesPages from "./../atomic/pages/LecturesPages.vue";

import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    component: LoginPage,
  },
  {
    path: "/admin",
    component: AdminPage,
  },
  {
    path: "/admin/groups",
    component: GroupsPage,
  },
  {
    path: "/admin/groups/create",
    component: GroupsPage,
  },
  {
    path: "/admin/students",
    component: StudentsPage,
  },
  {
    path: "/admin/students/create",
    component: GroupsPage,
  },
  {
    path: "/admin/lectures",
    component: LecturesPages,
  },
  {
    path: "/admin/lectures/create",
    component: GroupsPage,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes, // short for `routes: routes`
});

export default router;
