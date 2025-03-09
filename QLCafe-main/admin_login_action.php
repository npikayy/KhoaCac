<?php
$tentk = $_POST['tentk'];
$matkhau = $_POST['matkhau'];

require 'connect.php';

$sql = "SELECT * FROM ds_tk_admin WHERE tentk='$tentk'";
$result = $conn->query($sql);
if ($result->num_rows == 0){
    echo "Tai khoan khong ton tai";
}
else {

$dstaikhoan = $result->fetch_all(MYSQLI_ASSOC);
$taikhoan = $dstaikhoan[0];



if ($matkhau == $taikhoan['matkhau']) {
    session_start();
    $_SESSION["admin_tentk"] = $tentk;
    header("location: admin.php");
}
else {
    echo "Sai mat khau";
}

}