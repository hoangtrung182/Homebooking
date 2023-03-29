<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/account.css">
    <title>Document</title>
</head>

<body>
    <div class="form-login">
        <div class="login">
            <?php
            if (isset($_SESSION['ten_tk']) && (is_array($_SESSION['ten_tk']))) {
                extract($_SESSION['ten_tk']);
            ?>
                <div class="pane">
                    <div class="left-pane">
                        <ul>
                            <img src="<?= $avatar ?>" style="width: 450px; height: 500px;margin-top:60px;
            text-align:center;" alt="">

                            <!-- <li><a href="">Thông tin tài khoản</a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li> -->
                        </ul>
                    </div>
                    <div class="form-main">
                        <form action="index.php?goto=editUser" method="post">
                            <h3>Hồ sơ của tôi</h3>
                            <div class="form-info">
                                Tên đăng nhập<br>
                                <input class="input" type="text" disabled name="ten_tk" value="<?= $ten_tk ?>" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="form-info">
                                Email <br>
                                <input class="input" type="email" disabled name="pass" value="<?= $email ?>" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-info">
                                Số điện thoại <br>
                                <input class="input" type="text" disabled name="phone" value="<?= $phone ?>" placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-info">
                                Địa chỉ <br>
                                <input class="input" type="text" disabled name="dia_chi" value="<?= $dia_chi ?>">
                            </div>
                            <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                            <input type="submit" value="Chỉnh sửa hồ sơ" name="editUser" class="btn6-hover btn5">
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <div class="form-main1">
                    <form action="index.php?goto=login" method="post">
                        <h3>Đăng nhập</h3>
                        <div class="form-info">
                            Tên đăng nhập<br>
                            <input class="input" type="text" name="ten_tk" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="form-info">
                            Mật khẩu <br>
                            <input class="input" type="password" name="pass" placeholder="Mật khẩu" required>
                        </div>
                        <input type="submit" value="Đăng nhập" name="login" class="btn6-hover btn5">
                    </form>
                    <div class="extra">
                        <a href="index.php?goto=register">Tạo tài khoản </a>
                        <a href="index.php?goto=forgetPass">Quên mật khẩu</a>
                    </div>
                    <?= isset($thongbao) ? $thongbao : '' ?>
                <?php } ?>
                </div>
        </div>
</body>

</html>