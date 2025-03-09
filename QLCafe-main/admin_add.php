<?php
// Kết nối đến CSDL
$conn = new mysqli('localhost', 'root', '', 'qlcafe');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thêm loại thức uống
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mathucuong = $_POST['mathucuong'];
    // $hinhanh = $_POST['hinhanh'];
    $ten = $_POST['ten'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];

    // Xử lý upload hình ảnh
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

    // kiểm tra trùng mã thức uống
    $sql_check = "SELECT * FROM dsthucuong WHERE mathucuong = '$mathucuong'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Mã thức uống đã tồn tại. Vui lòng nhập mã khác.');</script>";
    
    } else {
        // Chèn dữ liệu vào CSDL
        $sql = "INSERT INTO dsthucuong (mathucuong, hinhanh, ten, mota, gia) VALUES ('$mathucuong', '$hinhanh', '$ten', '$mota', $gia)";
        if ($conn->query($sql) === TRUE) {
            // echo "<script>successModal('Thêm thức uống thành công..');</script>";
            echo "<script>alert('Thêm thức uống thành công.');</script>";

        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }
    // $sql = "INSERT INTO categories (name, status) VALUES ('$name', $status)";

    // if ($conn->query($sql) === TRUE) {
    //     // echo "New record created successfully";
    //     header('location: index.php');
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
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
    <h1>Thêm thức uống</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="">
            <label for="mathucuong" class="form-label">Mã thức uống:</label><br>
            <input type="text" class="form-control" id="mathucuong" name="mathucuong" required><br>
        </div>
        <div class="">
            <label for="hinhanh" class="form-label">Hình ảnh:</label><br>
            <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" required><br>
        </div>
        <div class="">
            <label for="ten" class="form-label">Tên thức uống:</label><br>
            <input type="text" class="form-control" id="ten" name="ten" required><br>
        </div>
        <div class="">
            <label for="mota" class="form-label">Mô tả:</label><br>
            <input type="text" class="form-control" id="mota" name="mota" required><br>
        </div>
        <div class="">
            <label for="gia" class="form-label">Giá (VND):</label><br>
            <input type="number" class="form-control" id="gia" name="gia" min="0" required><br>
        </div>
        <button type="submit" class="btn btn-primary" >Thêm</button>
    </form>




    <div class="modal" tabindex="-1" id="notificationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thong bao</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationMessage">
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>