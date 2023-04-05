<?php
if (isset($oneRoom)) {
    extract($oneRoom);
}
// die;
// $listSameRooms = sameRoom($ma_lp);

// var_dump($listSameRoom);

?>

<div class="detail_room">
    <div class="detail_image">
        <div class="detail_img_main">
            <img src="./img/detail/1.jpg" alt="" class="img-main img-detail">
        </div>
        <div class="detail_img_extra">
            <img src="./img/detail/2.jpg" alt="" class="img-extra img-detail">
            <img src="./img/detail/3.jpg" alt="" class="img-extra img-detail bottom">
        </div>
        <div class="detail_img_extra">
            <img src="./img/detail/4.jpg" alt="" class="img-extra img-detail">
            <img src="./img/detail/5.jpg" alt="" class="img-extra img-detail bottom">
        </div>
        <div class="detail_img_extra">
            <img src="./img/detail/6.jpg" alt="" class="img-extra img-detail ">
            <img src="./img/detail/7.jpg" alt="" class="img-extra img-detail bottom">
        </div>
    </div>
    <div class="box_navbar">
        <div class="menu_group">
            <ul>
                <li class="navbar_menu" data-href=".show_price"><a href="">Tổng quan</a></li>
                <li class="navbar_menu"><a href="">Phòng nghỉ</a></li>
                <li class="navbar_menu"><a href="">Tiện nghi</a></li>
                <li class="navbar_menu"><a href="">Đánh giá</a></li>
                <li class="navbar_menu"><a href="">Vị trí</a></li>
                <li class="navbar_menu"><a href="">Chính sách</a></li>
            </ul>
        </div>
        <!-- <div class="show_price">
            <div class="show_price_right">
                <div class="navbar_backtotopnav">
                    <div class="sticky_nav_price">
                        <span class="span_style">
                            từ
                        </span>
                        <span class="span_price">
                            <?= number_format($gia, 0, ',', '.') ?>
                        </span>
                        <span class="span_price_detail">₫</span>
                    </div>
                    <div class="sticky_nav_price_button">
                        <button class="btn_showgia">
                            <span class="btn_span_showgia">xem giá</span>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="review_details">
        <div class="introduce">
            <div class="nameroom">
                <div class="icon_home">
                    <i class="fa-solid fa-heart"></i>
                    <span>toàn bộ phòng</span>
                </div>
                <?php
                foreach ($listSameRooms as $room) {
                    extract($room);
                } ?>
                <h3>
                    <?= $ten_phong ?>
                </h3>
                <div class="mo_ta">
                    <div class="hr">
                        <div class="sider_line">
                        </div>
                    </div>
                    <div class="content">
                        <span>
                            <?= $mo_ta ?>
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="bookroom">
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

                        </h2><span>vnđ / đêm</span>

                    </div>
                    <div class="time">
                        <input type="date" name="ngay_den" id="" class="first">
                        <span>đến</span>
                        <input type="date" name="ngay_ve" id="" class="last">
                    </div>
                    <div>
                        <a href="../../index.php?goto=pays">
                            <button class="btn-order" type="submit" name="dat">Đặt ngay</button>
                        </a>
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
                </form>
            </div>
        </div>
    </div>
    <div class="box-comment">
        <h4>Bình luận </h4>
        <form action="" method="post">
            <div class="comment">
                <textarea title="Nội dung" name="noi_dung" id="binh_luan" placeholder="Nội dung. Tối thiểu 15 ký tự *"
                    style="resize:none;" required></textarea>
            </div>
            <div class="send-comment">
                <button type="submit" name="submit">GỬI BÌNH LUẬN
                    <i class="fas fa-paper-plane" style="margin-right: 5px;"></i></button>
            </div>
        </form>
        <div class="item-comment">
            <h4>Khách hàng bình luận</h4>
            <!-- <?php
            $ma_hs = $_GET['chitiet_dp'];
            $allbl = $usermodel->show_binhluan($ma_hs);
            foreach ($allbl as $row) { ?>

                <div class="avatar-and-name">
                    <i class="fas fa-user-tie"></i>
                    <h5><?php echo $row['ten_kh'] ?> </h5>

                </div>
                <div class="detail-comment">
                    <p><?php echo $row['ngay_bl'] ?></p>
                    <p><?php echo $row['noi_dung'] ?></p>
                </div>

            <?php } ?> -->
        </div>
    </div>
    =======
    <?php
    extract($oneRoom);
    $listBookings = getListBookings($ma_phong);
    ?>
    <div class="table-booking">
        <h3 class="table-booking__title">Lịch đặt phòng</h3>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th width="200px">Ngày Đến</th>
                    <th></th>
                    <th width="200px">Ngày Về</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($listBookings) <= 0) { ?>
                    <tr>
                        <td>
                            <h5>Phòng chưa có người đặt</h5>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php
                    foreach ($listBookings as $tableBooking) {
                        extract($tableBooking); ?>
                        <tr id="table-bookings_row">
                            <td>
                                <?= $ngay_den ?>
                            <td>
                            <td>
                                <?= $ngay_ve ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

>>>>>>> 60c366168059af8333499057cd1f8501c189b388
</div>