<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
    }
    .profile-pic {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: #ddd;
      display: inline-block;
      background-image: url('https://via.placeholder.com/80'); /* Replace with actual image if needed */
      background-size: cover;
      background-position: center;
    }
    .section-title {
      font-weight: bold;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4 bg-white">

    <form>
      <div class="row g-4">
        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">Full Name</label>
          <input type="text" class="form-control rounded-3 border-light-subtle shadow-sm" value="Fozia">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">Email</label>
          <input type="email" class="form-control rounded-3 border-light-subtle shadow-sm" value="fozianaz140@gmail.com">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">Phone</label>
          <input type="text" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Enter phone number">
        </div>

      

        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">Address</label>
          <input type="text" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Enter address">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">City</label>
          <input type="text" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Enter city">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold text-muted">Country</label>
          <input type="text" class="form-control rounded-3 border-light-subtle shadow-sm" placeholder="Enter country">
        </div>

       

      <div class="d-flex justify-content-between mt-5">
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm"> Save Changes</button>
        <a href="#" class="btn btn-outline-secondary px-4 py-2 rounded-3">Cancel</a>
      </div>
    </form>

  </div>
</div>

</div>

</body>
</html>
