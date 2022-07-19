<template>
  <AuthMiddleware>
    <TemplateLayout>
      <template #header>
        <Header />
      </template>
      <template #default>
        <DashboardTemplate />
      </template>
      <template #footer>
        <Footer />
      </template>
    </TemplateLayout>
  </AuthMiddleware>
</template>

<script>
import Header from "../../partials/Header.vue";
import DashboardTemplate from "../templates/DashboardTemplate.vue";
import Footer from "../../partials/Footer.vue";
import AuthMiddleware from "../../middleware/AuthMiddleware.vue";
import TemplateLayout from "../../layout/TemplateLayout.vue";

export default {
  components: { Header, DashboardTemplate, Footer, AuthMiddleware, TemplateLayout },
};
</script>