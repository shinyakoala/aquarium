<?php


?>
<?php
//  処理部
if(isset($_POST["strMail"]) != ""){
    $strMail = $_POST["strMail"];
    $strName = $_POST["strName"];
    $strPass = $_POST["strPass"];
    $strPostal = $_POST["strPostal"];
    $strPref = $_POST["strPref"];
    $strAddr = $_POST["strAddr"];
    $strAddr2 = $_POST["strAddr2"];
    $strPhone = $_POST["strPhone"];
    
    $strNum1 = $_POST["strNum1"];
    $strNum2 = $_POST["strNum2"];
    $strNum3 = $_POST["strNum3"];
    $strNum4 = $_POST["strNum4"];
    $strMonth = $_POST["strMonth"];
    $strYear = $_POST["strYear"];
    $strSec_num = $_POST["strSec_num"];
    
}else{
    $strMail = "";
    $strPass = "";
    $strName = "";
    $strPostal = "";
    $strPref = "";
    $strAddr = "";
    $strAddr2 = "";
    $strPhone = "";
    
    $strNum1 = "";
    $strNum2 = "";
    $strNum3 = "";
    $strNum4 = "";
    $strMonth = "";
    $strYear = "";
    $strSec_num = "";
    
}

//  MySQL定数の組み込み
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

$SQL3 = "select * from t_member, t_payment where";
$SQL3 .= " t_member.mem_mail = t_payment.mem_mail and";
$SQL3 .= " t_member.mem_mail = '".$strMail."' and";
$SQL3 .= " card_code = '".$strNum1.$strNum2.$strNum3.$strNum4."';";
    if(!$SqlRes3 = mysqli_query($Link,$SQL3)){
        exit("MySQLクエリー送信エラー<br />" . 
        mysqli_error($Link) . "<br />" . $SQL3);
    }

    //  抜き出されたレコード件数を求める
    $NumRows3 = mysqli_num_rows($SqlRes3);

//抽出されたデータベースの中が空だったら実行
if($NumRows3 == ""){
    $SQL = "insert into t_member(mem_mail,mem_pass, mem_name, mem_postal, mem_pref, mem_address, mem_address2, mem_phone)";
    $SQL .= " values('".$strMail."', '".$strPass."', '".$strName."', '".$strPostal."', '".$strPref."', '".$strAddr."', '".$strAddr2."', '".$strPhone."');";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" . 
        mysqli_error($Link) . "<br />" . $SQL);
    }
    $SQL2 = "insert into t_payment(card_code, card_num1, card_num2, card_num3, card_num4, card_month, card_year, card_sec, mem_mail)";
    $SQL2 .= " values('".$strNum1.$strNum2.$strNum3.$strNum4."', '".$strNum1."', '".$strNum2."', '".$strNum3."', '".$strNum4."', '".$strMonth."', '".$strYear."', '".$strSec_num."', '".$strMail."');";
    if(!$SqlRes2 = mysqli_query($Link,$SQL2)){
        exit("MySQLクエリー送信エラー<br />" . 
        mysqli_error($Link) . "<br />" . $SQL2);
    }
    
}else{
    $ErrFlg = 1;
}

if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}
if(isset($ErrFlg) == ""){ 
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
<link rel="stylesheet" href="../css/insert.css" type="text/css" media="all" />
<!-- PAGE TITLE -->
<title>ページタイトル</title>
</head>
<body>
    <div id="wrap">
        <div id="form_bottom">
            
            <a href="../aqua.php"><img src="../images/logo/logo.svg" / width="30%" height="30%" alt="logo"></a>
            
            <?php if(isset($ErrFlg) != ""){ ?>
                <p>既に登録されているデータです。</p>
                <form action="insert_check.php" method="POST">
                    <input type="hidden" name="strName" value="<?= $strName ?>">
                    <input type="hidden" name="strMail" value="<?= $strMail ?>">
                    <input type="hidden" name="strPass" value="<?= $strPass ?>">
                    <input type="hidden" name="strPostal" value="<?= $strPostal ?>">
                    <input type="hidden" name="strPref" value="<?= $strPref ?>">
                    <input type="hidden" name="strAddr" value="<?= $strAddr ?>">
                    <input type="hidden" name="strAddr2" value="<?= $strAddr2 ?>">
                    <input type="hidden" name="strPhone" value="<?= $strPhone ?>">

                    <input type="hidden" name="strNum1" value="<?= $strNum1 ?>">
                    <input type="hidden" name="strNum2" value="<?= $strNum2 ?>">
                    <input type="hidden" name="strNum3" value="<?= $strNum3 ?>">
                    <input type="hidden" name="strNum4" value="<?= $strNum4 ?>">
                    <input type="hidden" name="strMonth" value="<?= $strMonth ?>">
                    <input type="hidden" name="strYear" value="<?= $strYear ?>">
                    <input type="hidden" name="strSec_num" value="<?= $strSec_num ?>">
                </form>
            <?php }?>
    </div>
</body>
</html>
