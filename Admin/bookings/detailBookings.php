<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/booking.css">
</head>
<style>
    .line-bot {
        max-width: 700px;
        margin: auto;
        padding: 20px;
        border: 2px solid #23958fd4;
        border-radius: 10px;
        margin-top: 80px;
        box-shadow: 6px 8px 7px #24232329;
    }

    .edit {
        max-width: 500px;
    }

    .edit a {
        text-decoration: none;
        color: #fff;
        /* padding: 10px 15px; */
        background-color: #23958fd4;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .title-item h5 {
        font-size: 20px;
        font-weight: 500;
        color: black;
        line-height: 0;
    }

    .details-item h3 {
        font-size: 20px;
        font-weight: 500;
        color: red;
    }
</style>

<body>
    <div class="line-bot">

        <div class="content-ticket1">
            <div class="title-item">
                <h5>Tên phòng</h5>
            </div>
            <div class="details-item">
                <h3>
                    <?php echo $show['ten_phong'] ?>
                </h3>
            </div>
        </div>
        <div class="content-ticket2">
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Họ và tên</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php echo $show['ten_kh']; ?>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Số điện thoại</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php echo $show['phone']; ?>
                    </h3>
                </div>
            </div>
        </div>
        <!-- End item-ticket -->
        <div class="content-ticket2">
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Ngày đến</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php echo $show['ngay_den']; ?>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Ngày về</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php echo $show['ngay_ve']; ?>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
            <!-- End item-ticket -->
            <!-- <div class="item-ticket">
                <div class="title-item">
                    <h5>Giờ đặt thêm(nếu có):</h5>
                </div>
                <div class="details-item">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $show['ma_dp'] ?>">
                        <input type="number" name="gio" id="" min='0'>
                        <button type="submit" name="them_gio">Xác nhận</button>
                    </form>
                </div>
            </div> -->
            <!-- End item-ticket -->
        </div>

        <!-- End item-ticket -->
        <div class="content-ticket2">
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Loại phòng</h5>
                    <div class="details-item">
                        <h3>
                            <?php echo $show['ten_lp']; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Tổng tiền</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?php $format_number_4 = number_format($show['thanh_tien'], 0, ',', '.');
                        echo $format_number_4 . 'vnđ'; ?>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
        </div>
        <div class="content-ticket2">
            <div class="item-ticket">
                <div class="title-item">
                    <h5></h5>
                    <div class="details-item">
                        <h3></h3>
                    </div>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="item-ticket">
                <div class="title-item">
                    <h5></h5>
                </div>
                <div class="details-item">
                    <h3 class="edit">

                        <a
                            href="index.php?goto=detailBookings&id_checkin=<?= $show['ma_dp'] ?>&update_trangthai=<?= $show['ma_dp'] ?>">Check_in</a>
                        <a
                            href="index.php?goto=detailBookings&id_checkout=<?= $show['ma_dp'] ?>&update_trangthai=<?= $show['ma_dp'] ?>">Check_out</a>
                        <a
                            href="index.php?goto=detailBookings&huy=<?= $show['ma_dp'] ?>&update_trangthai=<?= $show['ma_dp'] ?>">Hủy</a>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
        </div>
    </div>

</body>

</html>