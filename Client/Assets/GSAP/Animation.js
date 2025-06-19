const tl = gsap.timeline({
  defaults: { duration: 0.7, ease: "back.out(1.7)" },
});

tl.from("#logo", {
  x: -100,
  opacity: 0,
  scale: 0.8,
  filter: "blur(4px)",
})

  .from(
    "#icons",
    {
      x: 100,
      opacity: 0,
      skewX: 10,
      filter: "blur(4px)",
    },
    "-=0.5"
  )

  .from(
    "#search",
    {
      y: -100,
      opacity: 0,
      scaleY: 0.8,
      filter: "blur(6px)",
    },
    "-=0.4"
  )

  .to(
    ["#logo", "#icons", "#search"],
    {
      filter: "blur(0px)",
      duration: 0.3,
    },
    "-=0.4"
  );
