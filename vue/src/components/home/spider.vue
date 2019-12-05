<template>
  <div class="wrapper">
    <ul class="picBox">
      <li class="first">
        <img src="../../assets/images/luobo1.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo2.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo3.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo4.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo5.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo6.jpg" alt>
      </li>
      <li>
        <img src="../../assets/images/luobo7.jpg" alt>
      </li>
    </ul>

    <div class="list">
      <ul>
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "spider",
  mounted() {
    window.onload = function() {
      var op = document.body.scrollWidth;

      document.querySelector(".wrapper").style.width = `${op}px`;
      let li = document.querySelectorAll(".wrapper .picBox li");
      for (let i = 0; i < li.length; i++) {
        li[i].style.width = `${op}px`;
      }

      var len = document.querySelectorAll(".picBox li").length;

      var cc = document.querySelector(".first").offsetWidth;
      document.querySelector(".picBox").style.width = `${cc * len}px`;
    };

    var nowIndex = 0;

    var len = document.querySelectorAll(".picBox li").length;

    var timer;

    function init() {
      bindEvent();

      sliderAuto();
    }
    init();

    function bindEvent() {
      $(".list li").on("click", function() {
        var i = $(this).index();
        move(i);
      });

      $(".wrapper")
        .on("mouseenter", function() {
          clearTimeout(timer);
        })
        .on("mouseleave", function() {
          sliderAuto();
        });
    }
    function sliderAuto() {
      clearTimeout(timer);

      timer = setTimeout(function() {
        move("right");
      }, 2000);
    }

    function move(dir) {
      if (dir == "right" || dir == "left") {
        if (dir == "right") {
          nowIndex++;

          nowIndex = nowIndex > len - 1 ? 0 : nowIndex;

          sliderAuto();
        } else {
          nowIndex--;

          nowIndex = nowIndex < 0 ? len - 1 : nowIndex;
        }
      } else {
        nowIndex = dir;
      }

      var aa = $(".wrapper").width();
      // console.log(aa)
      $(".picBox").css({
        left: -nowIndex * aa + "px"
      });

      $(".picBox li")
        .eq(nowIndex)
        .animate(
          {
            opacity: 1
          },
          800
        );

      $(".picBox li")
        .not(nowIndex)
        .css("opacity", 0);
      changeStyle();
    }

    function changeStyle() {
      $(".active").removeClass("active");
      $(".list li")
        .eq(nowIndex)
        .addClass("active");
    }
  }
};
</script>

