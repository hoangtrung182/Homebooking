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
    <section class="main">
        <h2>Form lấy lại mật khẩu</h2>
        <form action="index.php?goto=forgetPass" method="post" enctype="multipart/form-data">
            <div class="text_input">
                <p class="input_title">Nhập lại địa chỉ Gmail</p>
                <input type="text" name="ten_tk" class="input_second" placeholder="ví du: abc@com.vn"><br>
            </div>
            <div class="button">
                <input type="submit" value="Lấy lại" name="forgetPass" class="input_button btn">
                <input type="reset" class="btn" value="Nhập lại">
                <button class="btn"><a class="btn" href="index.php?goto=exit">Tiếp tục</a></button>
            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
        </form>
    </section>
</body>

</html>