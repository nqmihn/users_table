import { defineAsyncComponent } from "vue";

export function registerGlobalComponent(app) {
  app.component(
    "admin-layout",
    defineAsyncComponent(() => import("../layouts/admin.vue"))
  );
  app.component(
    "default-layout",
    defineAsyncComponent(() => import("../layouts/default.vue"))
  );
}
