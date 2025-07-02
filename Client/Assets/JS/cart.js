function addToCart(productId) {
  fetch("../Server/Process/add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productId,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);

      // Swal.fire({
      //   position: "top-center",
      //   icon: "success",
      //   title: "Product Added!",
      //   showConfirmButton: false,
      //   timer: 1500,
      //   customClass: {
      //     popup: "swal2-small-toast",
      //   },
      //   showClass: {
      //     popup: "animate__animated animate__fadeInDown",
      //   },
      //   hideClass: {
      //     popup: "animate__animated animate__fadeOutUp",
      //   },
      // });
    })
    .catch((error) => console.error("Error:", error));
}
function buynow(productId) {
  fetch("../Server/Process/add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productId + "&buynow=1",
  })
    .then((response) => response.text())
    .then(() => {
      window.location.href = "../Client/checkout.php";
    });
}
function removeCart(productid) {
  fetch("../Server/Process/delete-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=" + productid,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        document.querySelector(`.bag-item[data-id="${productid}"]`)?.remove();

        if (data.cart_count === 0) {
          document.getElementById("bag-sec").innerHTML = `
      <h1 class="text-center">Your Cart is Empty!</h1>
    `;
        }

        document.querySelectorAll(".cart-count").forEach((element) => {
          element.innerText = data.cart_count;
        });

        document.querySelectorAll(".cart-subtotal").forEach((element) => {
          element.innerText = "£" + data.subtotal;
        });



      }
    });
}


function checkCartBeforePay() {
  fetch("../Server/Process/check-cart.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "./Payment.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: data.message,
        });
      }
    });
}

function checkCartBeforeCheckout() {
  fetch("../Server/Process/checkout-check.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productid=123",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = `./checkout.php?${data.productId}`;
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: data.message,
        });
      }
    })
    .catch((error) => {
      console.error("Fetch error:", error);
    });
}
