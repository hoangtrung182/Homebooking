<?php
if (isset($oneRoom)) {
    extract($oneRoom);
}
    $nameCate = getNameItem($ma_lp);
    extract($nameCate);
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
            <div class="icon_home">
                <i class="fa-solid fa-heart"></i>
                <span>Thông tin chi tiết phòng</span>
            </div>
            <div class="detail-room_header">
                <h4 class="detail-room_title">Thể loại: <?= $ten_lp ?></h4>
                <h4 class="detail-room_title">Tên gọi: <?= $ten_phong ?></h4>
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

            <div class="icon_home">
                <i class="fa-solid fa-heart"></i>
                <span>Gợi ý các phòng cùng loại</span>
            </div>
            <div class="nameroom-list">      
                <?php
                foreach ($listSameRooms as $room) {
                    extract($room);
                    ?>
                    <a href="index.php?goto=detaiRooms_booking&id=<?= $ma_phong ?>" >
                        <h3 class="detail-room_name">
                            <?= $ten_phong ?>
                        </h3>
                        <div class="mo_ta">
                            <div class="hr">
                               <img src=".//<?= $avatar ?>" class="detail-room_image"  alt="<?= $ten_phong ?>">
                            </div>
                            <div class="content">
                                <span>
                                    <?= $mo_ta ?>
                                </span>
                            </div>
                        </div>
                    </a>

                <?php } ?>
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
                    if(count($listBookings) <= 0) { ?>
                        <tr>
                            <td>
                                <h5>Phòng chưa có người đặt</h5>
                            </td>
                        </tr>
                    <?php }else { ?>
                        <?php 
                            foreach ($listBookings as $tableBooking) {
                                extract($tableBooking); ?>
                                <tr id="table-bookings_row">
                                    <td><?= $ngay_den ?><td>
                                    <td><?= $ngay_ve ?></td>
                                </tr>
                            <?php }
                        ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
</div>