<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bottom Navigation Bar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background-color: #fff;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: space-around;
    align-items: center;
    z-index: 1000;
}
.bottom-nav a {
    text-decoration: none;
    color: #555;
    font-size: 12px;
}
.bottom-nav a.active {
    color: #007bff;
}
.bottom-nav i {
    font-size: 20px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body style="padding-bottom: 60px;">

<div class="container mt-5">
    <h1>Content Area</h1>
    <p>This is your main content. Scroll to see the bottom nav stay fixed.</p>
</div>

<div class="bottom-nav shadow-sm">
    <a href="#" class="active d-flex flex-column align-items-center">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-search"></i>
        <span>Search</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-shopping-cart"></i>
        <span>Cart</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bottom Navigation Bar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background-color: #fff;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: space-around;
    align-items: center;
    z-index: 1000;
}
.bottom-nav a {
    text-decoration: none;
    color: #555;
    font-size: 12px;
}
.bottom-nav a.active {
    color: #007bff;
}
.bottom-nav i {
    font-size: 20px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body style="padding-bottom: 60px;">

<div class="container mt-5">
    <h1>Content Area</h1>
    <p>This is your main content. Scroll to see the bottom nav stay fixed.</p>
</div>

<div class="bottom-nav shadow-sm">
    <a href="#" class="active d-flex flex-column align-items-center">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-search"></i>
        <span>Search</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-shopping-cart"></i>
        <span>Cart</span>
    </a>
    <a href="#" class="d-flex flex-column align-items-center">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
