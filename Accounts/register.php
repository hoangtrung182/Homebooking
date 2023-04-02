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
    <div class="form-main">
        <div class="form-register">
            <form action="index.php?goto=register" method="post">
                <h2 style="font-weight: bold;text-align:center;">Đăng ký</h2>
                <div class="form-info">
                    Tên đăng nhập <br>
                    <input class="input" type="text" name="ten_tk" required placeholder="Tên đăng nhập">
                </div>
                <div class="form-info">
                    Email <br>
                    <input class="input" type="email" name="email" required placeholder="Email">
                </div>
                <div class="form-info">
                    Mật khẩu <br>
                    <input class="input" type="password" name="pass" required placeholder="Mật khẩu">
                </div>
                <div class="form-info">
                    Số điện thoại <br>
                    <input class="input" type="text" name="phone" placeholder="Số điện thoại">
                </div>
                <div class="submit">
                    <input class="btn6-hover btn5" type="submit" value="Đăng ký" name="btn-register">
                    <button class="btn6-hover btn5">
                        <a style="text-decoration: none;" href="index.php?goto=login">Đăng nhập</a>
                    </button>
                </div>
            </form>
            <?= isset($thongbao) ? $thongbao : '' ?>
        </div>
    </div>
</body>

</html>