<?php
include('condb.php');
$b_id = $_POST['b_id'];
$fine = $_POST['fine'];
$br_date_rt = date("Y-m-d");

$sql = "UPDATE tb_borrow_book SET br_date_rt = '$br_date_rt', br_fine = '$fine' WHERE b_id = '$b_id' ";
if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>