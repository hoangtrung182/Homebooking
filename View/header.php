<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="./Css/table.css">
    <link rel="stylesheet" href="./Css/button.css">
=======
    <!-- <link rel="stylesheet" href="./Css/table.css"> -->
    <!-- <link rel="stylesheet" href="./Css/button.css"> -->
    <!-- <link rel="stylesheet" href="./Css/style.css"> -->
>>>>>>> 1a684aaf9915b3637bef131655dfdab1588e2b6a
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="stylesheet" href="./Css/tables.css">
    <link rel="stylesheet" href="./Css/button.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Trang Chủ | Agoda</title>
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
                    <li><a href="index.php?goto=listNews">Tin Tức</a></li>
                    <li><a href="Client/bookings/listRooms.php">Đặt Phòng</a></li>
                    <li><a href="index.php?goto=add_pay">Thông Tin Phòng Đặt</a></li>
                    <!-- <li><a href="#">Tin Tức</a></li> -->
                    <!-- <li><a href="#">Tài Khoản</a></li> -->
                    <!-- <li><a href="#">Bình luận</a></li> -->
                </ul>
            </div>
            <div class="login">
                <ul>
<<<<<<< HEAD
                    <li><a href="./Account/login.php"><button class="btn5-hover btn5">ĐĂNG NHẬP</button></a>
                    </li>
                    <li><a href="#"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
=======
                    <?php
                    if (isset($_SESSION['ten_tk'])) {
                        extract($_SESSION['ten_tk']);
                    ?>
                        <li><a href="index.php?goto=login"><button class="btn5-hover btn5">
                                    <?= $ten_tk ?>
                                </button>
                            </a>
                        </li>
                        <li><a href="index.php?goto=logout"><button class="btn5-hover btn5">Thoát</button></a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="index.php?goto=login"><button class="btn5-hover btn5">
                                    Đăng nhập
                                </button>
                            </a>
                        </li>
                        <li><a href="index.php?goto=register"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                    <?php  } ?>
>>>>>>> 1a684aaf9915b3637bef131655dfdab1588e2b6a
                </ul>
            </div>
        </header>