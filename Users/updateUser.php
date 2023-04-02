<link rel="stylesheet" href="./Css/account.css">

<body>
    <div class="form-main12">
        <div class="form-register">
            <?php
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            // extract($listUsers);
            ?>
            <form action="index.php?goto=updateUser" method="post" enctype="multipart/form-data">
                <h3 style="font-weight: bold;text-align:center;">Hồ sơ của tôi</h3>
                <div class="form-info">
                    Họ tên <br>
                    <input class="input" type="text" name="ho_ten" value="<?= $ho_ten ?>" required
                        placeholder="Tên đăng nhập">
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
                    Ảnh đại diện <br>
                    <input class="input" type="file" name="avatar" value="<?= $anh_dai_dien ?>">
                </div>
                <div class="form-info">
                    Địa chỉ <br>
                    <input class="input" type="text" name="dia_chi" value="<?= $dia_chi ?>" required
                        placeholder="Mật khẩu">
                </div>
                <div class="submit">
                    <input type="hidden" name="ma_tk" value="<?= $ma_tk ?>">
                    <input class="btn6-hover btn5" type="submit" value="Cập nhật" name="updateUser">
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>