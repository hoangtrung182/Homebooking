<link rel="stylesheet" href="./Css/account.css">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
</head>

<body>
    <section class="form-main">
        <h3>Form lấy lại mật khẩu</h3>
        <form action="index.php?goto=forgetPass" method="post" enctype="multipart/form-data">
            <div class="text_input">
                <p class="input_title">Nhập tài khoản của bạn</p>
                <input type="text" name="ten_tk" class="input_second" placeholder="ví du: king"><br>
            </div>
            <div class="button">
                <input type="submit" value="Lấy lại" name="forgetPass" class="btn6-hover btn5">
                <input type="reset" class="btn6-hover btn5" value="Nhập lại">
                <button class="btn6-hover btn5"><a href="index.php?goto=exit">Tiếp tục</a></button>
            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
        </form>
    </section>
</body>

</html>