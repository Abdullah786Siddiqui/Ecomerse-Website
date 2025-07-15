
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("togglesidebar").addEventListener("click", function() {
      const sidebar = document.getElementById('sidebar1');
      sidebar.classList.toggle('show');

    })
    document.getElementById('editbtn').addEventListener("click", function() {
      document.getElementById('user_information').classList.add('d-none');
      document.getElementById('user_information_edit').classList.remove('d-none');
      document.getElementById('editbtn').classList.add('d-none');

    })


    function cancelEdit() {
      document.getElementById('user_information_edit').classList.add('d-none');
      document.getElementById('user_information').classList.remove('d-none');
    }

    const form = document.getElementById('profile_form');
    form.addEventListener('submit', function(e) {
      e.preventDefault(); // stop normal form submission

      const formData = new FormData(form);

      fetch("../Server/Process/edit_profile.php", {
          method: "POST",
          body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            Swal.fire({
                icon: "success",
                title: "<h3 style='font-weight:500'>Profile Updated!</h3>",
                text: "Your changes have been saved.",
                timer: 1000,
                showConfirmButton: false,
                width: 320,
                padding: "1rem",
                background: "#f0f9f5",
                color: "#274c3a",
                customClass: {
                  popup: "swal2-popup-compact"
                },
                timerProgressBar: true
              })
              .then(() => {
                window.location.reload();
              })

          } else {
            Swal.fire({
              icon: "error",
              title: "Error!",
              text: "Something went wrong, please try again!",
              confirmButtonColor: "#d33",
            });
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Something went wrong, please try again!",
            confirmButtonColor: "#d33",
          });
        });
    });
    const form1 = document.getElementById("profileForm");
    const fileInput = document.getElementById("profile-image-home");

    fileInput.addEventListener("change", function() {
      const formData = new FormData(form1);

      fetch('../Server/Process/profile_image.php', {
          method: "POST",
          body: formData
        })
        .then(r => r.json())
        .then(data => {
          if (data.success) {
            window.location.reload()
          } else {
            Swal.fire({
              icon: "error",
              text: "Failed to update image"
            });
          }
        });
    });
    let changePasword = document.getElementById("change_password").addEventListener("click", function() {
      document.getElementById('user_information').classList.add('d-none');
      document.getElementById('change_password_div').classList.remove('d-none');
      document.getElementById('editbtn').classList.add('d-none');

    })
    let changePaswordForm = document.getElementById("change_password_form")
    changePaswordForm.addEventListener("submit", function(e) {
      e.preventDefault();
      let changeformData = new FormData(changePaswordForm);
      fetch("../Server/Process/change_password.php", {
          method: "POST",
          body: changeformData,
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "success") {
            Swal.fire({
                icon: "success",
                title: "<h3 style='font-weight:500'>Password Changed!</h3>",
                text: "Your password has been updated successfully.",
                timer: 1500,
                showConfirmButton: false,
                width: 320,
                padding: "1rem",
                background: "#f0f9f5",
                color: "#274c3a",
                customClass: {
                  popup: "swal2-popup-compact"
                },
                timerProgressBar: true
              })

              .then(() => {
                window.location.reload();
              })

          } else {
            document.getElementById("error_pc").innerText = data.message
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Something went wrong catch, please try again!",
            confirmButtonColor: "#d33",
          });
        });
    })


    let continueEmail = document.getElementById("continueToEmai")
    continueEmail.addEventListener("click", function() {
      Swal.fire({
        title: "Sending Email...",
        html: "Please wait while we send you a verification link.",
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });
      fetch("../Server/Process/pc_phpmailer.php", {
          method: "POST",
        })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {

            Swal.fire({
              iconHtml: `
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#0d6efd" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.708 2.825L15 12V5.383zM1 5.383V12l4.708-2.792L1 5.383zM6.761 9.13L1.528 13H14.47l-5.233-3.87L8 9.944 6.761 9.13z"/>
          </svg>
        `,
              title: "Check Your Email",
              html: `
          <p style="margin:0; font-size: 14px; color:#555">
            We sent a verification link to your email.<br>
            Please open your inbox and follow the link to continue.
          </p>
        `,
              showConfirmButton: true,
              confirmButtonText: "OK",
              width: 350,
              padding: "1.2rem",
              background: "#fff",
              color: "#333",
              customClass: {
                popup: "swal2-popup-compact"
              }
            });

          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: data.message,
            });
          }
        });

    })


    const success = "<?php echo $_GET['success'] ?? ''; ?>";
    if (success === 'true') {
      const userInfo = document.getElementById('user_information');
      if (userInfo) userInfo.classList.add('d-none');
      document.getElementById('change_password_div_email').classList.remove('d-none');
      document.getElementById('editbtn').classList.add('d-none');

      changePaswordtoken = document.getElementById("change_password_form_token")
      changePaswordtoken.addEventListener("submit", function(e) {
        e.preventDefault();
        const formData3 = new FormData(changePaswordtoken);
        fetch("../Server/Process/verify_token_password.php", {
            method: "POST",
            body: formData3
          })
          .then((res) => res.json())
          .then((data) => {
            if (data.status === "success") {
              Swal.fire({
                  icon: "success",
                  title: "<h3 style='font-weight:500'>Password Changed!</h3>",
                  text: "Your password has been updated successfully.",
                  timer: 1500,
                  showConfirmButton: false,
                  width: 320,
                  padding: "1rem",
                  background: "#f0f9f5",
                  color: "#274c3a",
                  customClass: {
                    popup: "swal2-popup-compact"
                  },
                  timerProgressBar: true
                })

                .then(() => {
                  window.location.href = 'http://localhost/Ecomerse-Website/Client/homeprofile.php'
                })
            } else {
              document.getElementById("error_pc_token").innerText = data.message
            }
          })

      })

    }

  });
