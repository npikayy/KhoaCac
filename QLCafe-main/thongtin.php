<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $thongtin = 
        [
            'account' => 'minhnhut251',
            'mssv' => 'KTPM2211039',
            'lop' => 'KTPM2211',
            'nganh' => 'Kỹ Thuật Phần Mềm',
            'namsinh' => '2001',
            'gioitinh' => 'Nam'
        ];
    ?>

    <?php include 'navbar.php'; ?>

    <div class="container">

        <div class="card">
            <h1>THÔNG TIN TÀI KHOẢN</h1>
            <table class="table table-striped">
                <th>Khóa</th>
                <th>Giá trị</th>
                <?php foreach ($thongtin as $x => $y): ?>
                    <tr>
                        <td><?= $x ?></td>
                        <td><?= $y ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


</body>

</html>