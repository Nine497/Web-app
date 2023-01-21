<?php
include('condb.php');

// Count number of books
$query = "SELECT COUNT(*) as num_books FROM tb_book";
$result = mysqli_query($con, $query);
$num_books = mysqli_fetch_assoc($result)['num_books'];

// Count number of borrows
$query = "SELECT COUNT(*) as num_borrows FROM tb_borrow_book";
$result = mysqli_query($con, $query);
$num_borrows = mysqli_fetch_assoc($result)['num_borrows'];

// Count number of members
$query = "SELECT COUNT(*) as num_members FROM tb_member";
$result = mysqli_query($con, $query);
$num_members = mysqli_fetch_assoc($result)['num_members'];

// Count number of books not returned
$query = "SELECT COUNT(*) as num_not_returned FROM tb_borrow_book WHERE br_date_rt='0000-00-00'";
$result = mysqli_query($con, $query);
$num_not_returned = mysqli_fetch_assoc($result)['num_not_returned'];

// Return data as JSON
$data_COUNT = array(
    'numBooks' => $num_books,
    'numBorrows' => $num_borrows,
    'numMembers' => $num_members,
    'numNotReturned' => $num_not_returned
);

echo json_encode($data_COUNT);


$con->close();
?>