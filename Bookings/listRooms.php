<body>
    <div class="container">
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
                        <?= substr($mo_ta, 0, 100) ?>
                    </p>
                    <span class="price-item">
                        <?php if ($giam_gia == 0) {
                            $format_number_4 = number_format($gia, 0, ',', '.');
                            echo 'Giá: ' . $format_number_4 . 'vnđ / đêm';
                        } else { ?>
                            <h4 style="text-decoration-line:line-through; color:black">
                                <?php
                                $format_number_4 = number_format($gia, 0, ',', '.');
                                echo 'Giá:' . $format_number_4 . 'vnđ / đêm' . '<br>'; ?>
                            </h4>
                            <?php
                            $format_number_3 = number_format($giam_gia, 0, ',', '.');
                            echo 'Giá: ' . $format_number_3 . 'vnđ / đêm';
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