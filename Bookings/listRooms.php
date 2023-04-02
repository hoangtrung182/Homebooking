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
        </header> -->
        <h2 class="form_title">DANH SÁCH PHÒNG</h2>
        <div class="rows">

            <?php foreach ($listRooms as $room) {
                extract($room);
                ?>
                <div class="item">
                    <div>
                        <a href="">
                            <img src=".//<?= $avatar ?>" alt="" width="300px" height="200px">
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
                        <a href="index.php?goto=detaiRooms_booking&id=<?= $ma_phong ?>">
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