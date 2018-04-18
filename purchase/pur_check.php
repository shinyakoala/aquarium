<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>

<?php
//存在した場合
    //メンバー入力情報
    if(isset($session_login) == ""){
        $mail = $_POST["strMail"];
        $pass = $_POST["strPass"];
        $name = $_POST["strName"];
        $postal = $_POST["strPostal"];
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
    $postal = "";
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

//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("../mysqlenv.php");

//  MySQLとの接続開始
if(!$Link = mysqli_connect
            ($HOST,$USER,$PASS)){
  //  うまく接続できなかった
  exit("MySQL接続エラー<br />" .
    mysqli_connect_error());
}

//  クエリー送信(文字コード)
$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        $SQL);
}

//  MySQLデータベース選択
if(!mysqli_select_db($Link,$DB)){
  //  MySQLデータベース選択失敗
  exit("MySQLデータベース選択エラー<br />" .
        $DB);
}

/*********************************************************/
//  クエリー送信(選択クエリー)
//t_fishsのデータ全部抽出
$SQL = "select * from t_fishes";
if(!$SqlRes = mysqli_query($Link,$SQL)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL);
}

//  連想配列への抜出（全件配列に格納）
while($Row = mysqli_fetch_array($SqlRes)){
  //  データが存在する間処理される
  foreach($_SESSION["cart"] as $id => $value){
      if($Row["fish_code"] == $id){
         $RowAry[] = $Row;
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
$NumRows = mysqli_num_rows($SqlRes);
/*********************************************************/

?>

<!DOCTYPE html>

<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>アクア de ショップ 3D</title>
        <meta name="viewport" content="width=device-width">

        <!-- cssスタイルシート -->
         <link rel="stylesheet" href="../css/reset.css">
         <link rel="stylesheet" href="../css/pur_check.css">

    </head>

    <body>

        <!-- パンくずリスト -->
        <div id="pankuzu-list">
            <p>カートの中身</p>
            <p>お客様情報の入力</p>
            <p id="arrow">入力内容の確認</p>
            <p>購入完了</p>
        </div>

        <form action="pur_end.php" method="post">
            <!-- データ移動 -->
            <input type="hidden" name="strMail" value="<?php print $mail ?>" />
            <input type="hidden" name="strPass" value="<?php print $pass ?>" />
            <input type="hidden" name="strName" value="<?php print $name ?>" />
            <input type="hidden" name="strPostar" value="<?php print $postal ?>" />
            <input type="hidden" name="strPref" value="<?php print $pref ?>" />
            <input type="hidden" name="strAddr" value="<?php print $addr ?>" />
            <input type="hidden" name="strAddr2" value="<?php print $addr2 ?>" />
            <input type="hidden" name="strAddr2" value="<?php print $addr2 ?>" />
            <input type="hidden" name="strPhone" value="<?php print $phone ?>" />

            <input type="hidden" name="strNum1" value="<?php print $num1 ?>" />
            <input type="hidden" name="strNum2" value="<?php print $num2 ?>" />
            <input type="hidden" name="strNum3" value="<?php print $num3 ?>" />
            <input type="hidden" name="strNum4" value="<?php print $num4 ?>" />
            <input type="hidden" name="strMonth" value="<?php print $month ?>" />
            <input type="hidden" name="strYear" value="<?php print $year ?>" />
            <input type="hidden" name="strSec_num" value="<?php print $sec_num ?>" />

            <input type="hidden" name="item_num" value="<?php print $item_num ?>">
            <div id="member">
                <h1>
                    <p><img src="../images/icon/check.svg" width="20" height="20"></p>
                    <p>お客様情報のご入力</p>
                </h1>
                <section id="main-member">
                    <dl class="mainform">
                        <dt class="mainform-head">お名前:</dt>
                        <dd class="mainform-body"><?php print $name ?></dd>
                        <dt class="mainform-head">パスワード:</dt>
                        <dd class="mainform-body"><?php print $pass ?></dd>
                        <dt class="mainform-head">郵便番号:</dt>
                        <dd class="mainform-body"><?php print $postal ?></dd>
                        <dt class="mainform-head">都道府県:</dt>
                        <dd class="mainform-body">
                            <?php
                            require "../aryPref.php";
                            print $aryPref[ $_POST["strPref"] ].'<br />';
                            ?>
                        </dd>
                        <dt class="mainform-head">住所1:市区町村・町名番地:</dt>
                        <dd class="mainform-body"><?php print $addr ?></dd>
                        <dt class="mainform-head">住所2:建物名・部屋番号:</dt>
                        <dd class="mainform-body"><?php print $addr2 ?></dd>
                        <dt class="mainform-head">電話番号:</dt>
                        <dd class="mainform-body"><?php print $phone ?></dd>
                        <dt class="mainform-head">メールアドレス:</dt>
                        <dd class="mainform-body"><?php print $mail ?></dd>
                    </dl>
                </section>
            </div>

            <div id="cart">
                <h1>
                    <p><img src="../images/icon/cart.svg" width="20" height="20" /></p>
                    <p>カートの中身</p>
                </h1>
                <div id="cartitem_row">
                    <div class="cartitem_cell cartitem_name">商品名</div>
                    <div class="cartitem_cell cartitem_price">販売価格(税込み)</div>
                    <div class="cartitem_cell cartitem_num">数量</div>
                </div>

                <?php for($i=0;$i<count($RowAry);$i++){ ?>
                <div id="cartcontents_row">
                    <div class="cartcontents_cell cartcontents_name"><?php print $RowAry[$i]["fish_name"] ?></div>
                    <div class="cartcontents_cell cartcontents_price"><?php print $RowAry[$i]["fish_price"] ?></div>
                    <div class="cartcontents_cell cartcontents_num"><?= $_SESSION["cart"][$RowAry[$i]["fish_code"]] ?></div>
                </div>
                <?php } ?>


            </div>

            <div id="btn">
                <a href="pur_mem.php" id="back_btn">入力画面へ戻る</a>
                <input id="next_btn" type="submit" value="購入手続きへ" />
            </div>
        </form>
        <div id="back-link">
            <a href="../aqua.php" id="back"><img src="../images/icon/left-arrow.svg" width="14" height="14">　ショップページへ戻る</a>
        </div>
    </body>

</html>
