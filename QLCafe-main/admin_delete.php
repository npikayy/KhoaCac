<?php
require 'connect.php';

$mathucuong = $_GET['mathucuong'];

$sql = "DELETE FROM dsthucuong WHERE mathucuong='$mathucuong'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    header('location: admin.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();