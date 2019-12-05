<template>
  <div>
    <navigation/>
    <div class="l_wpdk">
      <div class="l_wpxk">
        <div class="l_txkx" v-for="(goods, goodsIndex) in content.goods" :key="goodsIndex">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href="javascript:" @click.prevent="passID(goods.id)" class="l_wbnrk">
                <div class="l_wbnr">{{ goods.describe }}</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">{{ goods.address }}</p>
            </div>
          </div>
          <a href>{{ goods.name }}</a>

          <a href v-if="account">¥{{ goods.vn_price }}</a>
          <a href :style="isDiscount(goodsIndex)">¥{{ goods.price }}起</a>

          <div style="text-align:center;">
            <span v-for="(label, index) in goods.label" :key="index">{{ label.value }}</span>
          </div>
        </div>
      </div>
    </div>
    <foot/>
  </div>
</template>

<script>
import navigation from "@/components/layout/navigation.vue";
import foot from "@/components/layout/foot.vue";

export default {
  name: "list",
  components: {
    navigation,
    foot
  },
  data() {
    return {
      content: [],
    };
  },
  computed: {
    isDiscount() {
      return goodsIndex => {
        if (this.account && this.content.goods[goodsIndex].is_discount) {
          return {
            "text-decoration": "line-through",
            "color": "rgb(158,152,152)",
            "font-size": "14px"
          };
        }
      };
    }
  },
  methods: {
    getPath() {
      let url = location.href.split("//")[1];
      let len = url.indexOf("/");
      let path = url.substring(len);
      return path.indexOf("?") !== -1 ? path.split("?")[0] : path;
    },
    passID(id) {
      location.href = `/${id}/show.html`;
    }
  },
  mounted() {
    let id = this.getPath().substring(
      this.getPath().indexOf("/") + 1,
      this.getPath().indexOf("/list.html")
    );
    this.ajax("/shopping/lists", id).then(data => {
      this.content = data;
      console.log(data)
    });
  }
};
</script>


<style scoped>
@import url(../../assets/css/2.css);
</style>




