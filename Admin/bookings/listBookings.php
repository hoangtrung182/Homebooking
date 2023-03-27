<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../.././Css/booking.css">
    <link rel="stylesheet" href="../../Css/style.css">
</head>
<?php

session_start();
include '../../Models/pdo.php';
include '../../Models/bookings.php';
date_default_timezone_set('ASIA/HO_CHI_MINH');
$date = date('Y-m-d H:i:s');
$list = listBooking();
?>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="#"><img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="">QUẢN LÝ LOẠI PHÒNG</a></li>
                    <li><a href="">QUẢN LÝ PHÒNG</a></li>
                    <li><a href="listBookings.php">QUẢN LÝ ĐẶT PHÒNG</a></li>
                    <li><a href="#">QUẢN LÝ BÌNH LUẬN</a></li>
                    <li><a href="#">QUẢN LÝ TÀI KHOẢN</a></li>
                    <li><a href="">QUẢN LÝ TIN TỨC</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <li><a href="#"><button class="btn5-hover btn5">ĐĂNG NHẬP</button></a></li>
                    <li><a href="#"><button class="btn5-hover btn5">ĐĂNG XUẤT</button></a></li>
                </ul>
            </div>
        </header>
        <div>
            <h2 class="form_title">DANH SÁCH ĐẶT PHÒNG</h2>
        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th style="width=300px;">Tên khách hàng</th>
                    <th>Tên loại phòng</th>
                    <th>Ngày đặt</th>
                    <!-- <th>Ngày đến</th>
                <th>Ngày về</th> -->
                    <!-- <th>Tổng tiền</th> -->
                    <th>Chi tiết</th>
                    <th>Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $listBookings) {
                    extract($listBookings); ?>

                    <tr>
                        <td>
                            <?= $listBookings['ten_kh'] ?>
                        </td>
                        <td>
                            <?= $listBookings['ten_phong'] ?>
                        </td>
                        <td>
                            <?= $listBookings['ngay_dat'] ?>
                        </td>
                        <td><a href="./detailBookings.php?update_trangthai=<?= $listBookings['ma_dp'] ?>"><button
                                    class="btn-order1">Chi tiết</button></a></td>
                        <td>
                            <?php
                            if ($listBookings['trang_thai'] == 0) {
                                if ($listBookings['ngay_den'] < $date) {
                                    echo "<div class='ron1'><h4>Quá thời gian xác nhận!</h4></div>";
                                } else {
                                    echo "<div class='ron1'><h4>Chưa xác nhận!</h4></div>";
                                }
                            } else if ($listBookings['trang_thai'] == 1 && $listBookings['ngay_ve'] < $date) {
                                echo "<div class='ron2'><h4>Đã kết thúc!</h4></div>";
                            } else if ($listBookings['trang_thai'] == 1 && $listBookings['ngay_den'] > $date) {
                                echo "<div class='ron2'><h4>Chưa diễn ra!</h4></div>";
                            } else if ($listBookings['trang_thai'] == 2) {
                                echo "<div class='ron1'><h4>Đã hủy!</h4></div>";
                            } else {
                                echo "<div class='ron1'><h4>Đang diễn ra!</h4></div>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>