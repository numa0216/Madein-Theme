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
      if ((secLastOffset - winHeight) < 0) {
        this.height = winHeight - elOffset + (secLastOffset - winHeight);
      } else if(winHeight > elOffset) {
        this.height = winHeight - elOffset;
      } else {
        this.height = 3;
      }
    },
  },
});

gsap.to(".bubble", {
  opacity: 1,
  duration: "random([1,2,3])",
  delay: 1,
  scale: "random([1, 1.25, 1.5, 1.75, 2])",
  y: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
  x: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
});
