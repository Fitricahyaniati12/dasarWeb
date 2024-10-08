<?php
/*$umur;
if (isset($umur) && $umur >= 18) {
    echo "Anda sudah dewasa.";
} else {
    echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan.";
}
?>*/

        //update

$data = array("nama" => "Fitri", "usia" => 19);
    if (isset($data["nama"])) {
        echo "Nama: " . $data["nama"] . "<br>"; 
    } else {
         echo "Variabel 'nama' tidak ditemukan dalam array.<br>";
    }
?>
