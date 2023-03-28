<?php
include '../../Models/pdo.php';
include '../../Models/bookings.php';
session_start();
if (isset($_GET['id_ct'])) {
    $ma_dp = $_GET['id_ct'];
    $listPay = show_bookingDetail($ma_dp);
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
    <!-- <link rel="stylesheet" href="../Css/pay.css"> -->
</head>
<style>
    .container_pay {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        border: 1px solid red;
    }

    .content-ticket2 {
        display: grid;
        grid-template-columns: 2fr 1fr;
        margin-top: 20px;
    }
</style>

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
        <div class="container_pay">
            <div class="content-ticket1">
                <div class="title-item">
                    <h5>Tên phòng</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?= $listPay['ten_phong'] ?>
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
                            <?= $listPay['ten_kh']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Loại phòng</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?= $listPay['ten_lp']; ?>
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
                            <?= $listPay['ngay_den']; ?>
                        </h3>
                    </div>

                    <!-- End item-ticket -->
                    <div class="item-ticket">
                        <div class="title-item">
                            <h5>Ngày về</h5>
                        </div>
                        <div class="details-item">
                            <h3>
                                <?= $listPay['ngay_ve']; ?>
                            </h3>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                </div>

                <div class="content-ticket2">
                    <div class="item-ticket">
                        <div class="title-item">
                            <h5>Tổng tiền</h5>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                    <div class="item-ticket">
                        <div class="details-item">
                            <h3>
                                <?php $format_number_4 = number_format($listPay['thanh_tien'], 0, ',', '.');
                                echo $format_number_4 . 'vnđ'; ?>
                            </h3>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                </div>
            </div>
        </div>
</body>

</html>