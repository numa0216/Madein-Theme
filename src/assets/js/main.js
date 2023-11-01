const modal = new Vue({
  el: "#modalMenu",
  data: {
    show: false,
  },
});

$(function () {
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

const scroll2 = new Vue({
  el: "#lineBlock",
  data() {
    return {
      height: 3,
    };
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  methods: {
    handleScroll() {
      const winHeight = window.outerHeight / 2;
      const elOffset = this.$refs.border.getBoundingClientRect().top;
      const secLastOffset = this.$refs.secLast.getBoundingClientRect().bottom;
      if (secLastOffset - winHeight < 0) {
        this.height = winHeight - elOffset + (secLastOffset - winHeight);
      } else if (winHeight > elOffset) {
        this.height = winHeight - elOffset;
      } else {
        this.height = 3;
      }
    },
  },
});

const text = new SplitType(".container__subtitle");
const TL = gsap.timeline();
TL.fromTo(
  ".container", //アニメーションしたい要素
  {
    //アニメーション前の記入
    y: 50, //アニメーション開始前の位置
    autoAlpha: 0, //アニメーション開始前の状態
  },
  {
    //アニメーション後の記入
    y: 0, //アニメーション後の位置
    delay: 0.3 /*アニメーションのスタートまでの遅延時間*/,
    autoAlpha: 1, //アニメーション後の状態
    duration: 1 /*アニメーションの時間*/,
    ease: "power1.out",
  }
).fromTo(
  ".char",
  {
    y: 30 /*テキストのY軸の操作*/,
    autoAlpha: 0, //アニメーション開始前の状態
  },
  {
    y: 0 /*テキストのY軸の操作*/,
    autoAlpha: 1, //アニメーション後の状態
    stagger: 0.05 /*テキスト間の遅延時間*/,
    // delay: 0.5 /*アニメーションのスタートまでの遅延時間*/,
    duration: 0.5 /*アニメーションの時間*/,
  }
);

gsap.fromTo(
  ".card",
  {
    y: 20, //アニメーション開始前の位置
    autoAlpha: 0, //アニメーション開始前の状態
  },
  {
    y: 0,
    autoAlpha: 1, //アニメーション後の状態
    scrollTrigger: {
      //xやyと同じ要領でプロパティにscrollTriggerと記述
      trigger: ".card", //トリガーとなる要素を設定
      start: "top center", //発火始め位置を設定
      // markers: true, //確認用の印をつける
    },
  }
);

// gsap.to(".bubble", {
//   opacity: 1,
//   duration: "random([1,2,3])",
//   delay: 1,
//   scale: "random([1, 1.25, 1.5, 1.75, 2])",
//   y: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
//   x: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
// });
