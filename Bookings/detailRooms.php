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


<body>
    <div class="container">

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
                    </h2><span>vnđ/đêm</span>
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
</body>

</html>