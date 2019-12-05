<template>
  <div class="bottom">
    <div class="l_wbtcc" @click="hide"></div>
    <div class="l_wxk">
      <img :src="qrcode" alt>
      <p>{{slogan}}</p>
    </div>
    <div class="l_weibu">
      <div class="l_weibuk">
        <div class="l_nrk1">
          <a class="l_zaozuod" href>造作ZAOZUO</a>
          <a class="l_zaozuox" href>zaozuo.com</a>
          <div class="l_wxalk">
            <div class="l_wxan" @click="an"></div>
            <a class="l_wblj" href></a>
          </div>
        </div>
        <div class="l_weibuleib">
          <ul class="l_ullb">
            <li v-for="(con,index) in content" :key="index" :class="con.class">
              <a
                v-for="(item,index) in con.title"
                :key="index"
                :href="item.href"
                :class="item.class"
              >{{item.text}}</a>
            </li>
          </ul>
        </div>
        <div class="l_lxwmk">
          <div class="l_lxwmx">
            <a :href="about.contact[0]" class="l_lxwm">{{about.contact[1]}}</a>
            <p>{{about.tel}}</p>
            <a :href="about.service[0]" class="l_zxkf">{{about.service[1]}}</a>
            <a :href="about.store[0]" class="l_zzqgstd">{{about.store[1]}}</a>
          </div>
        </div>
        <div class="l_beian">
          <p>{{record.textOne}}</p>
          <a :href="record.textTwo[0]">{{record.textTwo[1]}}</a>
          <a :href="record.textThree[0]">{{record.textThree[1]}}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "foot",
  data() {
    return {
      qrcode: require('../../assets/images/weixin-erweima.jpg'),
      slogan: "用微信扫码，关注造作微信公众号，随时随地体验生活美学",
      about: {
        contact: ["javascript:", "联系我们"],
        tel: "400-6636-926\xa0\xa0\xa0\xa0\xa0（9:00~21:00）",
        service: ["javascript:", "在线客服"],
        store: ["javascript:", " 造作全国实体店> "]
      },
      record: {
        textOne:
          "Copyright © 2018 zaozuo.com Inc.All Rights Reserved. 北京造化科技有限公司",
        textTwo: [
          "javascript:",
          "版权所有 京ICP备14049641号-1 增值电信业务经营许可证：京ICP证150098号"
        ],
        textThree: ["javascript:", "造作官网-全球设计师创作家居品牌"]
      },
      content: [
        {
          class: "l_li1",
          title: [
            { href: "", text: "关于造作", class: "l_guanyuzaozuo" },
            { href: "", text: "团队介绍" },
            { href: "", text: "设计师团" },
            { href: "", text: "媒体报道" },
            { href: "", text: "加入造作" },
            { href: "", text: "Designer Hiring" }
          ]
        },
        {
          class: "l_li2",
          title: [
            { href: "", text: "帮助中心", class: "l_guanyuzaozuo" },
            { href: "", text: "购物指南" },
            { href: "", text: "订单管理" },
            { href: "", text: "常见问题" }
          ]
        },
        {
          class: "l_li3",
          title: [
            { href: "", text: "服务支持", class: "l_guanyuzaozuo" },
            { href: "", text: "服务保障" },
            { href: "", text: "用户协议" },
            { href: "", text: "物流售后服务" }
          ]
        },
        {
          class: "l_li4",
          title: [
            { href: "", text: "商业合作", class: "l_guanyuzaozuo" },
            { href: "", text: "集合采购" },
            { href: "", text: "招商邀约" },
            { href: "", text: "品牌合作" },
            { href: "", text: "媒体合作" },
            { href: "", text: "设计师入驻" }
          ]
        }
      ]
    };
  },
  methods: {
    an() {
      document.getElementsByClassName("l_wbtcc")[0].style.display = "block";
      document.getElementsByClassName("l_wxk")[0].style.display = "block";
    },
    hide() {
      document.getElementsByClassName("l_wbtcc")[0].style.display = "none";
      document.getElementsByClassName("l_wxk")[0].style.display = "none";
    }
  }
};
</script>
