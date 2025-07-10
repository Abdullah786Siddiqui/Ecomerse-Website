<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Support</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-4">
  <h1>Customer Support</h1>
  <p>We’re here to help you 24/7</p>
</header>

<!-- Search Help -->
<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <h3>How can we help you?</h3>
      <form class="d-flex mt-3">
        <input class="form-control me-2" type="search" placeholder="Search help topics..." aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</section>

<!-- Contact Options -->
<section class="container my-5">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Call Us</h5>
          <p class="card-text">Speak directly with our support team.</p>
          <p><strong>+1 800 123 4567</strong></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Email Us</h5>
          <p class="card-text">We’ll get back to you within 24 hours.</p>
          <p><strong>support@example.com</strong></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Live Chat</h5>
          <p class="card-text">Chat with our agents in real time.</p>
          <button class="btn btn-outline-primary">Start Chat</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="container my-5">
  <h3 class="text-center mb-4">Frequently Asked Questions</h3>
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
          How do I reset my password?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Click on "Forgot password" on the login page and follow the instructions.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
          Where can I track my order?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Go to the "My Orders" section in your account to track your order.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
          How do I contact support?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          You can reach us via phone, email, or live chat listed above.
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="bg-light text-center py-3 mt-5">
  &copy; 2025 Your Company Name. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
