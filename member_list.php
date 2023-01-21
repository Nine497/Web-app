<?php 
include("condb.php");

if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
} else {
    $keyword = '';
}

$query_borrow = "SELECT tb_borrow_book.*, tb_book.b_name, tb_member.m_name FROM tb_borrow_book
                  JOIN tb_book ON tb_borrow_book.b_id = tb_book.b_id
                  JOIN tb_member ON tb_borrow_book.m_user = tb_member.m_user
                  WHERE tb_book.b_name LIKE '%$keyword%' OR tb_member.m_name LIKE '%$keyword%'
                  " or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query_borrow);?>

<div class="row">
    <div class="col-8" style="  margin-left: auto; margin-right: auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัสหนังสือ</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ผู้ยืม-คืน</th>
                    <th>วันที่ยืม</th>
                    <th>วันที่คืน</th>
                    <th>ค่าปรับ</th>
                </tr>
            </thead>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row['b_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['b_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['m_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['br_date_br']; ?>
                    </td>
                    <td>
                        <?php echo $row['br_date_rt']; ?>
                    </td>
                    <td>
                        <?php echo $row['br_fine']; ?>
                    </td>
                <?php } ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>