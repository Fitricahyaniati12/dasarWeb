<?php
function tampilkanAngka(int $jumlah, int $sindeks = 1) {
    echo "Perulangan ke-{$sindeks} <br>";
    // Call itself while $sindeks <= $jumlah
    if ($sindeks < $jumlah) {
        tampilkanAngka($jumlah, $sindeks + 1);
    }
}

// Call the function to display numbers from 1 to 25
tampilkanAngka(25);
?>
