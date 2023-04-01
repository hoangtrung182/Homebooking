<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/admin.css">
    <link rel="stylesheet" href="../Css/button.css">
    <link rel="stylesheet" href="../Css/News.css">
    <link rel="stylesheet" href="../Css/tables.css">
    <link rel="stylesheet" href="../Css/bookings.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../Css/account.css">

    <title>Trang Chủ | ADMIN</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="hv_menu">
            <ion-icon name="menu-outline"></ion-icon>
            </div>
                <ul>
                    <li><a href="../index.php">
                    <ion-icon name="home-outline"></ion-icon>
                        HOME</a></li>
                    <li><a href="./index.php?goto=listCates">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ LOẠI PHÒNG</a></li>
                    <li><a href="index.php?goto=listRooms">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ PHÒNG</a></li>
                    <li><a href="bookings/listBookings.php">
                    <ion-icon name="settings-outline"></ion-icon>
                    
                        QUẢN LÝ ĐẶT PHÒNG</a></li>
                    <li><a href="#">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ BÌNH LUẬN</a></li>
                   
                    <li><a href="index.php?goto=listAcc">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ TÀI KHOẢN</a></li>
                    <li><a href="index.php?goto=listNews">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ TIN TỨC</a></li>
                    <li><a href="index.php?goto=listContact">
                    <ion-icon name="settings-outline"></ion-icon>
                        QUẢN LÝ Hỗ trợ</a></li>
                    <li><a href="index.php?goto=thongke">
                    <ion-icon name="settings-outline"></ion-icon>
                        Thống kế</a></li>
                        <div class="login">
            
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
                        
                    <?php } ?>
               
                    </div>
                </ul>
                
        
            </div>
        
        </header>
        <div class="conten">
            <p> TRANG ADMIN </p>
        </div>
        
        
</body>
</html>