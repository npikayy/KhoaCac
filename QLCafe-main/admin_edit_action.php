<?php

require 'connect.php';

// if(isset($_POST['admin_edit'])){


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

// }