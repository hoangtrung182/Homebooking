<link rel="stylesheet" href="./Css/account.css">

<body>
    <div class="form-main12">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            extract($listUsers);
            ?>
            <form action="index.php?goto=editAcc" method="post">
                <h3 style="font-weight: bold;text-align:center;">Form chỉnh sửa</h3>
                <div class="form-info">
                    Tên đăng nhập <br>
                    <input class="input" type="text" name="ten_tk" value="<?= $ten_tk ?>" required>
                </div>
                <div class="form-info">
                    Họ tên <br>
                    <input class="input" type="text" name="ho_ten" value="<?= $ho_ten ?>" required>
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" name="email" value="<?= $email ?>" required>
                </div>
                <div class="form-info">
                    Số điện thoại <br>
                    <input class="input" type="text" name="phone" value="<?= $phone ?>" required>
                </div>
                <div class="form-info">
                    Địa chỉ <br>
                    <input class="input" type="text" name="dia_chi" value="<?= $dia_chi ?>" required>
                </div>
                <div class="form-info">
                    Vai trò <br>
                    <input class="input" type="text" name="vaitro" value="<?= $vai_tro ?>" required>
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn-6" type="submit" value="Cập nhật" name="editAcc">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>