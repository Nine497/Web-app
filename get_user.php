<?php
include('condb.php');
$m_name = $_POST['m_name'];

$sql = "SELECT m_user FROM tb_member WHERE m_name = '$m_name' ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $m_user = $row['m_user'];
} else {
    $m_user = 'ไม่พบข้อมูลสมาชิก หรือหนังสือ';
}
$con->close();
echo json_encode(array('m_user' => $m_user));
?>
