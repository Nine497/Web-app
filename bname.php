<?php
include('condb.php');
if (isset($_POST['b_id'])) {
    $b_id = $_POST['b_id'];
    $sql = "SELECT b_name FROM tb_book WHERE b_id = '$b_id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b_name = $row['b_name'];
    } else {
        $b_name = 'ไม่พบหนังสือ';
    }
}
$con->close();
echo json_encode(array('b_name' => $b_name));
?>