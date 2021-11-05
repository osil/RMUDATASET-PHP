<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


?>
<!doctype html>
<html lang="th">

<head>
    <?php include "./include/head.php"; ?>
</head>

<body>

    <!-- Loading wrapper start -->
    <?php include "./include/loading.php"; ?>
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <?php include "./include/sidebar.php"; ?>
        <!-- Sidebar wrapper end -->

        <!-- *************
				************ Main container start *************
			************* -->
        <div class="main-container">

            <!-- Page header starts -->
            <?php include "./include/header.php"; ?>
            <!-- Page header ends -->

            <!-- Content wrapper scroll start -->
            <div class="content-wrapper-scroll">

                <!-- Content wrapper start -->
                <div class="content-wrapper">


                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="profile-header">
                                <h1>ยินดีต้อนรับเข้าสู่ระบบ</h1>
                                <div class="profile-header-content">
                                    <div class="profile-header-tiles">
                                        <div class="row gutters">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="profile-tile">
                                                    <span class="icon">
                                                        <i class="icon-server"></i>
                                                    </span>
                                                    <h6>ชื่อผู้ใช้งาน - <span><?php echo $_SESSION["sess-rmudataset-fullname"]; ?></span></h6>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="profile-tile">
                                                    <span class="icon">
                                                        <i class="icon-dollar-sign"></i>
                                                    </span>
                                                    <h6>พื้นที่รับผิดชอบ - <span></span></h6>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="profile-tile">
                                                    <span class="icon">
                                                        <i class="icon-schedule"></i>
                                                    </span>
                                                    <h6>ระดับการใช้งาน - <span></span></h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="profile-avatar-tile">
                                        <img src="./img/blank_user.jpeg" class="img-fluid" alt="User Profile" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">ข้อมูลระดับบุคคลและครัวเรือน</div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn active">Export to Excel</button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="basicExample" class="table custom-table" style="vertical-align: middle;">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>รหัสประจำบ้าน</th>
                                                    <th>บ้านเลขที่</th>
                                                    <th>หมู่บ้าน</th>
                                                    <th>ตำบล</th>
                                                    <th>อำเภอ</th>
                                                    <th>จังหวัด</th>
                                                    <th>สถานะ</th>
                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php

                                                for ($i = 1; $i <= 20; $i++) {
                                                ?>
                                                    <tr>
                                                        <td>1020100<?php echo $i; ?></td>
                                                        <td><?php echo $i; ?></td>
                                                        <td>มรม</td>
                                                        <td>ตลาด</td>
                                                        <td>เมือง</td>
                                                        <td>มหาสารคาม</td>
                                                        <td>ขั้นที่ 2/6</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Options
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                    <li>
                                                                        <hr class="dropdown-divider">
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- Card end -->

                        </div>
                    </div>
                    <!-- Row end -->

                </div>
                <!-- Content wrapper end -->

                <!-- App footer start -->
                <?php include "./include/footer.php"; ?>
                <!-- App footer end -->

            </div>
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->
    <?php include "./include/script.php"; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // Basic DataTable
        $(function() {
            $('#basicExample').DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50],
                    [5, 10, 25, 50, "All"]
                ],
                "language": {
                    "lengthMenu": "Display _MENU_ Records Per Page",
                    "info": "Showing Page _PAGE_ of _PAGES_",
                }
            });
        });


        function _deleteProject(projectid) {
            Swal.fire({
                title: 'ยืนยันการทำรายการ?',
                text: "คุณต้องการที่จะลบข้อมูล!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        url: "script-deleteproject-ajax.php",
                        data: {
                            projectid
                        },
                        success: function(msg) {
                            if (msg === 'ok') {
                                Swal.fire({

                                    icon: 'success',
                                    title: 'ลบข้อมูลสำเร็จแล้ว',
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                                _setInterval();



                            } else {
                                Swal.fire({

                                    icon: 'error',
                                    title: 'เกิดข้อผิดพลาดในการลบข้อมูล ' + msg,
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                            }

                        }

                    })

                }
            })
        }

        function _setInterval() {
            setInterval(function() {
                location.reload();
            }, 3000);
        }
    </script>


</body>

</html>