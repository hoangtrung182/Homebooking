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
            <form action="index.php?goto=manageUsers" method="post">
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

    <body>
        <section class="main">
            <h2>Form chỉnh sửa tài khoản</h2>
            <?php
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
            ?>
            <form action="index.php?goto=editAcc" method="post">

                <div class="text_input">
                    <p class="input_title">Tên khách hàng</p>
                    <input type="text" name="ten_tk" class="input_second" value="<?= $ten_tk ?>">
                </div>
                <div class="text_input">
                    <p class="input_title">Email</p>
                    <input type="email" name="email" class="input_second" value="<?= $email ?>"><br>
                </div>
                <div class="text_input">
                    <p>Password</p>
                    <input type="password" name="pass" class="input_second" value="<?= $pass ?>"><br>
                </div>
                <div class="text_input">
                    <p>Số điện thoại</p>
                    <input type="number" name="phone" class="input_second" value="<?= $avatar ?>"><br>
                </div>
                <div class="text_input">
                    <p>Vai trò</p>
                    <input type="text" name="vai_tro" class="input_second" value="<?= $vai_tro ?>"><br>
                </div>
                <div class="button">
                    <input type="hidden" name="id" value="<?= $ma_tk ?>">
                    <input type="submit" value="Cập nhật" name="editAcc" class="input_button btn">
                    <input type="reset" class="btn" value="Nhập lại">
                    <button class="btn"><a class="btn" href="index.php?goto=exit">Tiếp tục</a></button>
                </div>
                <span style="color:red;">
                    <?= isset($thongbao) ? $thongbao : '' ?>
                </span>
            </form>
        </section>
        >>>>>>> 3d909804100fb22cbd4128b6ffe3e515359824b6
    </body>