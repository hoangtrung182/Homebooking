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
    <h2 class="form_title">DANH SÁCH PHÒNG</h2>
    <div class="rows">

        <?php foreach ($listRooms_booking as $room) {
            extract($room); ?>
            <div class="item">
                <div>
                    <a href="">
                        <img src="<?= $room['avatar'] ?>" alt="" width="100%">
                    </a>
                </div>
                <h3>
                    <?= $room['ten_phong'] ?>
                </h3>
                <p>
                    Loại phòng:
                    <?= $room['ten_lp'] ?>
                </p>
                <p>
                    <?= substr($room['mo_ta'], 0, 200) ?>
                </p>
                <span class="price-item">
                    <?php if ($room['giam_gia'] == 0) {
                        $format_number_4 = number_format($room['gia'], 0, ',', '.');
                        echo $format_number_4 . 'vnđ/đêm';
                    } else { ?>
                        <h4 style="text-decoration-line:line-through; color:black">
                            <?php
                            $format_number_4 = number_format($room['gia'], 0, ',', '.');
                            echo $format_number_4 . 'vnđ/đêm' . '<br>'; ?>
                        </h4>
                        <?php
                        $format_number_3 = number_format($room['giam_gia'], 0, ',', '.');
                        echo $format_number_3 . 'vnđ/đêm';
                    } ?>
                </span>
                <a href="./index.php?goto=detailRooms&id=<?= $room['ma_phong']; ?>"><button class="btn-order1"
                        type="submit">Đặt ngay</button></a>
            </div>
        <?php } ?>
    </div>

    </div>
</body>

</html>