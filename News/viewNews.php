

	<h2 class="form_title">Bản tin hàng ngày</h2>
<?php 
	foreach ($listNews as $News) {
		extract($News);
        $user = getOneAccount($ma_tk); 
        extract($user);
		?>
		<li class="new-item">
			<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
             	<img src=".//<?= $hinh_anh ?>" alt="">
			</a>
            <div class="new-info">
                <div class="">
                 	<a href="index.php?goto=detailnew&id=<?= $ma_tin ?>">
                     	<h3><?= $tieu_de ?></h3>
                 	</a>
                    <em><?= $mo_ta ?></em>                    
                </div>
                <div class="">
                     <p>Tác giả: <?= $Ho_ten ?></p>
                </div>
            </div>
        </li>
	<?php 
	} 
?> 




