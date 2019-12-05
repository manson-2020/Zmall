<template>

  <div class="login-bg">
    <div class="login-content">
      <ul class="login-tab">
        <li class="login-quick">
          <b>快捷登录</b>
        </li>
        <li class="login-password">
          <b>密码登录</b>
        </li>
      </ul>
      <div style="clear: both"></div>
      <ul class="login-form" id="quick">
        <li>
          <div class="login-input1">
            <input
              type="text"
              placeholder="请输入手机号"
              autocomplete="off"
              maxlength="11"
              id="input1"
              value
            >
          </div>
          <div class="login-input2 fl">
            <input type="text" autocomplete="off" maxlength="4" placeholder="请输入验证码" id="input2">
          </div>
          <button class="fl btn-y hq1">获取验证码</button>
          <div style="clear: both"></div>
          <div>
            <button class="btn-login dl1">登录</button>
          </div>
          <!-- <p class="weixin-login" href="">
                            微 信 登 录☛
          </p>-->
          <p class="register">
            还没有账号？
            <a class="run" href="javascript: void(0);">立&nbsp;即&nbsp;注&nbsp;册</a>
          </p>
        </li>
      </ul>

      <ul class="login-form" id="password" style="display: none">
        <li>
          <div class="login-input1">
            <input type="text" placeholder="手机号 / 邮箱" autocomplete="off" id="input3">
          </div>
          <div class="login-input3">
            <input type="password" placeholder="密码" autocomplete="off" maxlength="11" id="input4">
          </div>
          <div style="clear: both"></div>
          <div>
            <button class="btn-login dl2" id="btn">登录</button>
          </div>
          <p class="weixin-login1 fl" id="wechat-w">忘 记 密 码</p>
          <!-- <p class="weixin-login1 fr">微 信 登 录</p> -->
          <div style="clear: both"></div>
          <p class="register">
            还没有账号？
            <a class="run" href="javascript: void(0);">立&nbsp;即&nbsp;注&nbsp;册</a>
          </p>
        </li>
      </ul>
      <!--密码结束-->
      <ul class="login-form" id="register" style="display: none">
        <li>
          <div class="welcome">欢迎加入造作</div>
          <div class="login-input1">
            <input type="text" placeholder="请输入手机号" autocomplete="off" maxlength="11" id="input5">
          </div>
          <div class="login-input2 fl">
            <input type="text" autocomplete="off" maxlength="4" placeholder="请输入验证码" id="input6">
          </div>
          <button class="fl btn-y hq2" id="yzm">获取验证码</button>
          <div style="clear: both"></div>
          <div>
            <button class="btn-login zc1">注册</button>
          </div>
          <p class="weixin-login go">返 回 登 录</p>
          <p class="register1">
            注册代表你已同意
            <a class="run" href="javascript: void(0);">《造作用户协议》</a>
          </p>
        </li>
      </ul>

      <!--注册结束-->

      <ul class="login-form" id="edit" style="display:none">
        <li>
          <div class="welcome">设置密码</div>
          <div class="login-input1">
            <input type="text" placeholder="请输入手机号" autocomplete="off" maxlength="11" id="input7">
          </div>
          <div class="login-input2 fl">
            <input type="text" autocomplete="off" maxlength="4" placeholder="请输入验证码" id="input8">
          </div>
          <button class="fl btn-y hq3">获取验证码</button>
          <div style="clear: both"></div>
          <div class="login-input3">
            <input type="password" placeholder="密码" autocomplete="off" maxlength="12" id="input9">
          </div>
          <div>
            <button class="btn-login queding">确定</button>
          </div>
          <p class="weixin-login go">返 回 登 录</p>
        </li>
      </ul>
      <!--修改密码-->
    </div>
  </div>
</template>

