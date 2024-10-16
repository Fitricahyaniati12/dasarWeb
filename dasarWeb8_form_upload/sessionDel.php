<?php
    session_start();
?>

<!DOCTYPE html>
    <html>
         <body>
         <?php
            session_unset();
            session_destroy();
            echo "Semua variabel sesi sekarang telah dihapus, dan sesi telah dihancurkan.";

    ?>
</body>
</html>
