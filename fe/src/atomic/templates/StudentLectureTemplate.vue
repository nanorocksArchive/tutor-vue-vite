<template>
  <div class="container pt-5 pb-5">
    <JumbotroneOrganism />
    <div class="row">
      <h5 class="">
        Note: I you need to re-upolad the homework, new homework will be
        replaced with the new one !!!
      </h5>

      <div class="col-12" v-for="item in [1, 2, 3, 4]" :key="item">
        <ExercisesOrganism />
      </div>
    </div>
  </div>
</template>

<script>
import CardHorizontal from "../organisms/CardHorizontal.vue";
import JumbotroneOrganism from "../organisms/JumbotroneOrganism.vue";
import ExercisesOrganism from "../organisms/ExercisesOrganism.vue";
export default {
  components: { CardHorizontal, JumbotroneOrganism, ExercisesOrganism },
};
</script>