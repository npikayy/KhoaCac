<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Coffee Web - Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php"><i class="fas fa-home"></i> Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php"><i class="fas fa-shopping-cart"></i> Danh sách nước <span class="badge bg-danger" id="cartCount">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_add.php"><i class="fas fa-info-circle"></i> Thêm nước</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#contact"><i class="fas fa-envelope"></i> Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-user"></i> Đăng ký/Đăng nhập</a>
                </li> -->

                <?php 
                    session_start();
                    if (isset($_SESSION["admin_tentk"])) : ?>
                        <li class="nav-item">
                      <div class="nav-link"> <?php echo $_SESSION["admin_tentk"]; ?> </div>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="admin_logout.php"><i class="fas fa-user"></i> Đăng xuất </a>
                      </li>
                      

                    <?php else:
                        header ("location: admin_login.php");
                        endif ?>


            </ul>
        </div>
    </div>
</nav>
