<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部

if(isset($_POST["strMail"])){
    $strMail = $_POST["strMail"];
    $strPass = $_POST["strPass"];
}else{
    $strMail = "";
    $strPass = "";
    print "不正なログイン認証です";
}
//ログインエラー感知変数
$_SESSION["login_Err"] = "";

include("../mysqlenv.php");
//  MySQLへの接続
if(!$Link = mysqli_connect
       ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー" . mysqli_connect_error());
}

//  MySQLへの文字コード指定
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  exit("MySQLクエリー送信エラー" . $SQL);
}

//  MySQLデータベース指定
if(!mysqli_select_db($Link,$DB)){
  exit("MySQLDB選択エラー" . $DB);
}
/***************************************
  使用するMySQL：localhost
  使用するDB名：aquarium

  部署テーブル：t_member

****************************************/

$SQL = "select * from t_member, t_payment where";
$SQL .= " t_member.mem_mail = t_payment.mem_mail and";
$SQL .= " t_member.mem_mail = '" . $strMail . "' and t_member.mem_pass = '" . $strPass . "';";
if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . 
        mysqli_error($Link) . "<br />" . $SQL);
}

$Row = mysqli_fetch_array($SqlRes);

//データベースから持ってきた値の受け取り
$mail = $Row["mem_mail"];
$name = $Row["mem_name"];
$pass = $Row["mem_pass"];
$postal = $Row["mem_postal"];
$pref = $Row["mem_pref"];
$address = $Row["mem_address"];
$address2 = $Row["mem_address2"];
$phone = $Row["mem_phone"];

$num1 = $Row["card_num1"];
$num2 = $Row["card_num2"];
$num3 = $Row["card_num3"];
$num4 = $Row["card_num4"];
$year = $Row["card_year"];
$month = $Row["card_month"];
$sec = $Row["card_sec"];

//データベースから参照されて持ってきた値をセッションへ入れる
$_SESSION["login_mail"] = $mail;
$_SESSION["login_name"] = $name;
$_SESSION["login_pass"] = $pass;
$_SESSION["login_postal"] = $postal;
$_SESSION["login_pref"] = $pref;
$_SESSION["login_address"] = $address;
$_SESSION["login_address2"] = $address2;
$_SESSION["login_phone"] = $phone;

$_SESSION["login_num1"] = $num1;
$_SESSION["login_num2"] = $num2;
$_SESSION["login_num3"] = $num3;
$_SESSION["login_num4"] = $num4;
$_SESSION["login_year"] = $year;
$_SESSION["login_month"] = $month;
$_SESSION["login_sec"] = $sec;

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

if(isset($name) != ""){
        //エラーSESSION削除
        unset($_SESSION["login_Err"]);
        header("Location: ../aqua.php");
        exit();
    }elseif(isset($name) == ""){
        //header関数のurlにGET値を持たせる
        $_SESSION["login_Err"] = 1;
        $url = "login_input.php?strMail=".$strMail."&strPass=".$strPass;
        header("Location: ".$url);
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
