
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
        <?php 
            if (isset($_SESSION['ten_tk']) && is_array($_SESSION['ten_tk'])) {
                extract($_SESSION['ten_tk']);
            }
        ?>
        <h2>Đổi mật khẩu</h2>
         <form action="index.php?goto=changepassword" method="post" enctype="multipart/form-data">
         	<div class="text_input">
                <input type="hidden" name="ten_tk" class="input_second" value="<?= $ten_tk ?>"><br>
            </div>
            <span class="notify_success">
                <?= isset($thongbaodung) ? $thongbaodung : '' ?>
            </span>
            <div class="text_input">
                <p class="input_title">Mật khẩu cũ</p>
                <input type="password" name="oldpass" class="input_second">
            </div>
            <!-- value="<?= $password ?> -->
            <div class="text_input">
                <p class="input_title">Mật khẩu mới</p>
                <input type="password" name="newpass1" class="input_second" ><br>
            </div>
            <div class="text_input">
                <p class="input_title">Xác nhận lại mật khẩu</p>
                <input type="password" name="newpass2" class="input_second" ><br>
            </div>
            <div class="button">
                <input type="hidden" name="id" value="<?= $ma_tk ?>">
                <input type="submit" value="Cập nhật" name="doimatkhau" class="input_button btn">
                <button class="btn"><a class="btn" href="index.php?goto=exit">Tiếp tục</a></button>
            </div>
            <span style="color:red;">
                <?= isset($thongbao) ? $thongbao : '' ?>
            </span>
    </section>
</body>

</html>