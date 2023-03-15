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
         <form action="">
            <input class="Email" type="email" placeholder="Enter Your Email Id">

            <input class="date" type="date" id="start" name="trip-start" value="2023-03-22"
                min="2023-01-01" max="2023-12-31">
            <input class="date-2" type="date" id="start" name="trip-start" value="2023-03-13"
                min="2023-01-01" max="2023-12-31">
            <select class="option" name="" id="">
                <option value="">
                    <ion-icon name="people-outline"></ion-icon> Vui Lòng Chọn Phòng !!
                </option>
                <option value="">2 Phòng Lớn</option>
                <option value="">Cặp Đôi</option>
                <option value="">Phòng Gia Đình</option>
                <option value="">Phòng Đơn</option>
            </select>
            <button class="tk">TÌM KIẾM</button>
        </form>
    </div>
</div>
<section class="location-container">
    <div class="ctkm">
        <p>chương trình khuyến mại</p>
    </div>
    <div class="location">
        <div class="location-1">
            <p>các địa điểm thu hút</p>
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
    <div class="rooms-title">
        <h2 class="">Danh sách phòng có sẵn</h2>
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