<script>
import Qs from 'qs';
export default {
  name: "login",
  mounted() {
    document.title = "登录";
    //   快捷登录验证码
    $(".verification").click(function() {
      axios({
        url: `${process.env.VUE_APP_API}/login`,
        method: "post",
        data: {
          tel: $("#input1").val()
        }
      }).then(data => {
        console.log(data);
        if (data.data.type == 1) {
          alert(data.data.msg);
        } else {
          alert(data.data.msg);
          $(".run").click();
        }
      });
    });

    // 快捷登录
    $(".dl1").click(function() {
      axios({
        url: `${process.env.VUE_APP_API}/login/logins`,
        method: "post",
        data: {
          tel: $("#input1").val(),
          code: $("#input2").val()
        }
      }).then(data => {
        if (data.data.type == 1) {
          alert(data.data.msg);
          location.href = "/";
        } else {
          alert(data.data.msg);
          location.reload();
        }
      });
    });
    // 密码登录
    $("#btn").click(function() {
      var text = $("#input3").val();
      var password = $("#input4").val();
      axios({
        url: `${process.env.VUE_APP_API}/login/passlogin`,
        method: "post",
        data: Qs.stringify({
          text: text,
          password: password
        })
      }).then(res => {
        if (res.data.code == 1) {
          sessionStorage.setItem('account', JSON.stringify(res.data));
          alert(res.data.msg);
          location.href = "/";
        } else {
          alert(res.data.msg);
          $("#input4").val("");
        }
      });
    });

    // 注册验证码
    $("#yzm").click(function() {
      var tel = $("#input5").val();
      if (tel) {
        axios({
          url: `${process.env.VUE_APP_API}/login/register`,
          method: "POST",
          data: {
            tel: tel
          }
        }).then(data => {
          if (data.type == 1) {
            alert(data.data.msg);
          } else {
            alert(data.data.msg);
            location.reload();
          }
        });
      } else {
        layer.msg("no", { icon: 5, time: 2000, shade: 0.1 });
        return false;
      }
    });

    // 注册
    $(".zc1").click(function() {
      axios({
        url: `${process.env.VUE_APP_API}/login/registers`,
        method: "post",
        data: {
          tel: $("#input5").val(),
          code: $("#input6").val()
        }
      }).then(data => {
        if (data.type == 1) {
          alert(`${data.data.msg},去登录`);
           $(".go").click();
        } else {
          alert(data.data.msg);
          location.reload();
        }
      });
    });
    // 忘记密码验证码
    $(".hq3").click(function() {
      axios({
        url: `${process.env.VUE_APP_API}/login/uppass`,
        method: "post",
        data: {
          tel: $("#input7").val()
        }
      }).then(data => {
        if (data.data.type == 1) {
          alert(data.data.msg);
        }
      });
    });

    // 修改密码
    $(".queding").click(function() {
      axios({
        url: `${process.env.VUE_APP_API}/login/uppwd`,
        method: "post",
        data: {
          tel: $("#input7").val(),
          code: $("#input8").val(),
          pwd: $("#input9").val()
        }
      }).then(data => {
        if (data.data.type == 1) {
          location.href = "/login";
        } else {
          alert(data.data.msg);
          location.reload();
        }
      });
    });

    // .js

    $("#input1").focus(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input1").blur(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input2").focus(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input2").blur(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input3").focus(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input3").blur(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input4").focus(function() {
      $(".login-input3").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input4").blur(function() {
      $(".login-input3").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input5").focus(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input5").blur(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input6").focus(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input6").blur(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input7").focus(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input7").blur(function() {
      $(".login-input1").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input8").focus(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input8").blur(function() {
      $(".login-input2").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $("#input9").focus(function() {
      $(".login-input3").css({
        borderBottom: "1px solid #000000"
      });
    });
    $("#input9").blur(function() {
      $(".login-input3").css({
        borderBottom: "1px solid #d2d2d2"
      });
    });
    $(".login-password").click(function() {
      $("#quick").css("display", "none");
      $("#password").css("display", "block");
      $(this).css("color", "#000");
      $(".login-quick").css("color", "#a0a0a0");
    });
    $(".login-quick").click(function() {
      $("#quick").css("display", "block");
      $("#password").css("display", "none");
      $(this).css("color", "#000");
      $(".login-password").css("color", "#a0a0a0");
    });
    $(".run").click(function() {
      document.title = "注册";
      $("#quick").css("display", "none");
      $("#password").css("display", "none");
      $(".login-tab").css("display", "none");
      $("#register").css("display", "block");
      $(this).css("color", "#000");
      $(".login-quick").css("color", "#a0a0a0");
    });
    $(".go").click(function() {
      document.title = "登录";
      $("#quick").css("display", "block");
      $("#password").css("display", "none");
      $(".login-tab").css("display", "block");
      $("#register").css("display", "none");
      $("#edit").css("display", "none");
      $(".login-quick").css("color", "#000");
      $(".login-password").css("color", "#a0a0a0");
    });
    $("#wechat-w").click(function() {
      $("#quick").css("display", "none");
      $("#password").css("display", "none");
      $(".login-tab").css("display", "none");
      $("#register").css("display", "none");
      $("#edit").css("display", "block");
    });

    //   function wap(){

    //         // $('.btn-y').css("background-Color",'black')
    //         console.log(1111)

    //   }

    $("#input1").on("input  propertychange", function() {
      // 　　　console.log($(this).val());
      if (/^1(3|4|5|7|8)\d{9}$/.test($("#input1").val())) {
        $(".hq1").css("backgroundColor", "black");
        $(".hq1").attr("class", " verification fl btn-y hq1");
        yz();

        $("#input2").on("input  propertychange", function() {
          // 　　　console.log($(this).val());
          if ($("#input2").val().length == 4) {
            $(".dl1").css("backgroundColor", "black");
          } else {
            $(".dl1").css("backgroundColor", "#D2D2D2");
          }
        });
      } else {
        $(".hq1").css("backgroundColor", "#D2D2D2");
        $(".dl1").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input3").on("input  propertychange", function() {
      if ($("#input3").val() != "" && $("#input4").val() != "") {
        $(".dl2").css("backgroundColor", "black");
      } else {
        $(".dl2").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input4").on("input  propertychange", function() {
      if ($("#input3").val() != "" && $("#input4").val() != "") {
        $(".dl2").css("backgroundColor", "black");
      } else {
        $(".dl2").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input5").on("input  propertychange", function() {
      // 　　　console.log($(this).val());
      if (/^1(3|4|5|7|8)\d{9}$/.test($("#input5").val())) {
        $(".hq2").css("backgroundColor", "black");
        yz();
      } else {
        $(".hq2").css("backgroundColor", "#D2D2D2");
        $(".zc1").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input6").on("input  propertychange", function() {
      // 　　　console.log($(this).val());
      if ($("#input5").val() != "" && $("#input6").val() != "") {
        $(".zc1").css("backgroundColor", "black");
      } else {
        $(".zc1").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input7").on("input  propertychange", function() {
      if (/^1(3|4|5|7|8)\d{9}$/.test($("#input7").val())) {
        $(".hq3").css("backgroundColor", "black");
        yz();
      } else {
        $(".hq3").css("backgroundColor", "#D2D2D2");
      }
    });

    $("#input9").on("input  propertychange", function() {
      if ($("#input9").val().length > 6) {
        $(".queding").css("backgroundColor", "black");
      } else {
        $(".queding").css("backgroundColor", "#D2D2D2");
      }
    });

    function yz() {
      var bt = document.querySelectorAll(".btn-y");
      var aa = new Array();
      for (var m = 0; m < bt.length; m++) {
        (function(i) {
          aa[i] = bt[i];

          aa[i].onclick = function() {
            // console.log(aa[i], i)
            aa[i].disabled = true; //当点击后倒计时时候不能点击此按钮
            var time = 60; //倒计时60秒
            var timer = setInterval(fun1, 1000); //设置定时器
            function fun1() {
              time--;
              if (time >= 0) {
                aa[i].innerHTML = time + "s后重新发送";
              } else {
                aa[i].innerHTML = "重新发送验证码";
                aa[i].disabled = false; //倒计时结束能够重新点击发送的按钮
                clearTimeout(timer); //清除定时器
                time = 60; //设置循环重新开始条件
              }
            }
          };
        })(m);
      }
    }
  }
};
</script>

<style scoped>
@import url(../../assets/css/login.css);
@import url(../../assets/css/toubu.css);
</style>

