    
     <!-- Banner & Form tìm kiếm -->
        <h2 class="form_title">Danh sách căn phòng</h2>
        <p class="form_label">Tìm kiếm sản phẩm</p>
         <div class="list_rooms-form">
             <!-- Form -->
             <form action="index.php?search=typerooms" method="post" class="form_search">
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
                 <select name="price_chose" id="" class="input_third">
                     <option value="" selected>Sắp xếp giá theo</option>
                     <option value="desc">Giá từ cao đến thấp</option>
                     <option value="asc">Giá từ thấp đến cao</option>
                 </select><br>
                 <?php 
                    if(isset($err['min'])) { ?>
                        <p class="notify notify_min"><?= $err['min'] ?></p>
                    <?php } 
                 ?>
                 <?php 
                    if(isset($err['max'])) { ?>
                        <p class="notify notify_max"><?= $err['max'] ?></p>
                    <?php } 
                 ?>
                 <div class="input_search-form">
                     <input type="number" name="price-min" class="input_search-price min-1" value="<?= $_POST['price-min']?>" placeholder="Nhập giá thấp nhất">
                     <input type="number" name="price-max" class="input_search-price max-1" value="<?= $_POST['price-max']?>" placeholder="Nhập giá cao nhất">
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
            <?php
                if(!isset($BothFiltered)) {
                    return '';
                }
            ?>
            <?php 
             if(count($BothFiltered) > 0) {
                 foreach ($BothFiltered as $phong) {
                    extract($phong); ?>
                <!-- Show sản phẩm tìm kiếm -->
                <a href="index.php?goto=detaiRooms_booking&id=<?= $ma_phong ?>">
                     <li class="new-item">
                         <img src=".//<?= $avatar ?>" alt="">
                         <div class="new-info">
                             <h3><?= $ten_phong ?></h3>
                             <div class="">
                                 <em>Giá mỗi đêm rẻ từ</em>
                                 <p><?= number_format($gia, 0, ',', '.') ?> VND</p>
                             </div>
                         </div>
                    </li>
                </a>
                <?php }
             }else { ?>
                <!--  Trả về ko tồn tại nếu array rỗng -->
                <div class="">
                    <h3>Phòng tìm kiếm không tồn tại !!!</h3>
                </div>
            <?php }  ?>
         </div>
     </section>