<?php
    $angka1 = 10;
    $angka2 = 5;
    $hasil = $angka1 + $angka2;
    $benar = true;
    $salah = false;

    echo "Hasil penjumalahan $angka1 dan $angka2 adalah $hasil.";
    echo "Variabel benar: $benar, Variabel salah: $salah";
    // Mendefinisikan konstanta untuk nilai tetap
    define("NAMA_SITUS", "Websiteku.com");
    define("TAHUN_PENDIRIAN", 2023);

    echo "Selamat datang di " . NAMA_SITUS . " didirikan pada tahun " . TAHUN_PENDIRIAN . "."   ;
    ?>