<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/tables.css">
    <link rel="stylesheet" href="../Css/button.css">
    <link rel="stylesheet" href="../Css/News.css">
    <link rel="stylesheet" href="../Css/account.php">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Trang Chủ | ADMIN</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <a href="./index.php">
                    <img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php?goto=listCates">QUẢN LÝ LOẠI PHÒNG</a></li>
                    <li><a href="index.php?goto=listRooms">QUẢN LÝ PHÒNG</a></li>
                    <li><a href="bookings/listBookings.php">QUẢN LÝ ĐẶT PHÒNG</a></li>
                    <li><a href="#">QUẢN LÝ BÌNH LUẬN</a></li>
                    <li><a href="index.php?goto=listAcc">QUẢN LÝ TÀI KHOẢN</a></li>
                    <li><a href="index.php?goto=listNews">QUẢN LÝ TIN TỨC</a></li>
                    <li><a href="index.php?goto=listContact">QUẢN LÝ Hỗ trợ</a></li>
                    <li><a href="index.php?goto=thongke">Thống kê</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <?php
                    if (isset($_SESSION['ten_tk'])) {
                        extract($_SESSION['ten_tk']);
                        ?>
                        <li><a href="index.php?goto=login">
                                <button class="btn5-hover btn5">
                                    <?= $ten_tk ?>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?goto=exit">
                                <button class="btn5-hover btn5">Thoát</button>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li><a href="index.php?goto=login"><button class="btn5-hover btn5">
                                    ĐĂNG NHẬP
                                </button>
                            </a>
                        </li>
                        <li><a href="index.php?goto=register"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                    <?php } ?>
                </ul>
            </div>
        </header>