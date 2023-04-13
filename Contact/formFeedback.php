<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/account.css">
    <title>Thank you | Agoda</title>
</head>

<body>
    <div class="form-main">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            ?>
            <form action="index.php?goto=btnFeedBack" method="post">
                <h2 style="font-weight: bold;text-align:center;">HÃY ĐỂ LẠI ĐIỀU BẠN CẦN HỖ TRỢ</h2>
                <div class=" form-info">
                    Họ tên <br>
                    <input class="input" type="text" value="<?= $ho_ten ?>" name="ten_ht" required placeholder="Họ tên">
                </div>
                <div class="form-info">
                    Nội dung <br>
                    <input class="input" type="text" name="noi_dung" required placeholder="Tên đăng nhập">
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn6-hover btn5" type="submit" value="Gửi hỗ trợ" name="btn_feedBack">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>

</html>