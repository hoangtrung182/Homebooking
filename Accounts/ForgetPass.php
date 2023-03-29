<style>
    .form-main {
        margin-top: 60px;
        margin-left: 25%;
        width: 524px;
        background: #fff;
        padding: 16px 24px 24px 24px;
        border: 1px solid #fff;
        box-shadow: 5px 5px 5px 5px grey;
    }

    .form-main h3 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .input_title {
        margin-bottom: 10px;
        margin-left: 30px;
    }

    .btn6-hover {
        width: 100px;
        font-size: 15px;
        font-weight: 200px;
        color: #fff;
        cursor: pointer;
        margin: 10px 0 10px 0;
        height: 35px;
        border-radius: 3px;
        border: #fff;
        text-align: center;
        background-size: 200% 100%;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .btn6-hover:hover {
        background-position: 100% 0;
        -o-transition: all .4s ease-in-out;
        -webkit-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
    }

    .btn6-hover:focus {
        outline: none;
    }

    .btn6-hover.btn5 {
        background-image: linear-gradient(to right,
                #25aae1,
                #4481eb,
                #04befe,
                #3f86ed);
        box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
    }
</style>
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