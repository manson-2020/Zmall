<template>
  <div class="show">
    <div class="l_yhzstp"></div>
    <div class="l_wxtcc"></div>
    <!-- body -->
    <div class="q_body">
      <div class="q_top">
        <div class="q_topl">
          <img :src="obj.goods.img" width="90%" height="100%">
        </div>
        <div class="q_topr">
          <h3 class="q_top2">
            <p>{{ obj.goods.name }} |</p>
            <p>{{ obj.goods.name_en }}</p>
          </h3>

          <h2 v-if="account && obj.goods.is_discount === 1">¥{{ obj.goods.vn_price }}</h2>
          <h2 :style="isDiscount">¥{{ obj.goods.price }}</h2>

          <div class="q_top3">
            <p>设计师手选组合，最高可省¥466，马上看看</p>
            <p class="q_one"></p>
          </div>
          <div class="q_top4">今天下单，将于{{ obj.goods.time }}前发货，大件家具会致电确认</div>

          <div class="q_top5" v-for="(attr, attrIndex) in obj.attrs" :key="attrIndex">
            <div class="q_top6">{{ attr.name }} :</div>
            <div class="q_top7" v-for="(cate, cateIndex) in attr.value" :key="cateIndex">
              <div
                class="q_a"
                :class="{'active':cate.select}"
                @click="active(attrIndex,cateIndex)"
              >{{ cate.value }}</div>
            </div>
          </div>

          <div class="q_top8">
            <div class="q_top11">
              <div class="q_top12">
                <input type="text" value="1" class="inputs" maxlength="3">
                <p class="q_jia">＋</p>
                <p class="q_jian">－</p>
              </div>
              <div class="q_top13">立即购买</div>
              <div class="q_top14">加入购物车</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- more -->
    <div class="l_ovedio">
      <img src="../../assets/images/yonnh.jpg" alt>
      <div class="l_creative">
        <div class="l_creative_1">
          <img src="../../assets/images/fuqi-tupain.jpg" alt>
          <p class="l_crwb1">Yonoh Creative Studio</p>
          <p class="l_crwb2">Spain | Valencia</p>
          <a href>了解更多&nbsp;></a>
        </div>
        <div class="l_creative_2">
          Yonoh Creative Studio，西班牙设计工作室，成立于2006年。2013、2015年iF Design Award获得者，2012年RedDot
          Design Award获得者，同时曾陆续获得Interior Innovation Selection、Best Of Year Selection、Good Design、Porcelanos
          Interiors等国际设计大奖。
          “我们带着改变现状的使命而来，我们希望做一些有创造性的东西，因此，成为设计师是一个好的选择。”对于未来，Yonoh认为，更加欢快的色彩基调正在成为趋势，“我想，享受生活的惬意，没有人会拒绝。”
        </div>
      </div>
    </div>

    <!-- style -->
    <div class="l_qyxtytgs">
      <img src="../../assets/images/qiangyantup.jpg" alt>

      <div class="l_qyxt">
        <p>抢眼形态与糖果色，空间的颜值担当</p>
        <div>造作软糖沙发®，点亮全家的甜度之作</div>
      </div>
    </div>

    <!-- information -->
    <div class="l_ykzlbzk">
      <div class="l_zlbz">
        <img src="../../assets/images/yankezhiliangbaoz.jpg" alt>
        <div class="l_bzwb">
          <p>严苛质量保证</p>
          <div class="l_chakanxq">查看详情</div>
        </div>
      </div>

      <div class="l_biaogek">
        <div class="l_bg">
          <div class="l_xxggcs">详细规格参数</div>
          <ul>
            <li>
              <p>重量</p>
              <div>单人座11.5kg，无扶手双人座40kg，单扶手双人座47kg，双扶手双人座53.5kg，无扶手双靠包双人座40kg，长脚墩16kg，短脚墩11.5kg，茶几16kg，单扶手边桌双人座50kg</div>
            </li>
            <li>
              <p>材料</p>
              <div>涤纶面料、亚麻与涤纶混纺面料、海绵、钢管等</div>
            </li>
            <li>
              <p>涂料</p>
              <div>脚：环氧/聚酯粉末涂料</div>
            </li>
            <li>
              <p>重量</p>
              <div>单人座11.5kg，无扶手双人座40kg，单扶手双人座47kg，双扶手双人座53.5kg，无扶手双靠包双人座40kg，长脚墩16kg，短脚墩11.5kg，茶几16kg，单扶手边桌双人座50kg</div>
            </li>
            <li>
              <p>材料</p>
              <div>涤纶面料、亚麻与涤纶混纺面料、海绵、钢管等</div>
            </li>
            <li>
              <p>涂料</p>
              <div>脚：环氧/聚酯粉末涂料</div>
            </li>
            <li>
              <p>涂料</p>
              <div>脚：环氧/聚酯粉末涂料</div>
            </li>
          </ul>

          <div class="l_zskk">
            <img src="../../assets/images/zhengshu.jpg" alt>
            <p>经国家家具及室内环境质量监督检验中心检测，软糖沙发所用海绵表现密度为35.4/m³，回弹性能与压缩永久变形指标高达A级标准，检测结果符合国际实验室认可合作组织、中国合格评定国家认可委员会等专业机构的相关标准。</p>
          </div>
          <div class="l_sqan">收起</div>
        </div>
      </div>
    </div>

    <!-- 真实生活 -->
    <div class="l_jxzsw">
      <div class="l_zyzzmx">看真实生活里的造作美学</div>
      <div class="l_wutuk">
        <a class="l_ly">
          <img src="../../assets/images/tcctpzs.jpg" alt>
          <div class="l_txzsk1">
            <img src="../../assets/images/qazwsx.jpg" alt>
            <p>沙发用料做工都很好，设计也是我想要的风格，也懒的去市场看，直接造作下单，物流很快，还直接送入户</p>
            <div>
              已获得¥486
              <br>全场优惠券
            </div>
          </div>
        </a>

        <a class="l_ly">
          <img src="../../assets/images/tcctpzs.jpg" alt>
          <div class="l_txzsk1">
            <img src="../../assets/images/qazwsx.jpg" alt>
            <p>沙发用料做工都很好，设计也是我想要的风格，也懒的去市场看，直接造作下单，物流很快，还直接送入户</p>
            <div>
              已获得¥486
              <br>全场优惠券
            </div>
          </div>
        </a>

        <a class="l_ly">
          <img src="../../assets/images/tcctpzs.jpg" alt>
          <div class="l_txzsk1">
            <img src="../../assets/images/qazwsx.jpg" alt>
            <p>沙发用料做工都很好，设计也是我想要的风格，也懒的去市场看，直接造作下单，物流很快，还直接送入户</p>
            <div>
              已获得¥486
              <br>全场优惠券
            </div>
          </div>
        </a>

        <a class="l_ly">
          <img src="../../assets/images/tcctpzs.jpg" alt>
          <div class="l_txzsk1">
            <img src="../../assets/images/qazwsx.jpg" alt>
            <p>沙发用料做工都很好，设计也是我想要的风格，也懒的去市场看，直接造作下单，物流很快，还直接送入户</p>
            <div>
              已获得¥486
              <br>全场优惠券
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- layer -->
    <div class="l_zzmxtcc">
      <div class="l_tpkk">
        <div class="l_tpk1">
          <img src="../../assets/images/tanchuceng-tupian1.jpg" alt>
          <img src="../../assets/images/tanchuceng-tupian2.jpg" alt>
        </div>
        <div class="l_tcccbl">
          <div class="l_yhyx">
            <ul class="l_xxk">
              <li class="l_xingming">宅夫人</li>
              <li class="l_didian">浙江 湖州</li>
              <li class="l_jieshao">已获得240优惠券</li>
            </ul>
            <div class="l_touxk">
              <img src="../../assets/images/touxiang.jpg" alt>
            </div>
          </div>

          <p class="l_wbjj">因为家里是北欧风格的装修，所以在挑选时，特地选择了最百搭的白色，用来做书桌，很有设计感。</p>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>

          <p class="l_thgml">TA还购买了</p>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>

          <div class="l_plm">
            <div class="l_okn">
              <img src="../../assets/images/tccyangshitu.jpg" alt>

              <div class="l_ycwbk1">
                <a href class="l_wbnrk1">
                  <div class="l_wbnr1">漂亮有机曲线，一款容积率翻倍的多功能桌</div>
                </a>
                <div class="l_cde1">Form Us With Love</div>
                <p class="l_vfr1">Sweden&nbsp;|&nbsp;Stockholm</p>
              </div>
            </div>

            <a href>飞鸟沙发</a>
            <a href>¥2299起</a>
            <span>4色可选</span>
          </div>
        </div>
      </div>
      <span class="l_guanbi">×</span>
    </div>

    <!-- 建议搭配 -->
    <div class="l_tuijian">
      <div class="l_tjk">
        <div class="l_sjstj">设计师建议您这样搭配</div>

        <div class="l_txkx">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href class="l_wbnrk">
                <div class="l_wbnr">从斯德哥尔摩到北京的温暖大拥抱</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">Sweden&nbsp;|&nbsp;Stockholm</p>
            </div>
          </div>
          <a href>飞鸟沙发</a>
          <a href>¥2299起</a>
          <span>4色可选</span>
        </div>
        <div class="l_txkx">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href class="l_wbnrk">
                <div class="l_wbnr">从斯德哥尔摩到北京的温暖大拥抱</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">Sweden&nbsp;|&nbsp;Stockholm</p>
            </div>
          </div>
          <a href>飞鸟沙发</a>
          <a href>¥2299起</a>
          <span>4色可选</span>
        </div>
        <div class="l_txkx">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href class="l_wbnrk">
                <div class="l_wbnr">从斯德哥尔摩到北京的温暖大拥抱</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">Sweden&nbsp;|&nbsp;Stockholm</p>
            </div>
          </div>
          <a href>飞鸟沙发</a>
          <a href>¥2299起</a>
          <span>4色可选</span>
        </div>
        <div class="l_txkx">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href class="l_wbnrk">
                <div class="l_wbnr">从斯德哥尔摩到北京的温暖大拥抱</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">Sweden&nbsp;|&nbsp;Stockholm</p>
            </div>
          </div>
          <a href>飞鸟沙发</a>
          <a href>¥2299起</a>
          <span>4色可选</span>
        </div>
        <div class="l_txkx">
          <div class="l_tpkk">
            <img src="../../assets/images/feiliaoshafa.jpg" alt>
            <div class="l_ycwbk">
              <a href class="l_wbnrk">
                <div class="l_wbnr">从斯德哥尔摩到北京的温暖大拥抱</div>
              </a>
              <div class="l_cde">Form Us With Love</div>
              <p class="l_vfr">Sweden&nbsp;|&nbsp;Stockholm</p>
            </div>
          </div>
          <a href>飞鸟沙发</a>
          <a href>¥2299起</a>
          <span>4色可选</span>
        </div>
      </div>
    </div>

    <!-- 服务承诺 -->
    <div class="l_fwcnk">
      <img src="../../assets/images/chengluotupian.jpg" alt>
      <div class="l_fwcnwb">服务承诺</div>
      <div class="l_cntbk">
        <a href class="l_tbwbk">
          <div class="l_tubiao1"></div>
          <p>
            满¥199
            <br>
            <span>
              <b>免费</b> 送装
            </span>
          </p>
        </a>

        <a href class="l_tbwbk">
          <div class="l_tubiao2"></div>
          <p>
            延期高利补偿/确保
            <br>
            <span>
              <b>准时</b> 交付
            </span>
          </p>
        </a>
        <a href class="l_tbwbk">
          <div class="l_tubiao3"></div>
          <p>
            价格保障/变动返差价
            <br>
            <span>
              <b>7日</b>保价
            </span>
          </p>
        </a>
        <a href class="l_tbwbk">
          <div class="l_tubiao4"></div>
          <p>
            三年质保
            <br>
            <span>
              <b>7日</b>退换
            </span>
          </p>
        </a>
      </div>
    </div>

    <!-- 常见问题 -->
    <div class="l_sdwtk">
      <div class="l_sdwkk1">
        <ul class="l_caidan">
          <li class="saidanxx lyly">晒单</li>
          <li class="saidanxx">常见问题</li>
        </ul>

        <div class="l_xiangqk l_saidanxxk">
          <ul>
            <li>
              <div class="l_yhtxk">
                <img src="../../assets/images/yonghutouxiang.jpg" alt>
              </div>
              <dt class="l_xmk">
                <dl>邱浩</dl>
              </dt>

              <div class="l_clearfixed">
                <p>家里终于收拾好了 年前和夫人去逛街 看到了软糖沙发 一见倾心就买了 沙发质地很好坐着也舒服 空间利用的很极致 适合户型不大的精致空间</p>

                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
              </div>

              <div class="l_jxsdk"></div>
            </li>

            <li>
              <div class="l_yhtxk">
                <img src="../../assets/images/yonghutouxiang.jpg" alt>
              </div>
              <dt class="l_xmk">
                <dl>邱浩</dl>
              </dt>

              <div class="l_clearfixed">
                <p>家里终于收拾好了 年前和夫人去逛街 看到了软糖沙发 一见倾心就买了 沙发质地很好坐着也舒服 空间利用的很极致 适合户型不大的精致空间</p>

                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
              </div>

              <div class="l_jxsdk"></div>
            </li>

            <li>
              <div class="l_yhtxk">
                <img src="../../assets/images/yonghutouxiang.jpg" alt>
              </div>
              <dt class="l_xmk">
                <dl>邱浩</dl>
              </dt>

              <div class="l_clearfixed">
                <p>家里终于收拾好了 年前和夫人去逛街 看到了软糖沙发 一见倾心就买了 沙发质地很好坐着也舒服 空间利用的很极致 适合户型不大的精致空间</p>

                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
                <a class="l_qpalzm">
                  <img src="../../assets/images/yonghupingjiatupian.jpg" alt>
                </a>
              </div>

              <div class="l_jxsdk"></div>
            </li>
          </ul>

          <div class="l_ckgdsd">查看更多晒单</div>
        </div>

        <div class="l_cjwtk l_saidanxxk">
          <ul>
            <li>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/tiwenzhetouxiang.png" alt>
                </div>
                <p>什么地区可以配送到家？安装有区域范围吗？</p>
              </div>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/huidazhetouxiang.png" alt>
                </div>
                <p>亲爱的用户您好，省会及地级市城区配送到家，除I款为拆装结构，其他款型均为整装无需安装，全国28省210个城市666个主城区，免费提供送货安装服务（详情请咨询造作客服：400-6636-926）</p>
              </div>
            </li>

            <li>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/tiwenzhetouxiang.png" alt>
                </div>
                <p>什么地区可以配送到家？安装有区域范围吗？</p>
              </div>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/huidazhetouxiang.png" alt>
                </div>
                <p>亲爱的用户您好，省会及地级市城区配送到家，除I款为拆装结构，其他款型均为整装无需安装，全国28省210个城市666个主城区，免费提供送货安装服务（详情请咨询造作客服：400-6636-926）</p>
              </div>
            </li>

            <li>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/tiwenzhetouxiang.png" alt>
                </div>
                <p>什么地区可以配送到家？安装有区域范围吗？</p>
              </div>
              <div class="l_twztxk">
                <div class="l_tx">
                  <img src="../../assets/images/huidazhetouxiang.png" alt>
                </div>
                <p>亲爱的用户您好，省会及地级市城区配送到家，除I款为拆装结构，其他款型均为整装无需安装，全国28省210个城市666个主城区，免费提供送货安装服务（详情请咨询造作客服：400-6636-926）</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- 晒单图片 -->
    <div class="mybox">
      <div class="photo_area">
        <div class="l">
          <a href="#">
            <img src="../../assets/images/pshow_05.jpg" id="go_per" title="1" style="display:none;">
          </a>
        </div>
        <div class="m">
          <div id="p_1" style="display:block;">
            <a href="#">
              <img src="../../assets/images/yonghupingjiatupian.jpg">
            </a>
          </div>
          <div id="p_2">
            <a href="#">
              <img src="../../assets/images/tcctpzs.jpg">
            </a>
          </div>
          <div id="p_3">
            <a href="#">
              <img src="../../assets/images/tcctpzs.jpg">
            </a>
          </div>
          <div id="p_4">
            <a href="#">
              <img src="../../assets/images/yonghupingjiatupian.jpg">
            </a>
          </div>
          <div id="p_5">
            <a href="#">
              <img src="../../assets/images/tcctpzs.jpg">
            </a>
          </div>
          <div id="p_6">
            <a href="#">
              <img src="../../assets/images/yonghupingjiatupian.jpg">
            </a>
          </div>
          <div id="p_7">
            <a href="#">
              <img src="../../assets/images/tcctpzs.jpg">
            </a>
          </div>
          <div id="p_8">
            <a href="#">
              <img src="../../assets/images/yonghupingjiatupian.jpg">
            </a>
          </div>
        </div>
        <div class="r">
          <a href="#">
            <img src="../../assets/images/pshow_03.jpg" id="go_nex" title="2">
          </a>
        </div>
      </div>

      <div class="photo_ctrl clear">
        <div class="m" id="m_area">
          <ul>
            <li class="photo_border1 photo_border2" id="l_1">
              <a href="#" id="_1" name="1">
                <span class="nomask">&nbsp;</span>
                <img src="../../assets/images/yonghupingjiatupian.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_2">
              <a href="#" id="_2" name="2">
                <span>&nbsp;</span>
                <img src="../../assets/images/tcctpzs.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_3">
              <a href="#" id="_3" name="3">
                <span>&nbsp;</span>
                <img src="../../assets/images/tcctpzs.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_4">
              <a href="#" id="_4" name="4">
                <span>&nbsp;</span>
                <img src="../../assets/images/yonghupingjiatupian.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_5">
              <a href="#" id="_5" name="5">
                <span>&nbsp;</span>
                <img src="../../assets/images/tcctpzs.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_6">
              <a href="#" id="_6" name="6">
                <span>&nbsp;</span>
                <img src="../../assets/images/yonghupingjiatupian.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_7">
              <a href="#" id="_7" name="7">
                <span>&nbsp;</span>
                <img src="../../assets/images/tcctpzs.jpg">
              </a>
            </li>
            <li class="photo_border1" id="l_8">
              <a href="#" id="_8" name="8">
                <span>&nbsp;</span>
                <img src="../../assets/images/yonghupingjiatupian.jpg">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import qs from "qs";
