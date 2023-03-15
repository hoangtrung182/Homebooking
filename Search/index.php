 <nav class="nav">
    <div class="icon1">
        <img src="https://img.agoda.net/images/INTTRV-45/default/Bags-heart_2021-09-30.svg" alt="">
    </div>
    <div class="nav-content">
        <p>Traveling internationally? Get updated information on COVID-19 travel guidance and restrictions.</p>
    </div>
    <div class="learn-more">
        <a href=""><button class="btn1">learnmore</button></a>
    </div>
</nav>
<div class="background">
    <div class="title-h1">
        <h1>KHÁCH SẠN, KHU NGHỈ DƯỠNG, KÍ TÚC XÁ & HƠN THẾ NỮA</h1>
        <p>Nhận giá tốt nhất trên hơn 2.000.000 tài sản, trên toàn thế giới</p>
    </div>
    <div class="box">
        <div class="box-button">
            <div class="box-1">
                <button class="box-2">Nghỉ qua Đêm </button>
            </div>
            <div class="box-3">
                <button class="box-4">Lưu trú sửa dụng trong ngày</button>
            </div>
        </div>
         <form action="index.php?goto=search" method="post">
            <!-- <select class="option" name="keyw" id="">
                <option value="">
                    <ion-icon name="people-outline"></ion-icon> Vui Lòng Chọn Phòng !!
                </option>
                <option value="">2 Phòng Lớn</option>
                <option value="">Cặp Đôi</option>
                <option value="">Phòng Gia Đình</option>
                <option value="">Phòng Đơn</option>
            </select> -->
            <select name="maloai" name="keyw" id="" class="input_second">
                <?php foreach ($listCates as $loaiphong) {
                    extract($loaiphong);
                     ?>
                    <option value="<?= $ma_lp ?>">
                        <?= $ten_lp ?>
                    </option>
                <?php } ?>
            </select><br>
            <input type="submit" class="tk" value="Tìm kiếmsss" name='search'>
            <!-- <button class="tk">TÌM KIẾM</button> -->
        </form>
    </div>
</div>

<section class="list-rooms">
    <div class="sub_container">
        <div class="rooms-title">
            <h2 class="">Những phòng tốt gợi ý cho bạn</h2>
        </div>
        <div class="row-rooms">
            <?php 
                foreach ($listRooms as $phong) {
                    extract($phong);
                 ?>
                    <div class="room-item">
                        <img src="<?= $avatar ?>" alt="">
                        <div class="room-info">
                            <h3><?= $ten_phong ?></h3>
                            <em>Giá mỗi đêm rẻ từ</em>
                            <p><?= number_format($gia,0,',','.')?> VND</p>
                        </div>
                    </div>
                <?php }
             ?>
        </div>
    </div>
</section>