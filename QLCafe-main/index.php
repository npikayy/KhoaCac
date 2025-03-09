<?php
include 'connect.php';
//AI
// $productsPerPage = 6; 
// $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $currentPage = max($currentPage, 1); 
// $totalProductsQuery = "SELECT COUNT(*) AS total FROM dsthucuong";
// $totalProductsResult = $conn->query($totalProductsQuery);
// $totalProducts = $totalProductsResult->fetch_assoc()['total'];
// $offset = ($currentPage - 1) * $productsPerPage;

// $sql = "SELECT * FROM dsthucuong LIMIT $offset, $productsPerPage";
$sql = "SELECT * FROM dsthucuong";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background-color: #2c1810 !important;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .footer {
            background-color: #2c1810;
            color: white;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            border-radius: 50%;
            background-color: white;
            color: #2c1810;
            margin-right: 10px;
        }

        ul>li {
            list-style: none;
        }

        .text-white {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>
    <section id="drinks" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Menu Đồ Uống</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                if ($result && $result->num_rows > 0) :
                    $products = $result->fetch_all(MYSQLI_ASSOC);

                    foreach ($products as $product):

                ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src='<?= $product['hinhanh'] ?>' class="card-img-top" alt='<?= $product['ten'] ?>'>
                                <div class="card-body">
                                    <h5 class="card-title"> <?= $product['ten'] ?></h5>
                                    <p class="card-text"> <?= $product['mota'] ?></p>
                                    <p class="card-text"><strong><?= number_format($product['gia'], 0, ',', '.') ?>đ</strong></p>
                                    <!-- <button class="btn btn-primary add-to-cart">Thêm vào giỏ</button> -->
                                    <form action="add_to_cart.php" method="POST">
                                        <input type="hidden" name="mathucuong" value="<?= $product['mathucuong'] ?>">
                                        <button type="submit" name="add_to_cart" class="btn btn-primary">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
                endif;
                ?>
            </div>

        </div>
    </section>
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Về Chúng Tôi</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Câu Chuyện Coffee Web</h4>
                    <p>Coffee Web là không gian cafe được yêu thích tại Hà Nội với hơn 5 năm kinh nghiệm. Chúng tôi tự hào mang đến những tách cà phê ngon nhất từ những hạt cà phê được chọn lọc kỹ càng.</p>
                </div>
                <div class="col-md-6">
                    <h4>Giá Trị Cốt Lõi</h4>
                    <ul>
                        <li>Chất lượng đồ uống tuyệt hảo</li>
                        <li>Dịch vụ khách hàng chu đáo</li>
                        <li>Không gian thoải mái, ấm cúng</li>
                        <li>Giá cả hợp lý</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>

</html>