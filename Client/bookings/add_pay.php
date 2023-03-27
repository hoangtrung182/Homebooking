<?php
include '../../Models/pdo.php';
include '../../Models/bookings.php';
session_start();
if (isset($_SESSION['user'])) {
    $ma_kh = $_SESSION['user']['ma_tk'];
    $date = date('Y-m-d');
    $shows = show_booking($ma_kh);
    foreach ($shows as $show) {
        // extract($show);
        if (isset($_GET['id_huy'])) {
            if ($show['trang_thai'] == 1 && $show['ngay_den'] > $date || $show['trang_thai'] == 0) {
                delete_booking($_GET['id_huy']);
            }
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="#"><img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="listRooms.php">ĐẶT PHÒNG</a></li>
                    <li><a href="add_pay.php">THÔNG TIN PHÒNG ĐẶT</a></li>
                    <li><a href="#">TIN TỨC</a></li>
                    <li><a href="#">TÀI KHOẢN</a></li>
                    <li><a href="#">Apartments</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <li><a href="../Account/login.php"><button class="btn5-hover btn5">ĐĂNG NHẬP</button></a></li>
                    <li><a href="#"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                </ul>
            </div>
        </header>

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
                <?php foreach ($shows as $show) {
                    extract($show); ?>
                    <tr>
                        <td><img src="../../<?= $show['avatar'] ?>" alt="" width="200px"></td>
                        <td>
                            <?= $show['ten_phong'] ?>
                        </td>
                        <td class="text1">
                            <a href="../bookings/show_pay.php?id_ct=<?= $show['ma_dp'] ?>"><button class="btn-order1">Chi
                                    tiết</button></a>
                            <a href="../bookings/add_pay.php?id_huy=<?= $show['ma_dp'] ?>"
                                onclick=" return confirm('Bạn chắc chắn muốn hủy đặt phòng không!');"><button
                                    class="btn-order1">Hủy</button></a>
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
                <?php } ?>
            </tbody>
    </div>
</body>

</html>