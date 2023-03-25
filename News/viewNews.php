

	<h2 class="form_title">Bản tin hàng ngày</h2>
<?php 

	foreach ($listNews as $News) {
		extract($News); 
		?>
		<li class="room-item">
			<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
             	<img src=".//<?= $hinh_anh ?>" alt="">
			</a>
            <div class="room-info">
             	<a href="">
                 	<h3><?= $tieu_de ?></h3>
             	</a>
                <div class="">
                 	<p><?= $noi_dung ?></p>
                     <em><?= $mo_ta ?></em>
                     <p><?= $ma_tk ?></p>
                </div>
            </div>
        </li>
	<?php 
	} 
?> 





