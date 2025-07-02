// Get all form containers
const cardDiv = document.querySelector(".card-form");
const netBankingDiv = document.querySelector(".netbanking-form");
const walletDiv = document.querySelector(".wallet-form");
const codDiv = document.querySelector(".cod-form");

// Get all payment method option cards
const cardOption = document.querySelector(".card-option");
const netBankingOption = document.querySelector(".netbanking-option");
const walletOption = document.querySelector(".wallet-option");
const codOption = document.querySelector(".cod-option");

// Hide all payment forms
function hidden() {
  cardDiv.classList.add("d-none");
  netBankingDiv.classList.add("d-none");
  walletDiv.classList.add("d-none");
  codDiv.classList.add("d-none");
}

// Payment Method Click Events
cardOption.addEventListener("click", function () {
  hidden();
  cardDiv.classList.remove("d-none");
});

netBankingOption.addEventListener("click", function () {
  hidden();
  netBankingDiv.classList.remove("d-none");
});

walletOption.addEventListener("click", function () {
  hidden();
  walletDiv.classList.remove("d-none");
});

codOption.addEventListener("click", function () {
  hidden();
  codDiv.classList.remove("d-none");
});

// CARD PAYMENT VALIDATION
document
  .getElementById("payment_card")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    let hasError = false;
    let cardNumber = document.getElementById("cardNumber");
    let cardExpiry = document.getElementById("cardExpiry");
    let cardCVC = document.getElementById("cardCVC");
    let cardName = document.getElementById("cardName");

    if (cardNumber.value.trim() === "") {
      cardNumber.nextElementSibling.innerText = "Please enter card number";
      hasError = true;
    }
    if (cardExpiry.value.trim() === "") {
      cardExpiry.nextElementSibling.innerText = "Please enter expiry date";
      hasError = true;
    }
    if (cardCVC.value.trim() === "") {
      cardCVC.nextElementSibling.innerText = "Please enter CVV";
      hasError = true;
    }
    if (cardName.value.trim() === "") {
      cardName.nextElementSibling.innerText = "Please enter name on card";
      hasError = true;
    }

    if (!hasError) placeOrder("Card");
  });

//  NETBANKING VALIDATION
document
  .getElementById("payment_netbanking")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    let hasError = false;
    let bankName = document.getElementById("bankName");
    let accountNumber = document.getElementById("accountNumber");

    if (bankName.value.trim() === "" || bankName.value === "Choose Bank...") {
      bankName.nextElementSibling.innerText = "Please select your Bank";
      hasError = true;
    }
    if (accountNumber.value.trim() === "") {
      accountNumber.nextElementSibling.innerText =
        "Please enter Account Number";
      hasError = true;
    }

    if (!hasError) placeOrder("NETBANKING");
  });

//  WALLET VALIDATION
document
  .getElementById("payment_wallet")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    let hasError = false;
    let upiId = document.getElementById("upiId");
    let walletProvider = document.getElementById("walletProvider");

    if (upiId.value.trim() === "") {
      upiId.nextElementSibling.innerText =
        "Please enter UPI ID or Easypaisa Number";
      hasError = true;
    }
    if (
      walletProvider.value.trim() === "" ||
      walletProvider.value === "Choose Provider..."
    ) {
      walletProvider.nextElementSibling.innerText =
        "Please select a Wallet Provider";
      hasError = true;
    }

    if (!hasError)  placeOrder("UPI");
  });

// ---------- CASH ON DELIVERY VALIDATION ----------
document.getElementById("payment_cod").addEventListener("click", function (e) {
  e.preventDefault();

  placeOrder("Cash");
});

function placeOrder(paymentMethod) {
  fetch("../Server/Process/order-process.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `payment_method=${encodeURIComponent(paymentMethod)}`,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        Swal.fire({
          title: `
            <div style="display:flex; align-items:center; gap:6px; color:#28a745; font-size:15px; margin:0;">
              <i class="fas fa-check-circle"></i>
              <span>${data.message}</span>
            </div>
          `,
          icon: "success",
          iconColor: "#28a745",
          background: "#f9fefb",
          color: "#155724",
          showConfirmButton: false,
          timer: 1500,
          width: 260,
          padding: "0.5em",
          customClass: {
            popup: "super-compact-popup",
          },
        }).then(() => {
          window.location.href = "../Client/Profile.php";
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Order Failed",
          text: data.message,
        });
      }
    })
    .catch((error) => {
      Swal.fire({
        icon: "error",
        title: "Server Error",
        text: "Something went wrong: " + error,
      });
    });
}
