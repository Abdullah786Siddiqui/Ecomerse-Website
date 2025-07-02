let selectedOrderId = null;
let selectedStatus = null;

function updateStatus(orderid, status) {

  selectedOrderId = orderid;
  selectedStatus = status;

  document.querySelector(".modalOrderId").innerText = orderid;
  document.querySelector(".currentstatus").innerText = selectedStatus;
}

function submitStatusUpdate() {
  if (selectedOrderId && selectedStatus) {
    fetch("../Process/order-tracking.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `orderid=${selectedOrderId}&orderstatus=${selectedStatus}`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          console.log(data.nextstate);

          closeModalAndCleanup();

          // Success Alert
          Swal.fire({
            icon: "success",
            title: "Status Updated!",
            text: "Order status updated successfully.",
          });

          // Optionally page reload
          location.reload();
        } else {
      Swal.fire({
  icon: "error",
  title: "<span class='text-danger fw-bold fs-5'>Action Failed!</span>",
  html: `<div class="text-muted fs-6">${data.error}</div>`,
  toast: true,
  position: "center",
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  background: "#fff",
  customClass: {
    popup: "rounded-4 shadow-lg p-3 border border-danger-subtle",
    title: "mb-2",
    htmlContainer: "text-center",
  },
  showClass: {
    popup: "animate__animated animate__fadeInDown",
  },
  hideClass: {
    popup: "animate__animated animate__fadeOutUp",
  }
});



          closeModalAndCleanup();
        }
      });
  }
}

function handleCancel() {
  Swal.fire({
    title: "Cancelled!",
    text: "Order State Updation has been Canceled",
    icon: "error", // Red error icon
    toast: true,
    position: "top",
    showConfirmButton: false,
    timer: 1500, // Closes after 1.5 sec
    customClass: {
      popup:
        "rounded-3 shadow-sm p-2 bg-white text-danger text-center small-toast",
      title: "fs-6 fw-bold text-danger mb-1", // Title small, red and bold
      content: "fs-6 text-danger", // Text small and red
    },
    showClass: {
      popup: "animate__animated animate__fadeInDown",
    },
    hideClass: {
      popup: "animate__animated animate__fadeOutUp",
    },
    didOpen: () => {
      const popup = document.querySelector(".swal2-popup");
      popup.style.left = "50%";
      popup.style.transform = "translateX(-50%)";
    },
  });
}

function closeModalAndCleanup() {
  let modalElement = document.getElementById("updateStatusModal");
  let modal = bootstrap.Modal.getInstance(modalElement);
  if (modal) {
    modal.hide();
  }

  // Remove leftover backdrop
  document.querySelectorAll(".modal-backdrop").forEach((el) => el.remove());
  document.body.classList.remove("modal-open");
  document.body.style = "";
}
