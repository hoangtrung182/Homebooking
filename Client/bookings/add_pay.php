<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/booking.css">
</head>

<body>
    <table class="content-table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên phòng</th>
                <th>Chi tiết</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="<?= $show['avatar'] ?>" alt=""></td>
                <td>
                    <?= $show['ten_phong'] ?>
                </td>
                <td class="text1">
                    <a href="../bookings/show_pay.php?id=<?= $show['ma_dp'] ?>">Chi tiết</a>
                    <a href="../bookings/add_pay.php?id=<?= $show['ma_dp'] ?>">Hủy</a>
                </td>
                <td>
                    <?php
                    if ($show['trang_thai'] == 0) {
                        echo "Chưa xác nhận!";
                    } else if ($show['trang_thai'] == 1) {
                        if ($show['ngay_den'] > $date) {
                            echo "Sắp diễn ra!";
                        } else if ($show['ngay_den'] <= $date && $date <= $show['ngay_ve']) {
                            echo "Đang diễn ra!";
                        } else if ($date > $show['ngay_ve']) {
                            echo "Đã kết thúc!";
                        }
                    } else if ($show['trang_thai'] == 2) {
                        echo "Đã hủy!";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
</body>

</html>