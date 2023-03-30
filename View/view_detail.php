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
        <div class="show_price">
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
        </div>
    </div>
    <div class="review_details">
        <div class="introduce">
            <div class="nameroom">
                <div class="icon_home">
                    <i class="fa-solid fa-heart"></i>
                    <span>toàn bộ phòng cùng loại</span>
                </div>
                <?php 
                    foreach ($listSameRooms as $room) {
                        extract($room);?>
                    <h3><?= $ten_phong ?></h3>
                    <div class="mo_ta">
                        <div class="hr">
                            <div class="sider_line">
                            </div>
                        </div>
                        <div class="content">
                            <span><?= $mo_ta ?></span>
                        </div>
                    </div>
                    <?php }?>
            </div>
        </div>
        <div class="bookroom">

        </div>
    </div>
    <div class="box-comment">
        <h4>Bình luận </h4>
        <form action="" method="post">
            <div class="comment">
                <textarea title="Nội dung" name="noi_dung" id="binh_luan" placeholder="Nội dung. Tối thiểu 15 ký tự *" style="resize:none;" required></textarea>
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
</div>