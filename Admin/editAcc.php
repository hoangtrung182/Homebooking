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
</body>