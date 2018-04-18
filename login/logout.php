<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
if(isset($_SESSION["login_mail"]) != ""){
    unset($_SESSION["login_mail"]);
    unset($_SESSION["login_name"]);
    unset($_SESSION["login_pass"]);
    unset($_SESSION["login_postal"]);
    unset($_SESSION["login_pref"]);
    unset($_SESSION["login_address"]);
    unset($_SESSION["login_address2"]);
    unset($_SESSION["login_phone"]);

    unset($_SESSION["login_num1"]);
    unset($_SESSION["login_num2"]);
    unset($_SESSION["login_num3"]);
    unset($_SESSION["login_num4"]);
    unset($_SESSION["login_year"]);
    unset($_SESSION["login_month"]);
    unset($_SESSION["login_sec"]);
    
    header("Location: ../aqua.php");
    exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<!--  StyleSheet記述
<link rel="stylesheet" href="./css/main.css" type="text/css" media="all" />
StyleSheet記述  -->
<!-- PAGE TITLE -->
<title>ページタイトル</title>
</head>
<body>
<?php
?>
</body>
</html>
