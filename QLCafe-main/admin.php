<?php
include 'connect.php';

$sql = "SELECT * FROM dsthucuong";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        ul>li{
            list-style: none;
        }
        .text-white{
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php include 'navbar_ad.php'; ?>

<div class="container py-5">
    <h2 class="text-center mb-4">Danh Sách Sản Phẩm</h2>
    <div class="text-end">
        <!-- <button class="btn btn-primary" id="showFormBtn"></button> -->
        <a href="admin_add.php" class="btn btn-primary">Thêm Sản Phẩm </a>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        <?php 
        
        if ($result && $result->num_rows > 0) :
            $products = $result->fetch_all(MYSQLI_ASSOC);
        foreach($products as $thucuong): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $thucuong['hinhanh'] ?>" class="card-img-top" alt="<?= $thucuong['ten'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $thucuong['ten'] ?></h5>
                        <p class="card-text"><?= $thucuong['mota'] ?></p>
                        <p class="card-text"><strong><?= number_format($thucuong['gia'], 0, ',', '.') ?>đ</strong></p>
                        <a href="admin_edit.php?mathucuong=<?= $thucuong['mathucuong'] ?>" class="btn btn-warning mt-2">Sửa</a>
                        <form method="POST" action="admin_delete.php?mathucuong=<?=$thucuong['mathucuong'] ?>" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $thucuong['mathucuong'] ?>">
                            <button type="submit" name="delete" class="btn btn-danger mt-2">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; 
        endif;
        ?>
    </div>
    
</div>
<div class="container mt-5" id="addProductForm" style="display: none;">
    <h2 class="text-center mb-4">Thêm Mới Sản Phẩm</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình ảnh</label>
            <input type="text" class="form-control" id="hinhanh" name="hinhanh" required>
        </div>
        <div class="mb-3">
            <label for="ten" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ten" name="ten" required>
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="mota" required></textarea>
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" required>
        </div>
        <button type="submit" name="add" class="btn btn-success">Thêm sản phẩm</button>
    </form>
</div>

<script>t
    document.getElementById('showFormBtn').addEventListener('click', function() {
        document.getElementById('addProductForm').style.display = 'block';
    });
</script>

<?php include 'footer.php'; ?>
</body>
</html>
