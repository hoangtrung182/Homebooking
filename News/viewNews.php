

	<h2 class="form_title">Bản tin hàng ngày</h2>
<?php 
	foreach ($listNews as $News) {
		extract($News);
        $user = getOneAccount($ma_tk); 
        extract($user);
		?>
		<li class="room-item">
			<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
             	<img src=".//<?= $hinh_anh ?>" alt="">
			</a>
            <div class="room-info">
             	<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
                 	<h3><?= $tieu_de ?></h3>
             	</a>
                <div class="">
                 	<p><?= $noi_dung ?></p>
                     <em><?= $mo_ta ?></em>
                     <p>Tác giả: <?= $Ho_ten ?></p>
                </div>
            </div>
        </li>
	<?php 
	} 
?> 





