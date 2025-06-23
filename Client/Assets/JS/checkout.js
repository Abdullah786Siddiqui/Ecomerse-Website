// Wait for the page to load
window.addEventListener('load', function () {
  let form = document.querySelector('.needs-validation');
  let checkbox = document.getElementById('same-address');
  let shippingSection = document.getElementById('shipping-section');

  // IDs of shipping fields
  const shippingFields = [
    'shippingName',
    'shippingAddress',
    'shippingPhone',
    'shippingCountry',
    'shippingCity' // make sure you add this field in your HTML
  ];

  // Show/hide shipping section based on checkbox
  checkbox.addEventListener('change', function () {
    if (this.checked) {
      shippingSection.style.display = 'none';

      // Remove required attributes
      shippingFields.forEach(id => {
        let field = document.getElementById(id);
        if (field) {
          field.removeAttribute('required');
          field.classList.remove('is-invalid');
        }
      });
    } else {
      shippingSection.style.display = 'block';

      // Add required attributes
      shippingFields.forEach(id => {
        let field = document.getElementById(id);
        if (field) {
          field.setAttribute('required', 'true');
        }
      });
    }
  });

  // Form submit validation
  form.addEventListener('submit', function (event) {
    // Always show Bootstrap validation style
    form.classList.add('was-validated');

    // If form is invalid, stop submission
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();

      // If shipping is required, show it
      if (!checkbox.checked) {
        shippingSection.style.display = 'block';
      }
    }
  }, false);z 
});
