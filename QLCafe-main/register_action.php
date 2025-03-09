<?php
$tentk = $_POST['tentk'];
$matkhau = $_POST['matkhau'];

require 'connect.php';

$sql = "INSERT INTO dstaikhoan VALUES ('$tentk', '$matkhau');";
$result = $conn->query($sql);
if ($result){
    echo "Dang ky thanh cong";
}
else {
    echo "Dang ky khong thanh cong";

}