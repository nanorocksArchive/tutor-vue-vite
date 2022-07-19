<template>
  <AuthMiddleware>
    <TemplateLayout>
      <template #header>
        <AdminHeader />
      </template>
      <template #default>
        <GroupsTemplate />
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
import GroupsTemplate from "../templates/GroupsTemplate.vue";
import AdminHeader from "../../partials/AdminHeader.vue";

export default {
  components: { Footer, AuthMiddleware, TemplateLayout, GroupsTemplate, AdminHeader },
};
</script>