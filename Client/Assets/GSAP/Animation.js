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
      y: 40,
      opacity: 0,
      scale: 0.95,
      filter: "blur(6px)",
      duration: 0.8,
      ease: "power2.out",
    },
    "-=0.4"
  )

  .from(
    ".navbar1",
    {
      opacity: 0,
      y: 40,
      scaleY: 0.96,
      filter: "blur(6px)",
      transformOrigin: "top center",
      duration: 0.8,
      ease: "power2.out",
    },
    "-=0.3"
  )

  .from(
    ".navbar1 a",
    {
      y: 30,
      opacity: 0,
      filter: "blur(4px)",
      stagger: 0.1,
      duration: 0.7,
      ease: "power3.out",
    },
    "-=0.4"
  )

  .to(
    ["#logo", "#icons", "#search", ".navbar1", ".navbar1 a"],
    {
      filter: "blur(0px)",
      duration: 0.3,
    },
    "-=0.3"
  );


   gsap.from(".img_group img", {
    y: 80,
    scale: 0.7,
    opacity: 0,
    filter: "blur(10px)",
    stagger: 0.2,
    duration: 1.2,
    ease: "power3.out"
  });

  // Animate text group after images
  gsap.to(".text_group", {
    opacity: 1,
    y: -30,
    duration: 1.2,
    ease: "power2.out",
    delay: 1
  });


   gsap.from("#proCarousel", {
  opacity: 0,        // fade from transparent
  x: -300,           // slide in from the left
  duration: 1.2,
  ease: "power2.out",
  delay: 0.5          // optional delay
});



// const carouselElement = document.querySelector('#proCarousel .carousel-inner');
// const slideCount = carouselElement.children.length;
// let currentIndex = 0;

// setInterval(() => {
//   const nextIndex = (currentIndex + 1) % slideCount;

//   // GSAP slide animation
//   gsap.to(carouselElement, {
//     x: `-${nextIndex * 100}%`,
//     duration: 0.8,
//     ease: "power2.inOut"
//   });

//   currentIndex = nextIndex;
// }, 5000);

