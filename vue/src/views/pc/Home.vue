<template>
  <div class="home">
    <Navigation/>
    <Container/>
    <Foot/>
  </div>
</template>

<script>
// @ is an alias to /src
import Navigation from "@/components/layout/navigation.vue";
import Foot from "@/components/layout/foot.vue";
import Container from "@/components/home/container.vue";

export default {
  name: "home",
  components: {
    navigation,
    foot,
    container
  },
  mounted() {
    window.onscroll = function() {
      var hh = window.pageYOffset;
      var nav = document.getElementsByClassName("nav_bar")[0];
      var dlrt = document.getElementsByClassName("dlrt")[0];
      var gwc = document.getElementsByClassName("gwc")[0];

      if (hh > 161) {
        nav.style.display = "inline-block";
        dlrt.style.display = "inline-block";
        gwc.style.display = "inline-block";
      } else {
        nav.style.display = "none";
        dlrt.style.display = "none";
        gwc.style.display = "none";
      }
    };
  }
};
</script>
<style scoped>
@import url(../../assets/css/1.css);
@import url(../../assets/css/luobo.css);
</style>


