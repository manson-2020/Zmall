<template>
  <div class="show">
    <navigation/>
    <container/>
    <foot/>
  </div>
</template>


<script>
import navigation from "@/components/layout/navigation.vue";
import foot from "@/components/layout/foot.vue";
import container from "@/components/show/container.vue";

export default {
  name: "show",
  components: {
    navigation,
    foot,
    container
  }
};
</script>

