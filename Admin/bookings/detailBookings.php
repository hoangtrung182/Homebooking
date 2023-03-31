<?php

session_start();
include '../../Models/pdo.php';
include '../../Models/bookings.php';
date_default_timezone_set('ASIA/HO_CHI_MINH');
$date = date('Y-m-d H:i:s');
if (isset($_GET['update_trangthai'])) {
    $ma_dp = $_GET['update_trangthai'];
    $show = showDetail_Clientbooking($ma_dp);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $date = date('Y-m-d');
}

if (isset($_GET['xacnhan'])) {
    if ($show['trang_thai'] == 1) {
        header("Location:listBookings.php");
    } elseif ($show['trang_thai'] == 2) {
        header("Location:listBookings.php");
    } elseif ($show['trang_thai'] == 0 && $show['ngay_den'] <= $date) {
        header("Location:listBookings.php");
    } else {
        $trang_thai = 1;
        $ma_dp = $_GET['xacnhan'];
        update_booking($trang_thai, $ma_dp);
        header("Location:listBookings.php");
        exit();
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
    <link rel="stylesheet" href="../../Css/booking.css">
    <link rel="stylesheet" href="../../Css/style.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="#"><img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php?goto=listCates">QUẢN LÝ LOẠI PHÒNG</a></li>
                    <li><a href="index.php?goto=listRooms">QUẢN LÝ PHÒNG</a></li>
                    <li><a href="listBookings.php">QUẢN LÝ ĐẶT PHÒNG</a></li>
                    <li><a href="#">QUẢN LÝ BÌNH LUẬN</a></li>
                    <li><a href="#">QUẢN LÝ TÀI KHOẢN</a></li>
                    <li><a href="">QUẢN LÝ TIN TỨC</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <?php
                    if (isset($_SESSION['ten_tk'])) {
                        extract($_SESSION['ten_tk']);
                        ?>
                        <li><a href="../index.php?goto=login"><button class="btn5-hover btn5">
                                    <?= $ten_tk ?>
                                </button>
                            </a>
                        </li>
                        <li><a href="../index.php?goto=logout"><button class="btn5-hover btn5">THOÁT</button></a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="../index.php?goto=login"><button class="btn5-hover btn5">
                                    ĐĂNG KÝ
                                </button>
                            </a>
                        </li>
                        <li><a href="../index.php?goto=register"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                    <?php } ?>
                </ul>
            </div>
        </header>
        <div class="line-bot">

            <div class="content-ticket1">
                <div class="title-item">
                    <h5>Tên hometay</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php echo $show['ten_phong'] ?>
                    </h3>
                </div>
            </div>
            <div class="content-ticket2">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Họ và tên</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?php echo $show['ten_kh']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Số điện thoại</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?php echo $show['phone']; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="content-ticket2">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Ngày đến</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?php echo $show['ngay_den']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Ngày về</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?php echo $show['ngay_ve']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
            </div>

            <div class="content-ticket2">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Loại phòng</h5>
                        <div class="details-item">
                            <h3>
                                <?php echo $show['ten_lp']; ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Tổng tiền</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?php $format_number_4 = number_format($show['thanh_tien'], 0, ',', '.');
                            echo $format_number_4 . 'vnđ'; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
            </div>
            <div class="content-ticket2">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5></h5>
                        <div class="details-item">
                            <h3></h3>
                        </div>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5></h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <a href="?xacnhan=<?php echo $show['ma_dp'] ?>&update_trangthai=<?= $show['ma_dp'] ?>">
                                Xác nhận</a>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
            </div>
        </div>
    </div>
    </div>
</body>

</html>