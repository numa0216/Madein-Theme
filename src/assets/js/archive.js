const TL = gsap.timeline();

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
        start: "top bottom", //アニメーションが始まる位置
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