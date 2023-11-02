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
  el: "#flow",
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
const text2 = new SplitType(".single__subtitle");
TL.fromTo(
  ".container,.single", //アニメーションしたい要素
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
    duration: 1.5 /*アニメーションの時間*/,
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
    stagger: 0.15 /*テキスト間の遅延時間*/,
    // delay: 0.5 /*アニメーションのスタートまでの遅延時間*/,
    duration: 0.5 /*アニメーションの時間*/,
    ease: "power1.out",
  }
);

const cards = gsap.utils.toArray(".card");
cards.forEach((card) => {
  gsap.fromTo(
    card,
    {
      y: 40,
      autoAlpha: 0,
    },
    {
      y: 0,
      duration: 1.5 /*アニメーションの時間*/,
      autoAlpha: 1,
      ease: "power1.out",
      scrollTrigger: {
        trigger: card, //アニメーションが始まるトリガーとなる要素
        start: "top-=200px center", //アニメーションが始まる位置
      },
    }
  );
});

gsap.fromTo(
  ".sidebar", //アニメーションしたい要素
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
    duration: 1.5 /*アニメーションの時間*/,
    ease: "power1.out",
    scrollTrigger: {
      trigger: ".sidebar", //アニメーションが始まるトリガーとなる要素
      start: "top bottom", //アニメーションが始まる位置
    },
  }
);

const section = gsap.utils.toArray(".section");
section.forEach((sec) => {
  gsap.fromTo(
    sec,
    {
      y: 50, //アニメーション開始前の位置
      autoAlpha: 0, //アニメーション開始前の状態
    },
    {
      //アニメーション後の記入
      y: 0, //アニメーション後の位置
      delay: 0.3 /*アニメーションのスタートまでの遅延時間*/,
      autoAlpha: 1, //アニメーション後の状態
      duration: 1.5 /*アニメーションの時間*/,
      ease: "power1.out",
      scrollTrigger: {
        trigger: sec, //アニメーションが始まるトリガーとなる要素
        start: "top-=200px center", //アニメーションが始まる位置
      },
    }
  );
});

TL.fromTo(
  ".bubble",
  { opacity: 0, y: 20 },
  {
    // stagger: 0.05 /*テキスト間の遅延時間*/,
    stagger: { each: 0.15, from: "random" } /*テキスト間の遅延時間*/,
    opacity: 1,
    duration: "random([1,1.5])",
    ease: "power1.out",
    y: 0,
  }
)
  .fromTo(
    ".works__text,.yaji",
    {
      opacity: 0,
      y: 10,
    },
    {
      opacity: 1,
      y: 0,
      ease: "power1.out",
    }
  )
  .fromTo(
    ".company__img",
    {
      opacity: 0,
      y: 10,
    },
    {
      opacity: 1,
      y: 0,
      ease: "power1.out",
    }
  )
  .fromTo(
    ".company__text",
    {
      opacity: 0,
      y: 10,
    },
    {
      opacity: 1,
      y: 0,
      ease: "power1.out",
    }
  );
