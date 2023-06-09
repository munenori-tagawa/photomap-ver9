<?php
session_start();
$name = $_POST['name'];
$address = $_POST['address'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

if ($name === '') {
    $not_name = true;
}
if ($address === '') {
    $not_address = true;
}
if ($lid === '') {
    $not_lid = true;
}
if ($lpw === '') {
    $not_lpw = true;
}

if ($not_lid || $not_lpw) {
    header('Location: signUp.php?form_empty=1');
    exit();
}


require_once('../funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM signup_table WHERE name = :name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lid, PDO::PARAM_STR);


$status = $stmt->execute();

if (!$status) {
    sql_error($stmt);
}

$val = $stmt->fetch();

if ($val['id'] != '' && password_verify($lpw, $val['lpw'])) {
    //Login成功時
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name']      = $val['name'];
    header('Location:../login.php');
} else {
    //Login失敗時(Logout経由)
    header('Location: signUp.php?form_validation=1');
}
?>