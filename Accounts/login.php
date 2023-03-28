<div class="form-login">
    <div class="login">
        <?php
        if (isset($_SESSION['ten_tk'])) {
            extract($_SESSION['ten_tk']);
            // $ten_tk = $_POST['ten_tk'];
            ?>
            <div>
                <!-- sin ttao <br> -->

            </div>
            <ul>
                <div>
                    <!-- <li><a href="#">Admin</a></li> -->
                    <li><a href="index.php?goto=logout">Thoát</a></li>
                    <li><a href="index.php?goto=forgetPass">Quên mật khẩu</a></li>
                </div>
            </ul>
        </div>
    <?php } else { ?>
        <div class="form-main">
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