<style>
  .bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px; /* slightly smaller, better visual balance */
    background-color: #fff;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
    z-index: 1000;
    border-radius: 12px 12px 0 0;
    padding: 4px 0; /* added padding for spacing */
}

.bottom-nav a {
    text-decoration: none;
    color: #6b7280;
    font-size: 11px; /* slightly smaller for compact look */
    transition: all 0.3s ease-in-out;
    flex: 1; /* distribute evenly */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.bottom-nav a.active {
    color: #1d4ed8;
    font-weight: 600;
}

.bottom-nav a:hover {
    color: #1d4ed8;
}

.bottom-nav i {
    font-size: 20px;
    margin-bottom: 2px;
    transition: transform 0.2s;
    line-height: 1;
}

.bottom-nav .nav-item:hover i {
    transform: scale(1.1);
}
#mobile_icons{
display: none;
}
@media (max-width: 864px) {
  #mobile_icons {
    display: flex !important;
  
  }
}

</style>


<div id="mobile_icons" class="bottom-nav shadow-sm">
    <a href="./index.php" class=" nav-item">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="#" class="nav-item a">
        <i class="bi bi-grid"></i>
        <span>Categories</span>
    </a>
    <a onclick="checkauth()"  class="nav-item">
        <i class="fas fa-cart-shopping"></i>
        <span>Cart</span>
    </a>
    <a href="./homeprofile.php" class="nav-item">
        <i class="fas fa-user"></i>
        <span>Account</span>
    </a>
</div>