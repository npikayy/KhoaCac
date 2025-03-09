<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex-grow: 1;
        }

        .navbar {
            background-color: #2c1810 !important;
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

        .cart-item img {
            width: 100px;
            height: auto;
        }

        ul>li {
            list-style: none;
        }

        .text-white {
            text-decoration: none;
        }
    </style>
</head>

<body class="d-flex flex-column">

    <?php include 'navbar.php'; ?>



    <?php
    include 'connect.php';
    
    $cart_tentk = "";
    if (isset($_SESSION["tentk"])){
        $cart_tentk = $_SESSION["tentk"];
    }

    $sql = "SELECT dsorder.mathucuong, dsthucuong.ten, dsthucuong.gia, dsorder.soluong, 
        (dsthucuong.gia * dsorder.soluong) AS thanhtien, dsorder.tentk
        FROM dsorder
        JOIN dsthucuong ON dsorder.mathucuong = dsthucuong.mathucuong
        WHERE dsorder.tentk = '$cart_tentk'";

    $result = $conn->query($sql);


    $total = 0;
    ?>



    <div class="container py-5 content">
        <h2 class="text-center mb-4">Giỏ Hàng</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Mã thức uống</th>
                        <th>Tên thức uống</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) {
                        $total += $row['thanhtien'];
                    ?>
                        <tr>
                            <td><?php echo $row['mathucuong']; ?></td>
                            <td><?php echo $row['ten']; ?></td>
                            <td><?php echo number_format($row['gia'], 0, ',', '.'); ?> VND</td>
                            <td><?php echo $row['soluong']; ?></td>
                            <td><?php echo number_format($row['thanhtien'], 0, ',', '.'); ?> VND</td>
                            <td>
                                <a href="delete_from_cart.php?mathucuong=<?php echo $row['mathucuong']; ?>&tentk=<?php echo $row['tentk']; ?>"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-end">
                <h2 id="totalPrice">Tổng tiền: <?php echo number_format($total, 0, ',', '.'); ?> VND</h2>
                <button class="btn btn-primary" id="checkoutButton" disabled>Thanh Toán</button>

            </div>


            


        </div>

    </div>
    <?php include 'footer.php'; ?>













</body>

</html>