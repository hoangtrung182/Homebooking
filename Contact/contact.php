<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/account.css">
    <title>Contact with us | Agoda</title>
</head>

<body>
    <div class="form-main">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            ?>
            <form action="index.php?goto=btnContact" method="post">
                <h2 style="font-weight: bold;text-align:center;">Đăng ký</h2>
                <div class=" form-info">
                    Họ tên <br>
                    <input class="input" type="text" name="ten_ht" required placeholder="Họ tên">
                </div>
                <div class="form-info">
                    Nội dung <br>
                    <input class="input" type="text" name="noi_dung" required placeholder="Tên đăng nhập">
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" name="email" required placeholder="Email">
                </div>
                <div class="form-info">
                    Số điện thoại <br>
                    <input class="input" type="text" name="phone" placeholder="Số điện thoại">
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn6-hover btn5" type="submit" value="Gửi hỗ trợ" name="btn_contact">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>

</html>