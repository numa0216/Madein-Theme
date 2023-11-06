const TL = gsap.timeline();

const flow = document.getElementById("flow");
if(flow){
  const scroll = new Vue({
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
}

const sectionR = gsap.utils.toArray(".section.right");
sectionR.forEach((sec) => {
  gsap.fromTo(
    sec,
    {
      x: 50, //アニメーション開始前の位置
      opacity: 0, //アニメーション開始前の状態
    },
    {
      //アニメーション後の記入
      x: 0, //アニメーション後の位置
      delay: 0.3 /*アニメーションのスタートまでの遅延時間*/,
      opacity: 1, //アニメーション後の状態
      duration: 1.5 /*アニメーションの時間*/,
      ease: "power1.out",
      scrollTrigger: {
        trigger: sec, //アニメーションが始まるトリガーとなる要素
        start: "top-=200px center", //アニメーションが始まる位置
      },
    }
  );
});
const sectionL = gsap.utils.toArray(".section.left");
sectionL.forEach((sec) => {
  gsap.fromTo(
    sec,
    {
      x: -50, //アニメーション開始前の位置
      opacity: 0, //アニメーション開始前の状態
    },
    {
      //アニメーション後の記入
      x: 0, //アニメーション後の位置
      delay: 0.3 /*アニメーションのスタートまでの遅延時間*/,
      opacity: 1, //アニメーション後の状態
      duration: 1.5 /*アニメーションの時間*/,
      ease: "power1.out",
      scrollTrigger: {
        trigger: sec, //アニメーションが始まるトリガーとなる要素
        start: "top-=200px center", //アニメーションが始まる位置
      },
    }
  );
});
