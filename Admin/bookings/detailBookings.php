<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/style.css">
    <link rel="stylesheet" href="../../Css/booking.css">
</head>
<style>
    .container_pay {
        max-width: 700px;
        margin: auto;
        padding: 20px;
        border: 2px solid #23958fd4;
        border-radius: 10px;
        margin-top: 80px;
        box-shadow: 6px 8px 7px #24232329;
    }

    .content-ticket2 {
        display: grid;
        grid-template-columns: 2fr 1fr;
        margin-top: 20px;
    }

    .title-item h5 {
        font-size: 20px;
        font-weight: 500;
        color: black;
        line-height: 0;
        padding: 10px 0;
    }

    .details-item h3 {
        font-size: 20px;
        font-weight: 500;
        color: red;
        /* padding: 0 20px; */

    }

    .money h3 {
        color: red;
    }

    .content-ticket1 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
</style>
<body>
    <div class="container_detail">
        <div class="container_pay">
            <div class="content-ticket1">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Tên phòng</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?= $show['ten_phong'] ?>
                        </h3>
                    </div>
                </div>
                <!-- Loai Phong -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Loại phòng</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?= $show['ten_lp']; ?>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="content-ticket1">
                <!-- Ho ten -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Họ và tên</h5>
                    </div>

                    <?php $user = getOneAccount($show['ma_tk']) ?>
                    <div class="details-item">
                        <h3>
                            <?= $user['ho_ten']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
                <!-- Trạng thái -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Trạng thái</h5>
                    </div>
                    <div class="money">
                        <?php



                        if ($show['trang_thai'] == 0) {
                            if ($show['ngay_den'] < $date) {
                                echo "<div class='ron2'><h3>Đã quá thời gian xác nhận!</h3></div>";
                            } else if ($show['ngay_den'] >= $date) {
                                echo "<div class='ron1'><h3>Sắp diễn ra!!</h3></div>";
                            }
                        } else if ($show['trang_thai'] == 1) {
                            if ($show['ngay_den'] <= $date && $show['ngay_ve'] >= $date) {
                                echo "<div class='ron3'><h3>Đang diễn ra!</h3></div>";

                            }
                        } else if ($show['trang_thai'] == 2) {
                            if ($date >= $show['ngay_ve']) {
                                echo "<div class='ron1'><h3>Đã kết thúc!</h3></div>";
                            }
                        } else if ($show['trang_thai'] == 3) {
                            echo "<div class='ron1'><h3>Đã hủy!</h3></div>";
                        }
                        ?>
                        </td>
                        </tr>

                    </div>
                </div>
            </div>
            <!-- End item-ticket -->

            <!-- Time and bill -->
            <div class="content-ticket1">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Ngày đến</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?= $show['ngay_den']; ?>
                        </h3>
                    </div>
                    <!-- End item-ticket -->
                    <div class="item-ticket">
                        <div class="title-item">
                            <h5>Ngày về</h5>
                        </div>
                        <div class="details-item">
                            <h3>
                                <?= $show['ngay_ve']; ?>
                            </h3>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                </div>

                <div class="content-ticket2">
                    <!-- Thành tiền -->
                    <div class="item-ticket">
                        <div class="title-item">
                            <h5>Tổng tiền</h5>
                        </div>
                        <div class="money">
                            <h3>
                                <?php $format_number_4 = number_format($show['thanh_tien'], 0, ',', '.');
                                echo $format_number_4 . ' ' . 'vnđ'; ?>
                            </h3>
                        </div>
                    </div>
                    <!-- End item-ticket -->
                </div>
            </div>
        </div>
</body>

</html>