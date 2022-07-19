<template>
  <AuthMiddleware>
    <TemplateLayout>
      <template #header>
        <AdminHeader />
      </template>
      <template #default>
        <CreateGroupsTemplate />
      </template>
      <template #footer>
        <Footer />
      </template>
    </TemplateLayout>
  </AuthMiddleware>
</template>

<script>
import Footer from "../../partials/Footer.vue";
import AuthMiddleware from "../../middleware/AuthMiddleware.vue";
import TemplateLayout from "../../layout/TemplateLayout.vue";
import AdminHeader from "../../partials/AdminHeader.vue";
import CreateGroupsTemplate from "../templates/CreateGroupsTemplate.vue";

export default {
  components: {
    Footer,
    AuthMiddleware,
    TemplateLayout,
    AdminHeader,
    CreateGroupsTemplate,
  },
};
</script>