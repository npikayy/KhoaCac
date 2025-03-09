<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Coffee Web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng <span class="badge bg-danger" id="cartCount">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about"><i class="fas fa-info-circle"></i> Thông tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact"><i class="fas fa-envelope"></i> Liên hệ</a>
                </li>
                <li class="nav-item">
                    
                    <?php 
                    session_start();
                    if (isset($_SESSION["tentk"])) : ?>
                        <li class="nav-item">
                      <div class="nav-link"> <?php echo $_SESSION["tentk"]; ?> </div>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="logout.php"><i class="fas fa-user"></i> Đăng xuất </a>
                      </li>
                      

                    <?php else :  ?>
                        <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Đăng ký/Đăng nhập </a>
                        </li>
                    <?php endif ?>
                </li>

            </ul>
        </div>
    </div>
</nav>
