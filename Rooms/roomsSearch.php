
     <!-- Banner & Form tìm kiếm -->
        <h2 class="form_title">Danh sách căn phòng</h2>
        <p class="form_label">Tìm kiếm sản phẩm</p>
         <div class="list_rooms-form">
            <div class="box-button">
                <div class="box-1">
                    <button class="box-2">Nghỉ qua Đêm </button>
                </div>
                <div class="box-3">
                    <button class="box-4">Lưu trú sửa dụng trong ngày</button>
                </div>
            </div>
             <!-- Form -->
             <form action="search.php?" method="get" class="form_search">
                 <!-- <label class="form_label" for="">Loại phòng</label><br> -->
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
                 <!-- <label class="form_label" for="">Tăng, giảm dần</label><br> -->
                 <select name="price_chose" id="" class="input_third">
                     <option value="" selected>Sắp xếp giá theo</option>
                     <option value="desc">Giá từ cao đến thấp</option>
                     <option value="asc">Giá từ thấp đến cao</option>
                 </select><br>
                 <!-- <label class="form_label">Khoảng giá</label> -->
                 <div class="input_search-form">
                     <input type="number" name="price-min" class="input_search-price min-1" placeholder="Nhập giá thấp nhất">
                     <input type="number" name="price-max" class="input_search-price max-1" placeholder="Nhập giá cao nhất">
                 </div>
                 <button class="tk">Tìm Kiếm</button>
             </form>
         </div>
     <!-- Filter Products -->
     <section class="list-rooms">
         <div class="sub_container">
             <div class="">
                 <h2 class="form_title">CÁC PHÒNG TÌM KIẾM ĐƯỢC</h2>
             </div>
             <div class="">
                <ul>
                 <?php
                    foreach ($BothFiltered as $phong) {
                        // var_dump($BothFiltered);
                        // die;
                        extract($phong);
                    ?>
                    <li class="room-item">
                         <img src="<?= $avatar ?>" alt="">
                         <div class="room-info">
                             <h3><?= $ten_phong ?></h3>
                             <div class="">
                                 <em>Giá mỗi đêm rẻ từ</em>
                                 <p><?= number_format($gia, 0, ',', '.') ?> VND</p>
                             </div>
                         </div>
                    </li>
                 <?php }
                    ?>
                </ul>
             </div>
         </div>
     </section>