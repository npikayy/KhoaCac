<?php

require 'connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $mathucuong = $_POST['mathucuong'];
    // $hinhanh = $_POST['hinhanh'];
    $ten = $_POST['ten'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];

    $hinhanh = '';
    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "img/"; // Thư mục lưu ảnh
        $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Kiểm tra định dạng hình ảnh
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                $hinhanh = $target_file;
            } else {
                echo "Lỗi khi tải lên hình ảnh.";
            }
        } else {
            echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG, GIF.";
        }
    }

    echo $hinhanh;

    $sql = '';
    if ($hinhanh == ''){
        $sql = "UPDATE dsthucuong SET ten='$ten',mota ='$mota',gia='$gia' WHERE mathucuong='$mathucuong'";
    }
    else {
        $sql = "UPDATE dsthucuong SET hinhanh='$hinhanh',ten='$ten',mota ='$mota',gia='$gia' WHERE mathucuong='$mathucuong'";
    }


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

}

  ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="js/admin_add.js"></script>
    <style>
        form {
            max-width: 700px;
            margin: 20px auto;
            padding: 40px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
        }

        h1 {
            text-align: center;
        }
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
        .action-btn {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <?php include 'navbar_ad.php'; ?>
        
    <?php
    require 'connect.php';
    $thucuong = $_GET['mathucuong'];
    $sql = "SELECT * FROM dsthucuong where mathucuong='$thucuong' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) :
        $dsthucuong = $result->fetch_all(MYSQLI_ASSOC);
        
        $thucuong  = $dsthucuong[0];
    ?>
    



    
    <div class="container">

        <div class="card">
            <H1>form edit thuc uong</H1>

            <form method= "POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mã Thức Uống: </label>
                    <input type="text" class="form-control" id="mathucuong" name="mathucuong"value="<?= $thucuong['mathucuong'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Hình Ảnh: </label>
                    <!-- <input type="text" class="form-control" id="hinhanh" name="hinhanh" value=""> -->
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*"><br>
                    <img src="<?= $thucuong['hinhanh'] ?>" alt=""hinhanh height="100px">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tên: </label>
                    <input type="text" class="form-control" id="ten" name="ten" value="<?= $thucuong['ten'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mô Tả: </label>
                    <input type="text" class="form-control" id="mota" name="mota" value="<?= $thucuong['mota'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Giá:</label>
                    <input type="number" class="form-control" id="gia" name="gia" value="<?= $thucuong['gia'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
    <?php
    endif;
    ?>
</body>