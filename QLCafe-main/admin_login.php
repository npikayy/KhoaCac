<?php
include 'connect.php';

// $sql = "SELECT * FROM dsthucuong";
// $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 100px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #2c1810;
            color: white;
            text-align: center;
            font-size: 1.5rem;
        }

        .btn-custom {
            background-color: #2c1810;
            color: white;
        }

        .btn-custom:hover {
            background-color: #472a1d;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                Đăng nhập
            </div>
            <div class="card-body">
                <form method="POST" action="admin_login_action.php">
                    <div class="mb-3">
                        <label for="tentk" class="form-label">Tên đăng nhập</label>
                        <input type="text" name="tentk" id="tentk" class="form-control" placeholder="Nhập tên đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label for="matkhau" class="form-label">Mật khẩu</label>
                        <input type="password" name="matkhau" id="matkhau" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
