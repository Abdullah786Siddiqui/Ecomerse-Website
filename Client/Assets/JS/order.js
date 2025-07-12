function orderCancel(orderid) {
  // Confirm before cancel
  Swal.fire({
    title: "Are you sure?",
    text: "Do you really want to cancel this order?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, cancel it!",
    cancelButtonText: "No, keep it",
  }).then((result) => {
    if (result.isConfirmed) {
      // Proceed with cancel
      fetch("../Server/Process/order-cancel.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "order_id=" + orderid,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            Swal.fire({
              title: "Cancelled!",
              text: data.message,
              icon: "success",
              timer: 2000,
              showConfirmButton: false,
            }).then(() => {
              // Optionally reload or update the order list
              location.reload(); // or update UI without reload
            });
          } else {
            Swal.fire({
              title: "Error",
              text: data.message,
              icon: "error",
              confirmButtonText: "OK",
            });
          }
        })
        .catch((error) => {
          Swal.fire({
            title: "Error",
            text: "Something went wrong!",
            icon: "error",
          });

          console.error(error);
        });
    }
  });
}

function RemoveOrder(orderid) {
  fetch("../Server/Process/remove-order.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "order_id=" + orderid,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        document.querySelector(`.order-remove[data-id="${orderid}"]`)?.remove();
        Swal.fire({
          title: "Removed!",
          text: data.message,
          icon: "success",
          timer: 2000,
          showConfirmButton: false,
        }).then(() => {
          // Optionally reload or update the order list
          location.reload(); // or update UI without reload
        });
      } else {
        Swal.fire({
          title: "Error",
          text: data.message,
          icon: "error",
          confirmButtonText: "OK",
        });
      }
    });
}
