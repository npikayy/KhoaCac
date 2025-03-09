<?php
$tentk = $_POST['tentk'];
$matkhau = $_POST['matkhau'];

require 'connect.php';

$sql = "SELECT * FROM dstaikhoan WHERE tentk='$tentk'";
$result = $conn->query($sql);
if ($result->num_rows == 0){
    echo "Tai khoan khong ton tai";
}
else {

$dstaikhoan = $result->fetch_all(MYSQLI_ASSOC);
$taikhoan = $dstaikhoan[0];



if ($matkhau == $taikhoan['matkhau']) {
    echo "Dung mat khau";
    session_start();
    $_SESSION["tentk"] = $tentk;
    echo $_SESSION["tentk"];
    header("location: index.php");
}
else {
    echo "Sai mat khau";
}

}