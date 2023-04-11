<?php
if (isset($oneRoom)) {
    extract($oneRoom);
}

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
        
    </div>

    <div class="review_details">
        <div class="introduce">
            <div class="nameroom">
                <div class="icon_home">
                    <i class="fa-solid fa-heart"></i>
                    <span>Thông tin phòng</span>
                </div>
                <div class="detail-room_header">
                    <?php 
                        $item = getOneItem($ma_lp);
                        extract($item);
                    ?>
                    <h3 class="detail-room_title">Thể loại: <?= $ten_lp ?></h3>
                    <h3 class="detail-room_title">
                        Tên phòng: <?= $ten_phong ?>
                    </h3>
                </div>
            </div>
        <!-- Comments -->
            <div class="row_product">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#binhluan").load("./Comment/commentForm.php", { ma_lp:<?= $ma_phong ?>})
                    });
                </script>
                <div>
                    <span id="binhluan"></span>
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
             <?php
                extract($oneRoom);
                $listBookings = getListBookings($ma_phong);
            ?>
            <div class="table-booking">
                <h3 class="table-booking__title">Lịch đặt phòng</h3>
                <p class="table-booking__title">( 5 đơn gần nhất )</p>
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
   <section class="list-rooms">
        <div class="sub_container">
            <div class="rooms-title">
                <h2 class="">PHÒNG GỢI Ý CÙNG LOẠI PHÒNG</h2>
            </div>
            <div class="row-rooms">
                <?php
                foreach ($listSameRooms as $phong) {
                    extract($phong);
                    ?>
                    <div class="body-item">
                        <a href="index.php?goto=detaiRooms_booking&id=<?= $ma_phong ?>">
                            <img src=".//<?= $avatar ?>" alt=""></a>
                        <div class="">
                            <h3>
                                <?= $ten_phong ?>
                            </h3>
                            <em>Giá mỗi đêm rẻ từ</em>
                            <p>
                                <?= number_format($gia, 0, ',', '.') ?> vnđ/1 đêm
                            </p>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </section>
</div>

</div>
