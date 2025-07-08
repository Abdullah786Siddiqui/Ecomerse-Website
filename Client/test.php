<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
  }
  .profile-card {
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    overflow: hidden;
  }
  .profile-banner {
    background-color: #2563EB;
    height: 180px;
    position: relative;
  }
  .profile-picture {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 4px solid #fff;
    object-fit: cover;
    position: absolute;
    bottom: -60px;
    left: 50%;
    transform: translateX(-50%);
  }
  .profile-body {
    margin-top: 80px;
    text-align: center;
    padding: 1rem 2rem;
  }
  .stat-card {
    background: #f8f9fc;
    border-radius: 0.75rem;
    padding: 1rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    transition: 0.3s;
  }
  .stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
  .btn-primary {
    background-color: #2563EB;
    border-color: #2563EB;
  }
  .btn-primary:hover {
    background-color: #1e4fc2;
    border-color: #1e4fc2;
  }
</style>
</head>

<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="profile-card">
        <!-- Banner -->
        <div class="profile-banner">
          <img src="../Server/Admin-Panel/Assets/Images/Abdullah.jpg" class="profile-picture shadow">
        </div>

        <div class="profile-body">
          <h3 class="mb-1">Admin Name</h3>
          <p class="text-muted">System Administrator</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, alias.</p>

          <div class="row mt-4 g-3">
            <div class="col-md-4">
              <div class="stat-card">
                <h6 class="text-muted">Posts</h6>
                <h4 class="text-primary">123</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6 class="text-muted">Users</h6>
                <h4 class="text-primary">456</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-card">
                <h6 class="text-muted">Tasks</h6>
                <h4 class="text-primary">78</h4>
              </div>
            </div>
          </div>

          <div class="card shadow-sm mt-4 text-start">
            <div class="card-header bg-white">
              <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
              <p><strong>Email:</strong> admin@example.com</p>
              <p><strong>Phone:</strong> +1 234 567 890</p>
              <p><strong>Address:</strong> 123 Admin Street, City, Country</p>
            </div>
          </div>

          <a href="#" class="btn btn-primary mt-4">Edit Profile</a>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
