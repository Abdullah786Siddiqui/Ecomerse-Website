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




const track = document.getElementById("track");
const carousel = document.getElementById("carousel");
const productItems = track.querySelectorAll(".product");
const productWidth = productItems[0].offsetWidth + 10; // 10px margin
const productCount = productItems.length;
let position = 0;
let interval;

function startScroll() {
  interval = setInterval(() => {
    position += productWidth;
    track.style.transition = 'transform 1.2s ease-in-out';
    track.style.transform = `translateX(-${position}px)`;

    if (position >= productWidth * productCount) {
      setTimeout(() => {
        track.style.transition = 'none';
        position = 0;
        track.style.transform = `translateX(0)`;
      }, 500);
    }
  }, 1000);
}

function stopScroll() {
  clearInterval(interval);
}

startScroll();
carousel.addEventListener('mouseenter', stopScroll);
carousel.addEventListener('mouseleave', startScroll);




  
