<?php
include('condb.php');
$m_user = $_POST['m_user'];
$b_id = $_POST['b_id'];
$br_date_br = date("Y-m-d");

$sql = "INSERT INTO tb_borrow_book ( br_date_br, br_date_rt, m_user, b_id, br_fine)
    VALUES ('$br_date_br',  '0000-00-00', '$m_user', '$b_id', '0')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>