export default {
  data() {
    return {
      obj: { goods: {}, attrs: {} }
    };
  },
  computed: {
    isDiscount() {
       if (this.account) {
          return {
            "text-decoration": "line-through",
            color: "rgb(158,152,152)",
            "font-size": "18px"
          }
       }
    }
  },
  methods: {
    getPath() {
      let url = location.href.split("//")[1];
      let len = url.indexOf("/");
      let path = url.substring(len);
      return path.indexOf("?") !== -1 ? path.split("?")[0] : path;
    },
    getID() {
      return this.getPath().substring(
        this.getPath().indexOf("/") + 1,
        this.getPath().indexOf("/show.html")
      );
    },
    active(attrIndex, cateIndex) {
      let num = 0,
        arr = [];
      this.obj.attrs[attrIndex].value.forEach(val => {
        val.select = 0;
      });
      this.obj.attrs[attrIndex].value[cateIndex].select = 1;
      this.obj.attrs.forEach(attrVal => {
        attrVal.value.forEach(val => {
          if (val.select) {
            arr.push(val.value);
            num++;
          }
        });
      });
      let param = { id: this.getID(), value: arr };
      if (num === this.obj.attrs.length) {
        this.ajax("/shopping/attr", param).then(data => {
          if (!data.code) {
              alert(data.msg);
            } else {
              this.obj.goods.price = data.money.price;
              this.obj.goods.vn_price = data.money.vip_price;
            }
        });
      }
    }
  },
  created() {
    // api
    this.ajax("/shopping/show", this.getID()).then(data => {
      this.obj = data;
      console.log(data);
      document.title = `宁茜商城_${data.goods.name}`;
    });
  },
  mounted() {
    //   详情开关
    var ck = document.getElementsByClassName("l_chakanxq")[0];
    var sq = document.getElementsByClassName("l_sqan")[0];
    var jsk = document.getElementsByClassName("l_biaogek")[0];

    var x = 0;
    ck.onclick = function() {
      x += 1;
      if (x % 2 == 1) {
        jsk.style.display = "block";
        ck.innerHTML = "关闭详情";
      } else {
        jsk.style.display = "none";
        ck.innerHTML = "查看详情";
      }
    };
    sq.onclick = function() {
      jsk.style.display = "none";
    };
    // end

    // 1.js

    var sdf = document.querySelectorAll(".l_qpalzm");
    var box = document.getElementsByClassName("mybox")[0];
    var yhtcc = document.getElementsByClassName("l_yhzstp")[0];

    var yyll = new Array();

    for (var i = 0; i < sdf.length; i++) {
      yyll[i] = sdf[i];
      yyll[i].onclick = function() {
        yhtcc.style.display = "block";
        box.style.display = "block";
      };
    }
    // return;
    yhtcc.onclick = () => {
      yhtcc.style.display = "none";
      box.style.display = "none";
    };

    var xx = document.querySelectorAll(".saidanxx");

    var xxk = document.querySelectorAll(".l_saidanxxk");

    for (var i = 0; i < xx.length; i++) {
      xx[i].index = i;
      xx[i].onclick = function() {
        for (var i = 0; i < xx.length; i++) {
          xx[i].className = "";
          xxk[i].style.display = "none";
        }
        this.className = "lyly";
        xxk[this.index].style.display = "block";
      };
      for (var m = 1; m < xx.length; m++) {
        xx[m].className = "";
        xxk[m].style.display = "none";
      }
    }

    var li = document.querySelectorAll(".l_spxxk .l_xxlb li");
    var img = document.querySelectorAll(".l_xxktp .l_tab");

    for (var i = 0; i < li.length; i++) {
      li[i].index = i;
      li[i].onclick = function() {
        for (var i = 0; i < li.length; i++) {
          li[i].className = "";
          img[i].style.display = "none";
        }
        this.className = "act";

        img[this.index].style.display = "block";
      };
      for (var m = 1; m < li.length; m++) {
        li[m].className = "";
        img[m].style.display = "none";
      }
    }

    // end

    // script.js
    var clicknow = 0;
    var photonum = 8;
    var maxphoto = 14;
    var headid = 1;
    var endid = 15;
    var movel = 0;
    var mover = 0;

    function initPhoto(n) {
      if (n == 1) {
        $(".photo_area .r").fadeOut(0);
        $(".photo_area .l").fadeOut(0);
      }
      if (n < 14) {
        w = n * 60;
        mgl = (1002 - w) / 2;
        $("#m_area").css({
          width: w + "px",
          "margin-left": mgl + "px",
          overflow: "hidden",
          float: "left",
          display: "inline"
        });
        $("#m_area ul").css({
          width: w + "px",
          margin: "0 auto"
        });
      } else {
        w = maxphoto * 60;
        wall = n * 60;
        $(".photo_ctrl .m").css({
          width: w + "px",
          margin: "0 auto",
          overflow: "hidden",
          "margin-left": "50px",
          display: "inline"
        });
        $(".photo_ctrl .m ul").css({
          width: wall + "px",
          margin: "0 auto"
        });
        for (i = maxphoto + 1; i <= n; i++) {
          $("#_" + i + " span").css({
            display: "none"
          });
        }
      }
      if (n > 14) {
        $(".photo_ctrl .r").css({
          display: "block"
        });
        $(".photo_ctrl .l").css({
          display: "block"
        });
      }
    }

    $(document).ready(function() {
      $(".photo_ctrl.clear ul li a").each(function() {
        $(this).click(function() {
          var idname = $(this).attr("id");
          clicknow = idname;
          var idl = $(this).attr("name") - 1;
          if (idl == 0) {
            $("#go_per").fadeOut(0);
          } else {
            $("#go_per").fadeIn(0);
          }
          var idr = parseInt($(this).attr("name")) + 1;
          if (idr == photonum + 1) {
            $("#go_nex").fadeOut(0);
          } else {
            $("#go_nex").fadeIn(0);
          }
          $("#go_per").attr("title", idl);
          $("#go_nex").attr("title", idr);
          for (i = 1; i <= photonum; i++) {
            $("#p_" + i).fadeOut(0);
            $("#_" + i + " " + "span").removeClass("nomask");
            $("#l_" + i).removeClass("photo_border2");
          }
          $("#p" + idname).fadeIn(300);
          $("#" + idname + " " + "span").addClass("nomask");
          $("#l" + idname).addClass("photo_border2");
        });
      });

      //向前
      $("#go_per").click(function(e) {
        var goid = parseInt($(this).attr("title"));
        var idl = goid - 1;
        clicknow = "_" + goid;
        if (idl == 0) {
          $("#go_per").fadeOut(0);
        } else {
          $("#go_per").fadeIn(0);
        }
        var idr = goid + 1; //给箭头赋值右
        if (idr == photonum + 1) {
          $("#go_nex").fadeOut(0);
        } else {
          $("#go_nex").fadeIn(0);
        }
        $("#go_per").attr("title", idl);
        $("#go_nex").attr("title", idr);
        for (i = 1; i <= photonum; i++) {
          $("#p_" + i).fadeOut(0);
          $("#_" + i + " " + "span").removeClass("nomask");
          $("#l_" + i).removeClass("photo_border2");
        }
        $("#p_" + goid).fadeIn(300);
        $("#_" + goid + " " + "span").addClass("nomask");
        $("#l_" + goid).addClass("photo_border2");
      });

      $("#go_nex").click(function(e) {
        var goid = parseInt($(this).attr("title"));
        clicknow = "_" + goid;
        var idl = goid - 1; //给箭头赋值左
        if (idl == 0) {
          $("#go_per").fadeOut(0);
        } else {
          $("#go_per").fadeIn(0);
        }

        var idr = goid + 1; //给箭头赋值右

        if (idr == photonum + 1) {
          $("#go_nex").fadeOut(0);
        } else {
          $("#go_nex").fadeIn(0);
        }

        $("#go_per").attr("title", idl);
        $("#go_nex").attr("title", idr);

        for (i = 1; i <= photonum; i++) {
          $("#p_" + i).fadeOut(0);
          $("#_" + i + " " + "span").removeClass("nomask");
          $("#l_" + i).removeClass("photo_border2");
        }
        $("#p_" + goid).fadeIn(300);
        $("#_" + goid + " " + "span").addClass("nomask");
        $("#l_" + goid).addClass("photo_border2");
      });

      $(".photo_ctrl.clear ul li a").each(function() {
        $(this).mouseover(function() {
          var idname = $(this).attr("id");
          for (i = 1; i <= photonum; i++) {
            $("#_" + i + " " + "span").removeClass("nomask");
            $("#l_" + i).removeClass("photo_border2");
          }
          $("#" + idname + " " + "span").addClass("nomask");
          $("#l" + idname).addClass("photo_border2");
        });
      });

      $(".photo_ctrl.clear ul li a").each(function() {
        $(this).mouseout(function() {
          var idname = $(this).attr("id");
          for (i = 1; i <= photonum; i++) {
            $("#_" + i + " " + "span").removeClass("nomask");
            $("#l_" + i).removeClass("photo_border2");
          }
          $("#" + clicknow + " " + "span").addClass("nomask");
          $("#l" + clicknow).addClass("photo_border2");
        });
      });

      $("#ctrl_l").click(function(e) {
        headid = $(this).attr("name");
        endid = parseInt($("#ctrl_r").attr("name")) + 1;
        if (endid < photonum + 1) {
          movel = movel + 1;
          mover = 0;
          mg = movel * 60;
          $(".photo_ctrl .m ul").css({
            "margin-left": "-" + mg + "px"
          });
          $("#_" + headid + " span").css({
            display: "none"
          });
          $("#_" + endid + " span").css({
            display: "block"
          });
          headid = parseInt(headid) + 1;
          endid = parseInt(endid);
          $("#ctrl_l").attr("name", headid);
          $("#ctrl_r").attr("name", endid);
          $("#ctrl_r").css({
            display: "block"
          });
        } else if (endid == photonum + 1) {
          $("#ctrl_l").css({
            display: "none"
          });
        }
      });

      $("#ctrl_r").click(function(e) {
        headid = $("#ctrl_l").attr("name");
        endid = parseInt($("#ctrl_r").attr("name"));
        if (headid > 1) {
          mover = mover + 1;
          movel = 0;
          mg = (headid - 2) * 60;
          headid = parseInt(headid) - 1;
          $(".photo_ctrl .m ul").css({
            "margin-left": "-" + mg + "px"
          });
          $("#_" + endid + " span").css({
            display: "none"
          });
          $("#_" + headid + " span").css({
            display: "block"
          });
          endid = parseInt(endid) - 1;
          $("#ctrl_l").attr("name", headid);
          $("#ctrl_r").attr("name", endid);
          $("#ctrl_l").css({
            display: "block"
          });
        } else if (headid == 1) {
          $("#ctrl_r").css({
            display: "none"
          });
        }
      });
    });
    // end

    // 2.js

    var wxtcc = document.getElementsByClassName("l_wxtcc")[0];
    var ly = document.querySelectorAll(".l_ly");
    var omu = document.getElementsByClassName("l_zzmxtcc")[0];
    var gb = document.getElementsByClassName("l_guanbi")[0];

    for (let i = 0; i < ly.length; i++) {
      ly[i].addEventListener("click", () => {
        wxtcc.style.display = "block";
        omu.style.display = "block";
      });
    }

    wxtcc.onclick = function() {
      omu.style.display = "none";
      wxtcc.style.display = "none";
    };

    gb.onclick = function() {
      wxtcc.style.display = "none";
      omu.style.display = "none";
    };
    // end
  }
};
</script>

<style scoped>
@import url(../../assets/css/ny.css);
</style>


