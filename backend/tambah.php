<?php
require_once '../koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

// echo $data->nomor;

$sql = "insert into data(nomor, merek, tipe) values('" .
    $data->nomor . "','" . $data->merek . "','" . $data->tipe . "')";
$result = pg_query($sql);
$row = pg_affected_rows($result);
$obj = new stdClass();
if($row > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>