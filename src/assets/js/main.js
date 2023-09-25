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
        opacity: 1, //←コンマを忘れないように
        duration: 3,
        delay: 2,
      });
    }
  };
  webStorage();
});

gsap.to(".bubble", {
  opacity: 1,
  duration: "random([1,2,3])",
  delay: 1,
  scale: "random([1, 1.25, 1.5, 1.75, 2])",
  y: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
  x: "random([-20, -30, -50, -80, -90, 0, 20, 30, 50, 80, 90])",
});
