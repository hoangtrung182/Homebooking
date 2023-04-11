<nav class="nav">
    <div class="icon1">
        <img src="https://img.agoda.net/images/INTTRV-45/default/Bags-heart_2021-09-30.svg" alt="">
    </div>
    <div class="nav-content">
        <p>Traveling internationally? Get updated information on travel guidance and restrictions.</p>
    </div>
    <div class="learn-more">
        <a href=""><button class="btn1">Learn more</button></a>
    </div>
</nav>
<!-- Banner & Form tìm kiếm -->
<div class="background">
    <div class="title-h1">
        <h1>KHÁCH SẠN, KHU NGHỈ DƯỠNG, KÍ TÚC XÁ & HƠN THẾ NỮA</h1>
        <p>Nhận giá tốt nhất trên hơn 2.000.000 tài sản, trên toàn thế giới</p>
    </div>
    <div class="box">
        <!-- Form -->
        <form action="index.php?search=typerooms" method="post" class="form_search">
            <select name="loaiphong" id="" class="input_third">
                <option value="">Chọn loại phòng</option>
                <?php foreach ($listCates as $loaiphong) {
                    extract($loaiphong);
                    ?>
                    <option value="<?= $ma_lp ?>">
                        ` <?= $ten_lp ?> `
                    </option>
                <?php } ?>
            </select><br>
            <select name="price_chose" id="" class="input_third">
                <option value="" selected>Sắp xếp giá theo</option>
                <option value="desc">` Cao -> Thấp `</option>
                <option value="asc">` Thấp -> Cao `</option>
            </select><br>
            <div class="input_search-form">
                <input type="number" name="price-min" class="input_search-price min-1" placeholder="Nhập giá trị tối thiểu">
                <input type="number" name="price-max" class="input_search-price max-1" placeholder="Nhập giá trị tối đa">
            </div>
            <button class="tk">Tìm Kiếm</button>
        </form>
    </div>
</div>

<!-- Slideshow -->
<div class="slideshow-container">
    <div class="slideShoww" style="max-width:1000px">
        <div class="slideshow-title">
            <p>chương trình khuyến mại</p>
        </div>
        <img class="mySlides" src="https://picsum.photos/1000/351" style="width:100%">
        <img class="mySlides" src="https://picsum.photos/1000/352" style="width:100%">
        <img class="mySlides" src="https://picsum.photos/1000/349" style="width:100%">
        <img class="mySlides" src="https://picsum.photos/1000/348" style="width:100%">
    </div>
    <div class="w3-center slideshow-btn">
        <div class="button-container">
            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮❮</button>
            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">❯❯</button>
        </div>
    </div>
</div>

<!-- Main Location -->
<section class="location-container">
    <div class="location">
        <div class="location-1">
            <p>các địa điểm thu hút ở việt nam</p>
        </div>
        <div class="location-content">
            <div class="location-img">
                <img src="./img/image6.png" alt="">
                <h3>Hồ Chí Minh</h3>
                <p>14.320 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image7.png" alt="">
                <h3>Vũng Tàu</h3>
                <p>14.320 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image8.png" alt="">
                <h3>Đà Lạt</h3>
                <p>14.320 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image9.png" alt="">
                <h3>Hà Nội</h3>
                <p>14.320 <span>Chỗ nghỉ</span> </p>
            </div>
        </div>
    </div>
</section>

<!-- Main Products -->
<section class="list-rooms">
    <div class="sub_container">
        <div class="rooms-title">
            <h2 class="">NHỮNG PHÒNG Ở TỐT GỢI Ý CHO BẠN</h2>
        </div>
        <div class="row-rooms">
            <?php
            foreach ($list8rooms as $phong) {
                extract($phong);
                ?>
                <div class="body-item">
                    <a href="index.php?goto=detaiRooms_booking&id=<?= $ma_phong ?>"><img src=".//<?= $avatar ?>" alt=""></a>
                    <div class="">
                        <h3>
                            <?= $ten_phong ?>
                        </h3>
                        <em>Giá mỗi đêm rẻ từ</em>
                        <p>
                            <?= number_format($gia, 0, ',', '.') ?> vnđ/1 đêm
                        </p>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>

<!-- Plus Location  -->
<section class="location-container">
    <div class="location">
        <div class="location-1">
            <p>các địa điểm thu hút ở ngoài Việt Nam</p>
        </div>
        <div class="location-content">
            <div class="location-img">
                <img src="./img/image6.png" alt="">
                <h3 class="location-title">Kuala Lumpur</h3>
                <p>17,404 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image7.png" alt="">
                <h3 class="location-title">Malila</h3>
                <p>11,257 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image8.png" alt="">
                <h3 class="location-title">Las Vegas</h3>
                <p>828 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image9.png" alt="">
                <h3 class="location-title">Penang</h3>
                <p>4681 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image9.png" alt="">
                <h3 class="location-title">Jakarta</h3>
                <p>4681 <span>Chỗ nghỉ</span> </p>
            </div>
            <div class="location-img">
                <img src="./img/image9.png" alt="">
                <h3 class="location-title">Bangkok</h3>
                <p>10,342 <span>Chỗ nghỉ</span> </p>
            </div>
        </div>
    </div>
</section>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-red", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-red";
    }
</script>