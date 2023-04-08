<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/button.css">
    <link rel="stylesheet" href="../Css/News.css">
    <link rel="stylesheet" href="../Css/tables.css">
    <link rel="stylesheet" href="../Css/account.css">
    <link rel="stylesheet" href="../Css/list.css">
    <link rel="stylesheet" href="../Css/main.css">
    <link rel="stylesheet" href="../Css/booking.css">
    <title>Agoda | Admin</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="index.php" class="brand">
            <div class="logo"><img src="../img/colordefault.svg" alt=""></div>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="./index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text"></span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listCates">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">QUẢN LÝ LOẠI PHÒNG</span>
                </a>
            </li>
            <li>
                <a href="./index.php?goto=listRooms">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">QUẢN LÝ PHÒNG</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listRooms_booking">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">QUẢN LÝ ĐẶT PHÒNG</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listbinhluan">
                    <i class='bx bx-comment'></i>
                    <span class="text">QUẢN LÝ BÌNH LUẬN</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listAcc">
                    <i class='bx bxs-group'></i>
                    <span class="text">QUẢN LÝ TÀI KHOẢN</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listNews">
                    <i class='bx bx-news'></i>
                    <span class="text">QUẢN LÝ TIN TỨC</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=listContact">
                    <i class='bx bx-support'></i>
                    <span class="text">QUẢN LÝ Hỗ trợ</span>
                </a>
            </li>
            <li>
                <a href="index.php?goto=thongke">
                    <i class='bx bx-support'></i>
                    <span class="text">QUẢN LÝ Thống kê</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <?php
            if (isset($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
                ?>
                <li>
                    <a href="index.php?goto=changepassword">
                        <button class="btn5-hover btn5">Đổi mật khẩu</button>
                    </a>
                </li>
                <li>
                    <a href="index.php?goto=login">
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
            <?php } ?>
        </ul>
    </section>
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <script src="./main.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>