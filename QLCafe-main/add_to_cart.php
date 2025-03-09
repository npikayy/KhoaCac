<?php
session_start();
if (!isset($_SESSION["tentk"])){
    header("location: login.php");
}

include 'connect.php';

$mathucuong = $_POST['mathucuong'];
$soluong = 1;
$tentk = $_SESSION["tentk"]; 

// echo $mathucuong;
// echo $tentk;
// echo "Thêm thành công";

// Xử lý yêu cầu thêm vào giỏ hàng
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // $mathucuong = $_POST['mathucuong'] ?? null;
    // if (!$mathucuong) {
    //     die("Không nhận được mã thức uống!");
    // }
    // $mathucuong = $_POST['mathucuong'];
    // $soluong = 1;
    // $tentk = $_SESSION["tentk"]; 

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $checkQuery = "SELECT * FROM dsorder WHERE mathucuong = '$mathucuong' AND tentk = '$tentk'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Nếu đã có, cập nhật số lượng và thời điểm
        $updateQuery = "UPDATE dsorder 
                        SET soluong = soluong + $soluong 
                        WHERE mathucuong = '$mathucuong' AND tentk = '$tentk'";
        $conn->query($updateQuery);
    } else {
        // Nếu chưa có, thêm mới
        $insertQuery = "INSERT INTO dsorder (mathucuong, soluong, tentk) 
                        VALUES ('$mathucuong', $soluong, '$tentk')";
        $conn->query($insertQuery);
    }
    echo "<script>alert('Thêm vào giỏ hàng thành công!'); window.location.href = 'index.php';</script>";
    // echo $mathucuong;
    // echo $tentk;
    // echo "Thêm thành công";
// }
?>
