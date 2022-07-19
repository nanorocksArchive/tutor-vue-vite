<template>
  <AuthMiddleware>
    <TemplateLayout>
      <template #header>
        <AdminHeader />
      </template>
      <template #default>
        <AdminTemplate />
      </template>
      <template #footer>
        <Footer />
      </template>
    </TemplateLayout>
  </AuthMiddleware>
</template>

<script>
import Footer from "../../partials/Footer.vue";
import AdminTemplate from "../templates/AdminTemplate.vue";
import AuthMiddleware from "../../middleware/AuthMiddleware.vue";
import TemplateLayout from "../../layout/TemplateLayout.vue";
import AdminHeader from "../../partials/AdminHeader.vue";

export default {
  components: {
    Footer,
    AdminTemplate,
    AuthMiddleware,
    TemplateLayout,
    AdminHeader,
  },
};
</script>