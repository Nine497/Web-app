<?php
include('condb.php');
$b_id = $_POST['b_id'];
$sql = "SELECT b.b_id,b.b_name,m.m_name,bb.br_date_br FROM tb_borrow_book bb 
        INNER JOIN tb_book b ON bb.b_id = b.b_id 
        INNER JOIN tb_member m ON bb.m_user = m.m_user 
        WHERE bb.b_id = '$b_id'";
$result = $con->query($sql);
$data_get_book = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_get_book = $row;
    }
}
echo json_encode($data_get_book);
$con->close();
?>