const TL = gsap.timeline();

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
      ".works__text",
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
      ".yaji",
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
      ".company__img,.company__logo",
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
