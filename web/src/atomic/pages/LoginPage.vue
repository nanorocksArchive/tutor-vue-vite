<template>
  <AuthMiddleware>
    <BlankLayout>
      <template #default>
        <LoginTemplate />
      </template>
      <template #footer>
        <Footer />
      </template>
    </BlankLayout>
  </AuthMiddleware>
</template>

<script>
import BlankLayout from "../../layout/BlankLayout.vue";
import LoginTemplate from "../templates/LoginTemplate.vue";
import Footer from "../../partials/Footer.vue";
import AuthMiddleware from "../../middleware/AuthMiddleware.vue";

export default {
  components: { BlankLayout, LoginTemplate, Footer, AuthMiddleware },
};
</script>