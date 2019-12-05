<template>
  <div class="container">
    <div class="zaozuo">
      <div class="zz1">
        <div class="zz2">造作ZAOZUO</div>
        <a class="rt" href="/login.html"></a>
        <a class="xc" href></a>
      </div>
      <!-- 页面导航 -->
      <div class="dhl2" id="lll">
        <ul>
          <li class="l11" v-for="con in content.head" :key="con.id">
            <a href="javascript:" @click.prevent="passID(con.id)">{{con.title}}</a>
            <div class="hidee" v-show="con.order">
              <ul>
                <li v-for="ord in con.order" :key="ord.id">
                  <a href="javascript:" @click.prevent="passID(ord.id)">
                    <img :src="ord.img" alt />
                    <span class="wenben">{{ord.name}}</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- 轮播图 -->
    <spider />
    <!-- 新品发布 -->
    <div class="l_signk">
      <div class="l_zstk">
        <div class="l_zst">
          <h2>新品发布</h2>
          <p>有人说造作是家居设计界的G20，其实我们更关心如何从大师走到大众</p>
        </div>
        <div class="l_wupingk">
          <div class="l_wuping" v-for="(goods, index) in content.goods" :key="index">
            <div class="l_tupiank">
              <img :src="goods.img" alt />
              <div class="l_wpjsk">
                <a href class="l_xqjsk">
                  <div class="l_xqjs">{{ goods.describe }}</div>
                </a>
                <div class="l_mz">Form Us With Love</div>
                <p class="l_wpdj">{{ goods.address }}</p>
              </div>
            </div>
            <a href>{{ goods.name }}</a>
            <a href>¥{{ goods.price }}起</a>
            <div style="text-align:center;">
              <span v-for="(label, index) in goods.label" :key="index">{{ label.value }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 中间图片 -->
    <div class="l_situxzk">
      <div class="l_tpxzk">
        <a class="jingxuan" href>
          <img src="../../assets/images/jingxuanzhishiwanyonghu.jpg" alt />
        </a>

        <div class="stzh">
          <a href class="fjtz">
            <img src="../../assets/images/fangjiantaozhuang.jpg" alt />
          </a>
          <a href class="ppdt">
            <img src="../../assets/images/pinpaidongtai.jpg" alt />
          </a>
          <a href class="sjstd">
            <img src="../../assets/images/2cb9bbff33943e7b566f8057759c0973.jpg" alt />
          </a>
        </div>
      </div>
    </div>
    <div class="l_tdkk">
      <div class="l_tbwzk">
        <a href class="l_qmzp">
          <div class="l_qmzpt"></div>
          <p>
            27国/百位设计大师的
            <br />
            <span>
              <b>签名</b> 正品
            </span>
          </p>
        </a>

        <a href class="l_qmzp">
          <div class="l_obzz"></div>
          <p>
            100+精工大厂/100%手检
            <br />
            <span>
              <b>欧标</b> 质造
            </span>
          </p>
        </a>

        <a href class="l_qmzp">
          <div class="l_mfps"></div>
          <p>
            满¥199
            <br />
            <span>
              <b>免费</b> 配送
            </span>
          </p>
        </a>
        <a href class="l_qmzp">
          <div class="l_zsjf"></div>
          <p>
            延期高利补偿/确保
            <br />
            <span>
              <b>准时</b>交付
            </span>
          </p>
        </a>

        <a href class="l_qmzp">
          <div class="l_qrbj"></div>
          <p>
            价格保障/变动返差价
            <br />
            <span>
              <b>7日</b>保价
            </span>
          </p>
        </a>

        <a href class="l_qmzp">
          <div class="l_qrth"></div>
          <p>
            三年质保
            <br />
            <span>
              <b>7日</b>退换
            </span>
          </p>
        </a>
      </div>
    </div>

    <!-- 全品目录/签名设计正品 -->
    <div class="l_wpflk">
      <div class="l_zsk">
        <div class="l_qpml">全品目录/签名设计正品</div>

        <div class="l_wpk" v-for="(dir, conIndex) in content.head" :key="conIndex">
          <div class="l_wpdhl">
            <div class="l_spmc">{{ dir.title }}</div>
            <ul class="l_wplb" v-for="(list, index) in dir.order" :key="index">
              <a href>
                <li>{{ list.name }}</li>
              </a>
            </ul>
          </div>

          <div class="l_txkx" v-for="(goods, goodsIndex) in dir.good" :key="goodsIndex">
            <div class="l_tpkk">
              <img :src="goods.img" alt />
              <div class="l_ycwbk">
                <a href class="l_wbnrk">
                  <div class="l_wbnr">{{ goods.describe }}</div>
                </a>
                <div class="l_cde">Form Us With Love</div>
                <p class="l_vfr">{{ goods.address }}</p>
              </div>
            </div>

            <a href>{{ goods.name }}</a>

            <a href v-if="account && goods.is_discount === 1">¥{{ goods.vn_price }}</a>
            <a href :style="isDiscount(conIndex, goodsIndex)">¥{{ goods.price }}起</a>
            <div style="text-align:center">
              <span v-for="(label, index) in goods.label" :key="index">{{ label.value }}</span>
            </div>
          </div>

          <div class="l_gengduo" v-show="dir.count > 7">
            <a href>
              <p>更多</p>
              <span>{{ dir.count }}款 {{ dir.title }}</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import spider from "./spider";

export default {
  name: "container",
  components: {
    spider
  },
  data() {
    return {
      content: []
    };
  },
  methods: {
    passID(id) {
      location.href = `/${id}/list.html`;
    }
  },
  computed: {
    isDiscount() {
      return (conIndex, goodsIndex) => {
        if (
          this.account &&
          this.content.head[conIndex].good[goodsIndex].is_discount
        ) {
          return {
            "text-decoration": "line-through",
            color: "rgb(158,152,152)",
            "font-size": "14px"
          };
        }
      };
    }
  },
  created() {
    this.ajax("/index").then(data => {
      this.content = data;
    });
  }
};
</script>


