<template>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-4 pt-4" v-for="item in [1,2,3,4]" :key="item">
        <CardHorizontal/>
      </div>
    </div>
  </div>
</template>

<script>
import CardHorizontal from "../organisms/CardHorizontal.vue";
export default { components: { CardHorizontal } };
</script>