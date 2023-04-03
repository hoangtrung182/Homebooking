<?php
function insertContact($ten_ht, $ma_tk, $email, $noi_dung, $phone) {
    $sql = "INSERT INTO hotro(ten_ht,ma_tk, email, noi_dung, phone) VALUES ('$ten_ht','$ma_tk','$email','$noi_dung','$phone')";
    pdo_execute($sql);
}
function load_contact() {
    $sql = "SELECT * from hotro order by ma_ht asc";
    $listcontacts = pdo_query($sql);
    return $listcontacts;
}
