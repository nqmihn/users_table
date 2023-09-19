import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
 
  {
    path: "/",
    name: "index",
    meta: {
      layout: "admin",
    },
    component: () => import("../pages/index.vue"),
  },
  {
    path: "/create",
    name: "create",
    meta: {
      layout: "admin",
    },
    component: () => import("../pages/create.vue"),
  },
  {
    path: "/edit/:id",
    name: "edit",
    meta: {
      layout: "admin",
    },
    component: () => import("../pages/edit.vue"),
  },
  {
    path: "/delete/:id",
    name: "delete",
    meta: {
      layout: "admin",
    },
    component: () => import("../pages/delete.vue"),
  },
  
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});
export default router;
