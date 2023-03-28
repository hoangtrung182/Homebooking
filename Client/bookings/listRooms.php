<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
    <title>Document</title>

</head>

<?php
session_start();
include '../../Models/pdo.php';
include '../../Models/bookings.php';
$listRooms_booking = selectRooms_booking();


date_default_timezone_set('ASIA/HO_CHI_MINH');
$date = date('Y-m-d H:i:s');
?>


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
                    <li><a href="Client/bookings/listRooms.php">Đặt Phòng</a></li>
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
        <h2 class="form_title">DANH SÁCH PHÒNG</h2>
        <div class="rows">

            <?php foreach ($listRooms_booking as $room) {
                extract($room);
                ?>
                <div class="item">
                    <div>
                        <a href="">
                            <img src="../../<?= $room['avatar'] ?>" alt="" width="300px">
                        </a>
                    </div>
                    <h3>
                        <?= $room['ten_phong'] ?>
                    </h3>
                    <p>
                        Loại phòng:
                        <?= $room['ten_lp'] ?>
                    </p>
                    <p>
                        <?= substr($room['mo_ta'], 0, 100) ?>
                    </p>
                    <span class="price-item">
                        <?php if ($room['giam_gia'] == 0) {
                            $format_number_4 = number_format($room['gia'], 0, ',', '.');
                            echo $format_number_4 . 'vnđ/đêm';
                        } else { ?>
                            <h4 style="text-decoration-line:line-through; color:black">
                                <?php
                                $format_number_4 = number_format($room['gia'], 0, ',', '.');
                                echo $format_number_4 . 'vnđ/đêm' . '<br>'; ?>
                            </h4>
                            <?php
                            $format_number_3 = number_format($room['giam_gia'], 0, ',', '.');
                            echo $format_number_3 . 'vnđ/đêm';
                        } ?>
                    </span>
                    <div>
                        <a href="detailRooms.php?id=<?= $room['ma_phong']; ?>"><button class="btn-order1" type="submit">Đặt
                                ngay</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>