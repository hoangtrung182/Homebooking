<?php
include '../../Models/pdo.php';
include '../../Models/bookings.php';
session_start();
if (isset($_SESSION['ten_tk'])) {
    $ma_kh = $_SESSION['ten_tk']['ma_tk'];
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

} else {
    $shows = '';
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
                <a href="./">
                    <img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <!-- <li><a href="index.php?goto=listCates">Loại Phòng</a></li> -->
                    <!-- <li><a href="index.php?goto=listRooms">Danh sách phòng</a></li> -->
                    <li><a href="../../index.php?goto=listNews">Tin Tức</a></li>
                    <li><a href="listRooms.php">Đặt Phòng</a></li>
                    <li><a href="add_pay.php">Thông Tin Phòng Đặt</a></li>
                    <!-- <li><a href="#">Tin Tức</a></li> -->
                    <!-- <li><a href="#">Tài Khoản</a></li> -->
                    <!-- <li><a href="#">Bình luận</a></li> -->
                </ul>
            </div>
            <div class="login">
                <ul>
                    <?php
                    if (isset($_SESSION['ten_tk'])) {
                        extract($_SESSION['ten_tk']);
                        ?>
                        <li><a href="index.php?goto=login"><button class="btn5-hover btn5">
                                    <?= $ten_tk ?>
                                </button>
                            </a>
                        </li>
                        <li><a href="../../index.php?goto=logout"><button class="btn5-hover btn5">Thoát</button></a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="index.php?goto=login"><button class="btn5-hover btn5">
                                    Đăng nhập
                                </button>
                            </a>
                        </li>
                        <li><a href="index.php?goto=register"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                    <?php } ?>
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
                <?php
                if (isset($_SESSION['ten_tk'])) { ?>
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
                <?php } else {
                    echo "Đăng nhập để xem thông tin chi tiết!";
                } ?>

            </tbody>
    </div>
</body>

</html>