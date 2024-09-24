<?php
function perkenalan($nama, $salam) {
    echo $salam.",";
    echo "Perkenalkan, nama saya ".$nama."<br/>"; 
    echo "Senang berkenalan dengan Anda!<br/>";
}

//memanggil fungsi yang sudah dibuat
perkenalan("Cahya", "Hallo");

echo "<hr>";

$saya = "Cahya";
$ucapSalam = "Selamat Pagi";

//memanggil lagi
perkenalan($saya,$ucapSalam);
?>
