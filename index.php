<?php include("condb.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        font-size: 19px;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12">
                    <h1>การจัดการข้อมูลการยืม-คืนหนังสือ</h1>
                </div>
            </div>
        </div><br>
        <div class="d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12">
                    <input type="text" placeholder="ค้นหา..." id="searchInput">
                    <button type="submit" class="btn btn-info" id="searchBtn">ค้นหา</button>
                </div>
            </div>
        </div><br>
        <div class="d-flex align-items-center justify-content-end" style="margin-right:400px;
">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borrowModal"
                        style="font-size: 20px;">ยืม-คืนหนังสือ</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#statsModal"
                        style="font-size: 20px;">ข้อมูลสถิติ</button>
                </div>
            </div>
            <!-- modal ยืม-คืน -->
            <div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="myModalLabel">ยืม-คืนหนังสือ</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1">ยืมหนังสือ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2">คืนหนังสือ</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="form-group">
                                        <label for="input1">ผู้ที่ต้องการยืม</label>
                                        <input type="text" class="form-control" id="input1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="input2">รหัสหนังสือ</label>
                                        <input type="text" class="form-control" id="input2" name="b_id" required>
                                        <button class="btn btn-primary add-input"
                                            style="margin-top: 10px;">ตกลง</button>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <td>ชื่อ-สกุลผู้ยืม :</td>
                                            <td class="borrow-name"></td>
                                        </tr>
                                        <tr>
                                            <td>รหัสหนังสือ :</td>
                                            <td class="book-id"></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อหนังสือ :</td>
                                            <td class="book-name"></td>
                                        </tr>
                                    </table>
                                    <div class="form-group" style=" display: flex;justify-content: center;">
                                        <button class="btn btn-success btn1" id="btn1"
                                            style="    margin-right: 10px;">ยืมหนังสือ</button>
                                        <button class="btn btn-danger cancel" data-dismiss="modal">ยกเลิก</button>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class="form-group">
                                        <label for="input3">รหัสหนังสือที่ต้องการคืน</label>
                                        <input type="text" class="form-control" id="b_id">
                                        <button class="btn btn-primary add-input1"
                                            style="margin-top: 10px;">ค้นหา</button>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <td>รหัสหนังสือ :</td>
                                            <td class="book-id1"></td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อหนังสือ :</td>
                                            <td class="book-name1"></td>
                                        </tr>
                                        <tr>
                                            <td>ผู้ยืม-คืนหนังสือ :</td>
                                            <td class="member-name"></td>
                                        </tr>
                                        <tr>
                                            <td>วันที่ยืมหนังสือ :</td>
                                            <td class="date-barrow"></td>
                                        </tr>
                                        <tr>
                                            <td>ค่าปรับ :</td>
                                            <td><input type="text" class="form-control" id="fine"></td>
                                        </tr>
                                    </table>
                                    <div class="form-group" style=" display: flex;justify-content: center;">
                                        <button class="btn btn-success btn2" id="btn2"
                                            style="margin-right: 10px;">คืนหนังสือ</button>
                                        <button class="btn btn-danger cancel" data-dismiss="modal">ยกเลิก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Show status Modal -->
            <div class="modal fade" id="statsModal" tabindex="-1" role="dialog" aria-labelledby="statsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="statsModalLabel">ข้อมูลสถิติของห้องสมุด</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <table class="table" style="font-size: 20px;">
                                <tr>
                                    <th>หัวข้อ</th>
                                    <th>จำนวน</th>
                                </tr>
                                <tr>
                                    <td>หนังสือทั้งหมด (เล่ม)</td>
                                    <td id="numBooks"></td>
                                </tr>
                                <tr>
                                    <td>การใช้บริการยืม-คืนหนังสือ (ครั้ง)</td>
                                    <td id="numBorrows"></td>
                                </tr>
                                <tr>
                                    <td>สมาชิกทั้งหมด (คน)</td>
                                    <td id="numMembers"></td>
                                </tr>
                                <tr>
                                    <td>หนังสือที่ค้างส่ง</td>
                                    <td id="numNotReturned"></td>
                                </tr>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



        </div><br>
    </div>
    <?php include("member_list.php"); ?>
    </div>
</body>

<!-- show data to table in modal -->
<script>
    $(document).on('click', '.add-input', function () {
        var input1 = $('#input1').val();
        var input2 = $('#input2').val();
        if (input1 != '' && input2 != '') {
            $.ajax({
                type: 'POST',
                url: 'bname.php',
                data: { b_id: input2 },
                success: function (data_save) {
                    var b_name = JSON.parse(data_save).b_name;
                    $('.borrow-name').text(input1);
                    $('.book-id').text(input2);
                    $('.book-name').text(b_name);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        } else {
            alert('กรุณากรอกข้อมูลให้ครบทุกช่องก่อนทำการบันทึก');
        }

    });
</script>
<script>
    $(document).on('click', '.add-input1', function () {
        var b_id = $('#b_id').val();
        if (b_id != '') {
            $.ajax({
                type: 'POST',
                url: 'get_book_data.php',
                data: { b_id: b_id },
                success: function (data_get_book) {
                    var bookData = JSON.parse(data_get_book);
                    if (bookData.length == 0) {
                        alert("ไม่พบรหัสหนังสือที่มีการยืม");
                    } else {
                        $('.book-id1').text(bookData.b_id);
                        $('.book-name1').text(bookData.b_name);
                        $('.member-name').text(bookData.m_name);
                        $('.date-barrow').text(bookData.br_date_br);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } else {
            alert('กรุณากรอกข้อมูลให้ครบทุกช่องก่อนทำการบันทึก');
        }
    });
</script>

<script>
    $(document).on('click', '#btn2', function () {
        var b_id = $('.book-id1').text();
        var fine = $('#fine').val();
        if (b_id != '' && fine != ''){
        $.ajax({
            type: 'POST',
            url: 'return_db.php',
            data: { b_id: b_id, fine: fine },
            success: function (data_return) {
                if (data_return == "not_found") {
                    alert("ไม่พบรหัสหนังสือที่มีการยืม");
                } else {
                    alert('ทำรายการสำเร็จ');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }else{
        alert('กรุณากรอกข้อมูลให้ครบทุกช่องก่อนทำการบันทึก');
    }
    });
</script>

<!--Save barrow to database-->
<script>
    $(document).on('click', '.btn1', function () {
        var input1 = $('#input1').val();
        var input2 = $('#input2').val();
        if (input1 != '' && input2 != '') {
            $.ajax({
                type: 'POST',
                url: 'get_user.php',
                data: { m_name: input1 },
                success: function (data_save) {
                    var muser = JSON.parse(data_save).m_user;
                    if (muser == "ไม่พบข้อมูลสมาชิก หรือหนังสือ") {
                        alert(muser);
                    } else {
                        saveData(muser, input2);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } else {
            alert('กรุณากรอกข้อมูลให้ครบทุกช่องก่อนทำการบันทึก');
        }
    });


    function saveData(muser, b_id) {
            $.ajax({
                type: 'POST',
                url: 'save_db.php',
                data: { m_user: muser, b_id: b_id },
                success: function (data) {
                    alert('ทำรายการสำเร็จ');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
    }
</script>

<!--all Status!-->
<script>
        $(document).ready(function () {
            $('#statsModal').on('show.bs.modal', function (event) {
                $.ajax({
                    type: 'POST',
                    url: 'stats_data.php',
                    success: function (data_COUNT) {
                        var statsData = JSON.parse(data_COUNT);
                        $('#numBooks').text(statsData.numBooks);
                        $('#numBorrows').text(statsData.numBorrows);
                        $('#numMembers').text(statsData.numMembers);
                        $('#numNotReturned').text(statsData.numNotReturned);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
</script>

<!--search button-->
<script>
        $(document).ready(function () {
            $('#searchBtn').on('click', function (event) {
                var keyword = $('#searchInput').val();
                $.ajax({
                    type: 'POST',
                    url: 'member_list.php',
                    data: { keyword: keyword },
                    success: function (data_search) {
                        $('table').html(data_search);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
        });
</script>

<!-- close modal -->
<script>
        $('.cancel').click(function () {
            $('#borrowModal').modal('hide');
        });

</script>

</html>