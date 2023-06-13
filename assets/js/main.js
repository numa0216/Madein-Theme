// const app = new Vue({
//   el: "#app",
//   data: {
//     open: false,
//   },
// });

const button = document.getElementById("menuBtn");
button.addEventListener("click", (e) => {
  if (e.target.classList.contains("close")) {
    gsap.to("#menuBtnJs", {
      x: 100, //←コンマを忘れないように
    });
    e.target.classList.remove("close");
  } else {
    gsap.to("#menuBtnJs", {
      x: 0, //←コンマを忘れないように
    });
    e.target.classList.add("close");
  }
});
