<div class="form-register">
    <form action="index.php?goto=register" method="post">
        <div class="form-info">
            Tên đăng nhập <br>
            <input type="text" name="ten_tk" required>
        </div>
        <div class="form-info">
            Email <br>
            <input type="email" name="email" required>
        </div>
        <div class="form-info">
            Mật khẩu <br>
            <input type="password" name="pass" required>
        </div>
        <div class="form-info">
            Số điện thoại <br>
            <input type="text" name="phone">
        </div>
        <input type="submit" value="Đăng ký" name="register">
        <button><a style="text-decoration: none;" href="index.php?goto=login">Đăng nhập</a></button>
    </form>
    <?= isset($thongbao) ? $thongbao : '' ?>
</div>