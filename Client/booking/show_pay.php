<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/booking.css">
</head>

<body>
    <div class="line-bot">
        <div class="content-ticket1">
            <div class="title-item">
                <h5>Tên phòng</h5>
            </div>
            <div class="details-item">
                <h3>
                    <?= $listPay['ten_phong'] ?>
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
                        <?= $listPay['ten_kh']; ?>
                    </h3>
                </div>
            </div>
            <!-- End item-ticket -->
            <div class="item-ticket">
                <div class="title-item">
                    <h5>Loại phòng</h5>
                </div>
                <div class="details-item">
                    <h3>
                        <?= $listPay['ten_lp']; ?>
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
                        <?= $listPay['ngay_den']; ?>
                    </h3>
                </div>

                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Ngày về</h5>
                    </div>
                    <div class="details-item">
                        <h3>
                            <?= $listPay['ngay_ve']; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
            </div>

            <div class="content-ticket2">
                <div class="item-ticket">
                    <div class="title-item">
                        <h5>Tổng tiền</h5>
                    </div>
                </div>
                <!-- End item-ticket -->
                <div class="item-ticket">
                    <div class="details-item">
                        <h3>
                            <?php $format_number_4 = number_format($listPay['tong_tien'], 0, ',', '.');
                            echo $format_number_4 . 'vnđ'; ?>
                        </h3>
                    </div>
                </div>
                <!-- End item-ticket -->
            </div>
        </div>
</body>

</html>