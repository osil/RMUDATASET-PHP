<?php
session_start();
include "./config/global.php";
include "./config/database.php";



$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT
t.userid,
t.fullname,
t.username
FROM
user_tb AS t 
WHERE
t.username = :user_name 
AND t.password = :user_password
";

$params = array(
    'user_name' => $username,
    'user_password' => md5($password),
);
$result = $con->prepare($sql);
$res = $result->execute($params);
$default = $result->fetch();
$row = $result->rowCount();

if ($row == 1) {





    $_SESSION["sess-rmudataset-login"] = 1;
    $_SESSION["sess-rmudataset-id"] = $default['userid'];
    $_SESSION["sess-rmudataset-fullname"] = $default['fullname'];
    $_SESSION["sess-rmudataset-username"] = $default['username'];

    echo "
            <meta charset='utf-8' />
            <script>
            window.location = 'index.php';
            </script>
            ";
} else {
    echo "
            <meta charset='utf-8' />
            <script>
            alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
            window.location = 'login.php';
            </script>
            ";
}

// $url = "http://202.29.22.18/rmu_service/authen_project.php?username=" . $_POST["username"] . "&password=" . $_POST["password"] . "";
// $json = file_get_contents($url);
// $json_data = json_decode($json, true);

// $status = $json_data["status"];
// if ($status != 'ok') {
//     echo "
//             <meta charset='utf-8' />
//             <script>
//             alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
//             window.location = 'login.php';
//             </script>
//             ";
// } else {
//     $staffid = $json_data["user"]["staffid"];
//     $staffname = $json_data["user"]["staffname"];
//     $departmentname = $json_data["user"]["departmentname"];
//     $fac_id = $json_data["user"]["fac_id"];
//     $dept_id = $json_data["user"]["dept_id"];
//     $dept_code = $json_data["user"]["dept_code"];

//     $r_id = explode(",", $json_data["user_role"]["role_id"]);
//     $r_name = explode(",", $json_data["user_role"]["role_name"]);

//     $role_id = $r_id;
//     $role_name = $r_name;

//     $_SESSION["sess-pjr-login"] = 1;
//     $_SESSION["sess-pjr-staffid"] = $staffid;
//     $_SESSION["sess-pjr-staffname"] = $staffname;
//     $_SESSION["sess-pjr-departmentname"] = $departmentname;
//     $_SESSION["sess-pjr-fac_id"] = $fac_id;
//     $_SESSION["sess-pjr-dept_id"] = $dept_id;
//     $_SESSION["sess-pjr-dept_code"] = $dept_code;
//     $_SESSION["sess-pjr-role_id"] = $role_id;
//     $_SESSION["sess-pjr-role_name"] = $role_name;

//     echo "
//             <meta charset='utf-8' />
//             <script>
//             window.location = 'index.php';
//             </script>
//             ";
// }
