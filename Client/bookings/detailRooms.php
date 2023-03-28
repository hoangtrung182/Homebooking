<?php
include '../../Models/pdo.php';
include '../../Models/bookings.php';
session_start();
if (isset($_SESSION['ten_tk'])) {
    $ten_kh = $_SESSION['ten_tk']['ten_tk'];
    $phone = $_SESSION['ten_tk']['phone'];
    $dia_chi = $_SESSION['ten_tk']['dia_chi'];
} else {
    $ten_kh = '';
    $phone = '';
    $dia_chi = '';

}

if (isset($_GET['id'])) {
    $maphong = $_GET['id'];
    $chitiet = showRoom_tm($_GET['id']);
    //var_dump(showRoom_tm($_GET['id']));
    if (isset($_POST['dat'])) {
        $ma_kh = '';
        $ma_km = '';
        date_default_timezone_set('ASIA/HO_CHI_MINH');
        $ngay_dat = date('Y-m-d H:i:s');
        if (isset($_SESSION['ten_tk'])) {
            $ma_kh = $_SESSION['ten_tk']['ma_tk'];
        }
        $so_ngay = getDatesFromRange($_POST['ngay_den'], $_POST['ngay_ve']);
        //var_dump($so_ngay);
        if ($chitiet['giam_gia'] == 0) {
            $gia = $chitiet['gia'];
            if (isset($_SESSION['ten_tk'])) {
                $id_sale = $_SESSION['ten_tk']['ma_tk'];
            } else {
                $id_sale = 0;
            }

            $giam_gia_thanh_vien = select_Sale($id_sale)['sale-tv'];
            $tong_tien = ($gia * ($so_ngay - 1)) - $giam_gia_thanh_vien;

            $_SESSION['datphong'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $chitiet['ma_lp'],
                'ma_phong' => $chitiet['ma_phong'],
                'ten_lp' => $chitiet['ten_lp'],
                'avatar' => $chitiet['avatar'],
                'ten_phong' => $chitiet['ten_phong'],
                'ma_hs' => $_GET['id'],
            ];

        } else {
            $gia = $chitiet['giam_gia'];
            if (isset($_SESSION['ten_tk'])) {
                $id_sale = $_SESSION['ten_tk']['ma_tk'];
            } else {
                $id_sale = 0;
            }
            $giam_gia_thanh_vien = select_Sale($id_sale)['sale-tv'];
            $tong_tien = ($gia * ($so_ngay - 1)) - $giam_gia_thanh_vien;

            $_SESSION['datphong'] = [
                'ngay_dat' => $ngay_dat,
                'ngay_den' => $_POST['ngay_den'],
                'ngay_ve' => $_POST['ngay_ve'],
                'tong_tien' => $tong_tien,
                'ma_lp' => $chitiet['ma_lp'],
                'ma_phong' => $chitiet['ma_phong'],
                'ten_lp' => $chitiet['ten_lp'],
                'avatar' => $chitiet['avatar'],
                'ten_phong' => $chitiet['ten_phong'],
                'ma_hs' => $_GET['id'],
            ];
            //var_dump($_SESSION['datphong']);
        }

        if ($_POST['ngay_den'] == '' || $_POST['ngay_ve'] == '' || strtotime($_POST['ngay_den']) >= strtotime($_POST['ngay_ve']) || $_POST['ngay_den'] < $ngay_dat) {
            $thongbao = "Vui lòng chọn lại thời gian!";
        } else {
            // include 'pay.php';
            header('Location:pay.php');
            exit();
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
        <div class="order">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="price">
                    <h2 class="number-price">
                        <?php if ($chitiet['giam_gia'] == 0) {
                            $format_number_4 = number_format($chitiet['gia'], 0, ',', '.');
                            echo $format_number_4;
                        } else {
                            $format_number_3 = number_format($chitiet['giam_gia'], 0, ',', '.');
                            echo $format_number_3;
                        }
                        ?>
                    </h2><span>vnđ/đêm</span>
                </div>
                <div class="time">
                    <input type="date" name="ngay_den" id="" class="first">
                    <span>đến</span>
                    <input type="date" name="ngay_ve" id="" class="last">
                </div>
                <div>
                    <button class="btn-order" type="submit" name="dat">Đặt ngay</button>
                </div>
                <?php

                $thongbao = isset($thongbao) ? $thongbao : '';
                $thongbao_delete = isset($thongbao_xoa) ? $thongbao_xoa : '';
                ?>
                <h4 class="" style="color:red;">
                    <?= $thongbao ?>
                </h4>
                <p class="">
                    <?= $thongbao_delete ?>
                </p>
        </div>
    </div>
</body>

</html>