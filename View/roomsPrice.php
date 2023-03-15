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
            <div class="form-container">
             <form action="index.php?search=cate" method="post" class="form_search">
                <label class="form_label" for="">Tìm kiếm theo loại phòng</label><br>
                <select name="keyw" id="" class="input_third">
                    <option value="0">Chọn loại phòng</option>
                    <?php foreach ($listCates as $loaiphong) {
                        extract($loaiphong);
                         ?>
                        <option value="<?= $ma_lp ?>">
                            <?= $ten_lp ?>
                        </option>
                    <?php } ?>
                </select><br>
                <input type="submit" class="tk" value="TÌM KIẾM" name='search'>
            </form>
            <form action="index.php?search=price" method="post">
                <label class="form_label" for="">Tìm kiếm theo giá</label><br>
                <select name="price_chose" id="" class="input_third">
                    <option value="" selected>Sắp xếp giá theo</option>
                    <option value="1">Giá từ cao đến thấp</option>
                    <option value="2">Giá từ thấp đến cao</option>
                </select><br>
                <input type="submit" class="tk" value="TÌM KIẾM" name='search'>
            </form>
        </div>
        </div>
    </div>
    <section class="list-rooms">
        <div class="sub_container">
            <div class="">
                <h2 class="form_title">Các kết quả tìm kiếm</h2>
            </div>
            <div class="row-rooms">
                <?php 
                    foreach ($listRoomsByPrice as $phong) {
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
        <div class="rooms-title">
            <h2 class="">Những phòng tốt gợi ý cho bạn</h2>
        </div>
    </section>