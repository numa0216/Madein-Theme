const TL = gsap.timeline();

const modal = new Vue({
  el: "#modalMenu",
  data: {
    show: false,
  },
  methods: {
    gsapOn() {
      TL.to("#menuBtnJs", {
        autoAlpha: 1, //アニメーション後の状態
      }).fromTo(
        "#menu-main-menu .menu-item",
        {
          autoAlpha: 0, //アニメーション後の状態
          x: 50,
        },
        {
          autoAlpha: 1, //アニメーション後の状態
          x: 0,
          stagger: 0.05 /*テキスト間の遅延時間*/,
        }
      );
    },
    gsapOff() {
      gsap.to("#menuBtnJs", {
        autoAlpha: 0, //アニメーション後の状態
      });
    },
  },
});

jQuery(function () {
  const webStorage = function () {
    if (sessionStorage.getItem("access")) {
      //2回目以降アクセス時の処理
      $("#welcome").hide();
    } else {
      //初回アクセス時の処理
      sessionStorage.setItem("access", 0);
      gsap.to("#mainLogo", {
        opacity: 1,
        duration: 3,
        delay: 2,
      });
    }
  };
  webStorage();
});
