<template>
  <AuthMiddleware>
    <TemplateLayout>
      <template #header>
        <Header />
      </template>
      <template #default>
        <StudentLectureTemplate />
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
import StudentLectureTemplate from "../templates/StudentLectureTemplate.vue";
import Header from "../../partials/Header.vue";

export default {
  components: {
    Footer,
    AuthMiddleware,
    TemplateLayout,
    StudentLectureTemplate,
    Header
},
};
</script>