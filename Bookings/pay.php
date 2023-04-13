<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
</head>

<body>
    <div class="container">
        <div class="main_pay">
            <div class="column1">
                <h2 class="form_title">Thông tin đặt phòng</h2>
                <div class="type-homestay">
                    <h5>Loại phòng</h5>
                    <p>
                        <?= $_SESSION['datphong']['ten_lp']; ?>
                    </p>
                </div>
                <div class="time-book-homestay">
                    <h5>Thời gian đặt phòng</h5>
                    <p>
                        <?= $_SESSION['datphong']['ngay_dat']; ?>
                    </p>
                </div>
                <div class="box-check-in-out">
                    <div class="check-in-date">
                        <hr class="line-green">
                        <span>Nhận phòng</span>
                        <p>
                            <?php echo $_SESSION['datphong']['ngay_den']; ?>
                        </p>
                    </div>

                    <div class="check-out-date">
                        <hr class="line-orange">
                        <span>Trả phòng</span>
                        <p>
                            <?php echo $_SESSION['datphong']['ngay_ve']; ?>
                        </p>
                    </div>
                </div>

                <div class="rulers-text">
                    <h5>Trách nhiệm vật chất</h5>
                    <span>Khách hàng chịu mọi trách nhiệm thiệt hại về tài sản đã gây ra tại chỗ ở trong thời gian lưu
                        trú.</span>
                </div>

                <div class="rulers-text">
                    <h5>Nội quy chỗ ở</h5>
                    <span>Hạn chế làm ồn sau 10 giờ tối. Không hút thuốc ở khu vực chung.</span>
                </div>

                <div class="title-your-information">
                    <h2 class="form_title">Thông tin của bạn</h2>
                </div>
                <?php
                if (isset($_SESSION['ten_tk'])) {
                    extract($_SESSION['ten_tk']);
                }
                ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label>Tên khách hàng <span style="color:red;">*</span></label>
                        <input type="text" name="ten_kh" value="<?= $_SESSION['ten_tk']['ten_tk'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại<span style="color:red;">*</span></label>
                        <input type="text" name="sdt" value="<?= $_SESSION['ten_tk']['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ<span style="color:red;">*</span></label>
                        <input type="text" name="dia_chi" value="<?= $_SESSION['ten_tk']['dia_chi'] ?>">
                    </div>
                    <div class="form-group">
                        <?php if (isset($_SESSION['ten_tk'])) { ?>
                            <label>Khuyến mãi</label>
                            <input type="text" name="ma_km" value="<?= $khuyen_mai ?>" readonly>
                            <?php
                            $sl = Client_loyal($_SESSION['ten_tk']['ma_tk']);
                            if ($sl > 10) {
                                $ma_km = 2;
                                update_taikhoan($_SESSION['ten_tk']['ma_tk'], $ma_km);
                            } ?>
                        <?php } else { ?>
                            <span>Vui lòng đăng nhập để nhận khuyến mãi!</span>
                        <?php } ?>

                    </div>
                    <div class="">
                        <button type="submit" name="dat_phong" class="btn-order2">Đặt phòng</button>
                    </div>
                </form>

            </div>
            <div class="column2">
                <div class="title-details-homestay">
                    <h2 class="form_title">Chi tiết đặt phòng</h2>
                </div>
                <div class="details-homestay">
                    <div class="box-1">
                        <div class="name-homestay">
                            <h4>
                                <?= $_SESSION['datphong']['ten_phong'] ?>
                            </h4>
                        </div>
                        <div class="img-homestay">
                            <img src=".//<?= $_SESSION['datphong']['avatar'] ?>" alt="" width="200px">
                        </div>
                    </div>

                    <div class="box-2x">
                        <span style="margin-left: 24px">Check in</span>
                        <span style="margin-left: 115px">Check out</span>
                        <div class="date-book">
                            <i class="bi bi-calendar-check"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar-check" viewBox="0 0 16 16">
                                <path
                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            <!-- <span>Check in</span> -->
                            <span class="date-in">
                                <?= $_SESSION['datphong']['ngay_den'] ?>
                            </span>
                            <span>-</span>
                            <!-- <span>Check out</span> -->

                            <span class="date-out">
                                <?= $_SESSION['datphong']['ngay_ve'] ?>
                            </span>

                        </div>
                    </div>

                    <div class="box-3">
                        <div class="total-price">
                            <span class="total">Tổng tiền</span>
                            <span class="price">
                                <?php $format_number_4 = number_format($_SESSION['datphong']['tong_tien'], 0, ',', '.');
                                echo $format_number_4; ?> vnđ
                            </span>
                        </div>
                    </div>

                </div>
                <div>
                    <?php
                    $thongbao = isset($thongbao) ? $thongbao : '';
                    $thongbao_delete = isset($thongbao_xoa) ? $thongbao_xoa : '';
                    ?>
                    <h4 class="" style="color:red;  padding: 10px 0;">
                        <?= $thongbao ?>
                    </h4>
                    <p class="">
                        <?= $thongbao_delete ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>