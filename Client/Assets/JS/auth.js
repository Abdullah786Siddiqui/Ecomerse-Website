function checkauth() {
  if (isLoggedIn) {
    window.location.href = "./view-cart.php";
  } else {
    showLoginModal();
  }
}

function showLoginModal() {
  const modal = new bootstrap.Modal(document.getElementById("authModal"));
  modal.show();
}

function showSignup() {
  document.getElementById("authModalTitle").innerText = "Signup";
  document.getElementById("loginForm").classList.add("d-none");
  document.getElementById("signupForm").classList.remove("d-none");
}

function showLogin() {
  document.getElementById("authModalTitle").innerText = "Login";
  document.getElementById("signupForm").classList.add("d-none");
  document.getElementById("loginForm").classList.remove("d-none");
}

function showAuthModal(type) {
  const modal = new bootstrap.Modal(document.getElementById("authModal"));
  modal.show();
  if (type === "signup") {
    document.getElementById("authModalTitle").innerText = "Signup";
    document.getElementById("loginForm").classList.add("d-none");
    document.getElementById("signupForm").classList.remove("d-none");
  } else {
    document.getElementById("authModalTitle").innerText = "Login";
    document.getElementById("signupForm").classList.add("d-none");
    document.getElementById("loginForm").classList.remove("d-none");
  }
}
const form = document.getElementById("signupForm");
form.addEventListener("submit", function (e) {
  e.preventDefault();
  console.log("sigup function chala");

  const form = e.target;
  const formData = new FormData(form);

  fetch("../Server/Process/register-process.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((response) => {
      if (response.success) {
        document.getElementById("signup-section").classList.add("d-none");
        document.getElementById("otp-section").classList.remove("d-none");
      } else {
        alert(response.message || "Signup failed");
      }
    })
    .catch(() => {
      alert("Something went wrong. Try again.");
    });
});

// Verify OTP
document.getElementById("verifyOtpBtn").addEventListener("click", function () {
  const otp = document.querySelector('input[name="otp"]').value;

  fetch("../Server/Process/verify-otp.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `otp=${otp}`,
  })
    .then((res) => res.json())
    .then((response) => {
      if (response.success) {
        alert("Signup complete!");
        window.location.reload();
      } else {
        alert(response.message || "Invalid OTP");
      }
    })
    .catch(() => {
      alert("Something went wrong verifying OTP.");
    });
});
