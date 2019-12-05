<template>
  <div class="top fixed" id="nav">
    <div class="main">
      <div class="logo">
        <a href="/">
          <img :src="logo" alt>
        </a>
      </div>
      <div class="nav_bar">
        <ul>
          <li class="l1" v-for="con in nav" :key="con.id">
            <a href="javascript:" @click.prevent="passID(con.id)">{{con.title}}</a>
            <div class="hid" v-show="con.order">
              <ul>
                <li v-for="ord in con.order" :key="ord.id">
                  <a href="javascript:" @click.prevent="passID(ord.id)">
                    <img :src="ord.img" alt>
                    <span class="wenben">{{ord.name}}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="zbnr">
        <ul>
          <li v-for="(item,index) in text" :key="index">
            <a :href="item.href">{{item.name}}</a>
          </li>
        </ul>
        <a href="/login.html" class="dlrt"></a>
        <a href class="gwc"></a>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  name: "Header",
  data() {
    return {
      logo: require("../../assets/images/logo.png"),
      nav: [],
      text: [
        { href: "javascript:", name: "实体店" },
        { href: "javascript:", name: "了解造作" },
        { href: "javascript:", name: "商业合作" }
      ]
    };
  },
  methods: {
    passID(id) {
      location.href = `/${id}/list.html`;
    }
  },
  mounted() {
    axios({ url: `${process.env.VUE_APP_API}/index/nav` })
      .then(res => {
        this.nav = res.data.head;
      })
      .catch(err => console.error(err));
  }
};
</script>

<style scoped>
@import url(../../assets/css/toubu.css);
</style>
