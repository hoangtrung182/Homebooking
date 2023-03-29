<link rel="stylesheet" href="./Css/account.css">

<body>
    <div class="form-main">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            extract($listUsers);
            ?>
            <form action="index.php?goto=editAcc" method="post">
                <h3>Đăng ký</h3>
                <div class="form-info">
                    Tên đăng nhập <br>
                    <input class="input" type="text" name="ten_tk" value="<?= $ten_tk ?>" required placeholder="Tên đăng nhập">
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" name="email" value="<?= $email ?>" required placeholder="Email">
                </div>
                <div class="form-info">
                    Số điện thoại <br>
                    <input class="input" type="text" name="phone" value="<?= $phone ?>" required placeholder="Mật khẩu">
                </div>
                <div class="form-info">
                    Vai trò <br>
                    <input class="input" type="text" name="vaitro" value="<?= $vai_tro ?>" placeholder="Mật khẩu" required>
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn2-hover btn5" type="submit" value="Cập nhật" name="editAcc">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>