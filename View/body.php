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
        <!-- Form -->

        <!-- Form mixed -->
         <form action="search.php?" method="get" class="form_search">
            <label class="form_label" for="">Tìm kiếm theo loại phòng</label><br>
            <select name="loaiphong" id="" class="input_third">
                <option value="">Chọn loại phòng</option>
                <?php foreach ($listCates as $loaiphong) {
                    extract($loaiphong);
                     ?>
                    <option value="<?= $ma_lp ?>">
                        <?= $ten_lp ?>
                    </option>
                <?php } ?>
            </select><br>
            <label class="form_label" for="">Tìm kiếm theo giá cả</label><br>
            <select name="price_chose" id="" class="input_third">
                <option value="" selected>Sắp xếp giá theo</option>
                <option value="desc">Giá từ cao đến thấp</option>
                <option value="asc">Giá từ thấp đến cao</option>
            </select><br>   
            <button class="tk">Tìm Kiếm</button>
            <!-- <button class="button-search">Tìm Kiếm</button> -->
        </form>
    </div>
</div>
<section class="location-container">
    <div class="ctkm">
        <p>chương trình khuyến mại</p>
    </div>
    <div class="location">
        <div class="location-1">
            <p>các địa điểm thu hút ở việt nam</p>
        </div>
        <div class="location-content">
            <div class="location-img">
                <img src="./img/image6.png" alt="">
                <h3>Hồ Chí Minh</h3>
                <p>14.320 chỗ ở</p>
            </div>
            <div class="location-img">
                <img src="./img/image7.png" alt="">
                <h3>Vũng Tàu</h3>
                <p>14.320 chỗ ở</p>
            </div>
            <div class="location-img">
                <img src="./img/image8.png" alt="">
                <h3>Đà Lạt</h3>
                <p>14.320 chỗ ở</p>
            </div>
            <div class="location-img">
                <img src="./img/image9.png" alt="">
                <h3>Hà Nội</h3>
                <p>14.320 chỗ ở</p>
            </div>
        </div>
    </div> 
</section>

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