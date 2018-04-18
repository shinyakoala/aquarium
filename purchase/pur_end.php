<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php

    //メンバー入力情報
    if(isset($login_name) == ""){
        $mail = $_POST["strMail"];
        $pass = $_POST["strPass"];
        $name = $_POST["strName"];
        $postar = $_POST["strPostar"];
        $pref = $_POST["strPref"];
        $addr = $_POST["strAddr"];
        $addr2 = $_POST["strAddr2"];
        $phone = $_POST["strPhone"];
    }
    if(isset($session_login) == ""){
    //カード入力情報
        $num1 = $_POST["strNum1"];
        $num2 = $_POST["strNum2"];
        $num3 = $_POST["strNum3"];
        $num4 = $_POST["strNum4"];
        $month = $_POST["strMonth"];
        $year = $_POST["strYear"];
        $sec_num = $_POST["strSec_num"];
    }else{
    $mail = "";
    $pass = "";
    $name = "";
    $postar = "";
    $pref = "";
    $addr = "";
    $addr2 = "";
    $phone = "";

    $num1 = "";
    $num2 = "";
    $num3 = "";
    $num4 = "";
    $month = "";
    $year = "";
    $sec_num = "";
}

if(isset($_SESSION["login_mail"]) != ""){
$login_mail = $_SESSION["login_mail"];
$login_name = $_SESSION["login_name"];
$login_pass = $_SESSION["login_pass"];
$login_postal = $_SESSION["login_postal"];
$login_pref = $_SESSION["login_pref"];
$login_address = $_SESSION["login_address"];
$login_address2 = $_SESSION["login_address2"];
$login_phone = $_SESSION["login_phone"];

$login_num1 = $_SESSION["login_num1"];
$login_num2 = $_SESSION["login_num2"];
$login_num3 = $_SESSION["login_num3"];
$login_num4 = $_SESSION["login_num4"];
$login_year = $_SESSION["login_year"];
$login_month = $_SESSION["login_month"];
$login_sec = $_SESSION["login_sec"];

}

?>

<?php

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

if(isset($login_mail) == ""){
    $SQL = "insert into t_member(mem_mail,mem_pass, mem_name, mem_postal, mem_pref, mem_address, mem_address2, mem_phone)";
    $SQL .= " values('".$mail."', '".$pass."', '".$name."', '".$postar."', '".$pref."', '".$addr."', '".$addr2."', '".$phone."');";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
        exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" . $SQL);
    }
}

if(isset($login_sec) == ""){
    $SQL2 = "insert into t_payment(card_code, card_num1, card_num2, card_num3, card_num4, card_month, card_year, card_sec, mem_mail)";
    $SQL2 .= " values('".$num1.$num2.$num3.$num4."', '".$num1."', '".$num2."', '".$num3."', '".$num4."', '".$month."', '".$year."', '".$sec_num."', '".$mail."');";
    if(!$SqlRes2 = mysqli_query($Link,$SQL2)){
        exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" . $SQL2);
    }
}

    $SQL3 = "select card_code from t_payment";
    $SQL3 .= " where card_num1 = '".$num1."' and card_num2 = '".$num2."' and card_num3 = '".$num3."' and card_num4 = '".$num4."';";
    if(!$SqlRes3 = mysqli_query($Link,$SQL3)){
        exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" . $SQL3);
    }

    $Row3 = mysqli_fetch_array($SqlRes3);
      /***************************************
    抜き出された連想配列

    $Row["card_code"];
  ****************************************/

    $Row_card_code = $Row3["card_code"];

    mysqli_free_result($SqlRes3);


$SQL_codes = "select * from t_fishes";
if(!$SqlRes_codes = mysqli_query($Link,$SQL_codes)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL_codes);
}

//  連想配列への抜出（全件配列に格納）
while($Row_codes = mysqli_fetch_array($SqlRes_codes)){
  //  データが存在する間処理される
  foreach($_SESSION["cart"] as $id => $value){
      if($Row_codes["fish_code"] == $id){
         $RowAry_codes[] = $Row_codes;
      }
  }
}
/*********************************
抜き出された連想配列(二次元配列)

$RowAry[0]["fish_code"]
$RowAry[0]["fish_name"]
$RowAry[0]["fish_price"]
$RowAry[0]["fish_comment"]
$RowAry[0]["fish_img"]

$RowAry[1]["fish_code"]
$RowAry[1]["fish_name"]
$RowAry[1]["fish_price"]
$RowAry[1]["fish_comment"]
$RowAry[1]["fish_img"]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows_codes = mysqli_num_rows($SqlRes_codes);

for($i=0;$i<count($RowAry_codes);$i++){
    $SQL4 = "insert into t_buy(fish_code, fish_num, mem_mail, card_code)";
    $SQL4 .= " values('".$RowAry_codes[$i]["fish_code"]."', '".$_SESSION["cart"][$RowAry_codes[$i]["fish_code"]]."', '".$mail."', '".$Row_card_code."' );";
    if(!$SqlRes4 = mysqli_query($Link,$SQL4)){
        exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" . $SQL4);
    }
}
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


//  部署名を表示させるためのデータベース
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

?>

<!DOCTYPE html>

<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>アクア de ショップ 3D</title>
        <meta name="viewport" content="width=device-width">

        <!-- cssスタイルシート -->
         <link rel="stylesheet" href="../css/reset.css">
         <link rel="stylesheet" href="../css/pur_end.css">


    </head>

    <body>

        <!-- パンくずリスト -->
        <div id="pankuzu-list">
            <p>カートの中身</p>
            <p>お客様情報の入力</p>
            <p>入力内容の確認</p>
            <p id="arrow">購入完了</p>
        </div>

        <form>

            <div id="member">
                <h1>
                    <p><img src="../images/icon/fish2.svg" width="20" height="20"></p>
                    <p>購入完了</p>
                </h1>
                <section id="end">
                    <p>購入が完了しました。</p>
                </section>
            </div>
            <div id="btn">
                <a href="pur_del.php?del" id="back_btn">一覧へ戻る</a>
            </div>
    </body>
</html>
