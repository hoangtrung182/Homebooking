<?php
include '../model/pdo.php';
include '../model/binhluan.php';
include '../model/khachhang.php';
session_start();
$idpro = $_REQUEST['idpro'];
$list_bl = selectList_comments($idpro);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
</head>
<body>
    <div class="box">
        <h3>BÌNH LUẬN</h3>
        <div class="binhluan">
            <ul class="comments-list__menu">
                <?php
                foreach ($list_bl as $bl) {  extract($bl);
                    ?>
                    <?php
                        $user = loadOne_user($ma_khach_hang);
                        extract($user);
                    ?>
                    <li class="list-comment">
                        <ul>
                            <li><h4 class="comment-name"><?= $ten_khach_hang ?></h4></li>
                            <li>
                                <div class="row-in-comment">
                                    <p><?= $noi_dung ?></p>
                                    <p><?= $khoang_thoi_gian ?></p>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } 
                ?>
            </ul>
        </div>

        <br>
        <div>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="idpro" hidden value="<?= $idpro ?>">
                <textarea class="comment-area" cols="100" rows="4" placeholder="Hãy bình luận gì đó..." name="mess"></textarea>
                <input type="submit" class="btn" value="Gửi bình luận" name="btnComment">
            </form>
        </div>
        <?php
        if (isset($_POST['btnComment']) && $_POST['btnComment']) {
            $iddrop = $_POST['idpro'];
            $noi_dung = $_POST['mess'];
            $ma_khach_hang = $_SESSION['user']['ma_khach_hang'];
            $khoang_thoi_gian = date('d/m/Y');

            insert_comments($noi_dung, $ma_khach_hang, $idpro, $khoang_thoi_gian);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } ?>
    </div>
</body>

</html>