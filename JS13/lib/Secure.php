<?php

function antiSqlInjection($data){
$data = stripslashes($data);
$data = strip_tags($data);
$data = htmlentities($data);
$data = htmlspecialchars($data);
$data = addslashes($data); return $data;
}
echo json_encode(['status' => true, 'message' => 'Data berhasil diperbarui.']);
?>
