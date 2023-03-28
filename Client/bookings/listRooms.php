
<?php
// session_start();
// include '../../Models/pdo.php';
// include '../../Models/bookings.php';
// // $listRooms_booking = selectRooms_booking();
// $listRooms = selectRooms_booking();


// date_default_timezone_set('ASIA/HO_CHI_MINH');
// $date = date('Y-m-d H:i:s');
?>


<body>
    <div class="container">
        <!-- <header class="header">
            <div class="logo">
                <a href="./">
                    <img src="https://cdn6.agoda.net/images/kite-js/logo/agoda/color-default.svg" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="listRooms.php">ĐẶT PHÒNG</a></li>
                    <li><a href="add_pay.php">THÔNG TIN PHÒNG ĐẶT</a></li>
                    <li><a href="index.php?goto=viewNews">TIN TỨC</a></li>
                    <li><a href="#">TÀI KHOẢN</a></li>
                    <li><a href="#">Apartments</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <li><a href="../Account/login.php"><button class="btn5-hover btn5">ĐĂNG NHẬP</button></a></li>
                    <li><a href="#"><button class="btn5-hover btn5">ĐĂNG KÝ</button></a></li>
                </ul>
            </div>
        </header> -->
        <h2 class="form_title">DANH SÁCH PHÒNG</h2>
        <div class="rows">

            <?php foreach ($listRooms as $room) {
                extract($room);
                ?>
                <div class="item">
                    <div>
                        <a href="">
                            <img src="./<?= $avatar ?>" alt="" width="300px" height="200px">
                        </a>
                    </div>
                    <h3>
                        <?= $ten_phong ?>
                    </h3>
                    <p>
                        Loại phòng:
                        <?= $ma_lp ?>
                    </p>
                    <p>
                        <?= substr($mo_ta, 0, 100) ?>
                    </p>
                    <span class="price-item">
                        <?php if ($giam_gia == 0) {
                            $format_number_4 = number_format($gia, 0, ',', '.');
                            echo $format_number_4 . 'vnđ/đêm';
                        } else { ?>
                            <h4 style="text-decoration-line:line-through; color:black">
                                <?php
                                $format_number_4 = number_format($gia, 0, ',', '.');
                                echo $format_number_4 . 'vnđ/đêm' . '<br>'; ?>
                            </h4>
                            <?php
                            $format_number_3 = number_format($giam_gia, 0, ',', '.');
                            echo $format_number_3 . 'vnđ/đêm';
                        } ?>
                    </span>
                    <div>
                        <a href="detailRooms.php?id=<?= $ma_phong ?>">
                            <button class="btn-order1" type="submit">
                                Đặt ngay
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>