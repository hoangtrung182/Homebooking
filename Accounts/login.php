<div class="form-login">
    <div class="login">
        <?php
        if (isset($_SESSION['ten_tk'])) {
            extract($_SESSION['ten_tk']);
        ?>
            <ul>
                <div>
                    <!-- <li><a href="#">Admin</a></li> -->
                    <li><a href="index.php?goto=logout">Thoát</a></li>
                </div>
            </ul>
    </div>
<?php } else { ?>
    <form action="index.php?goto=login" method="post">
        <div class="form-info">
            Tên đăng nhập <br>
            <input type="text" name="ten_tk">
        </div>
        <div class="form-info">
            Mật khẩu <br>
            <input type="password" name="pass">
        </div>
        <div class="form-info">
            <input type="checkbox"> Ghi nhớ tài khoản <br>
        </div>
        <input type="submit" value="Đăng nhập" name="login">
    </form>
    <?= isset($thongbao) ? $thongbao : '' ?>
<?php } ?>

</div>