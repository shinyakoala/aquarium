<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>

<?php
/*
if(isset($_SESSION["cart"])){
    $_SESSION["item_num"] = $_POST["item_num"];
    $item_num = $_SESSION["item_num"];
    $codes = $_SESSION["cart"];
}else{
    $item_num = "";
    $codes = "";
}
*/
//中身のセッションが空っぽではなければセッションの値を取得する(t_member)
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

}else{
    $login_mail = "";
    $login_name = "";
    $login_pass = "";
    $login_postal = "";
    $login_pref = "";
    $login_address = "";
    $login_address2 = "";
    $login_phone = "";

    $login_num1 = "";
    $login_num2 = "";
    $login_num3 = "";
    $login_num4 = "";
    $login_year = "";
    $login_month = "";
    $login_sec = "";
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
$SQL = " select * from t_fishes ";
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
         <link rel="stylesheet" href="../css/pur_mem.css">


    </head>

    <body>

        <!-- パンくずリスト -->
        <div id="pankuzu-list">
            <p>カートの中身</p>
            <p id="arrow">お客様情報の入力</p>
            <p>入力内容の確認</p>
            <p>購入完了</p>
        </div>

        <form action="pur_check.php" method="post">
            <input type="hidden" name="item_num" value="<?php print $item_num ?>">
            <div id="member">
                <h1>
                    <p><img src="../images/icon/pen.svg" width="20" height="20"></p>
                    <p>入力内容の確認</p>
                </h1>
                <section id="main-member">
                    <dl class="mainform">
                        <dt class="mainform-head">お名前<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strName" value="<?= $login_mail ?>" placeholder="山田太郎">
                        </dd>
                        <dt class="mainform-head">パスワード<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strPass" value="<?= $login_pass ?>" placeholder="123456789abc">
                        </dd>
                        <dt class="mainform-head">郵便番号<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strPostal" value="<?= $login_postal ?>" placeholder="123-4567">
                        </dd>
                        <dt class="mainform-head">都道府県<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <select name="strPref">
                            <?php
                                require "../aryPref.php";
                                for($i=0;$i<count($aryPref);$i++){
                                    print '<option value="'.$i.'">'.$aryPref[$i].'</option><br />';
                                }
                            ?>
                            </select>
                        </dd>
                        <dt class="mainform-head">住所1:市区町村・町名番地<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strAddr" value="<?= $login_address ?>" class="inputtext-addr">
                        </dd>
                        <dt class="mainform-head">住所2:建物名・部屋番号</dt>
                        <dd class="mainform-body">
                            <input type="text" name="strAddr2" value="<?= $login_address2 ?>" class="inputtext-addr">
                        </dd>
                        <dt class="mainform-head">電話番号<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strPhone" value="<?= $login_phone ?>" placeholder="080-1234-5678">
                        </dd>
                        <dt class="mainform-head">メールアドレス<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" name="strMail" value="<?= $login_mail ?>" class="inputtext-mail">
                        </dd>
                    </dl>
                </section>
            </div>

            <div id="card">
                <h1>
                    <p><img src="../images/icon/card.svg" width="20" height="20" /></p>
                    <p>お支払い方法</p>
                </h1>
                <div id="card-contents">
                    <dl class="mainform">
                        <dt class="mainform-head">経済の種類</dt>
                        <dd class="mainform-body"><input type="radio" checked>クレジットカード</dd>
                    </dl>
                    <div id="card-number">
                        <dl class="mainform">
                            <dt class="mainform-head">カード番号</dt>
                            <dd class="mainform-body">
                                <input type="text" class="pay-number" name="strNum1" value="<?= $login_num1 ?>" maxlength="4" >-
                                <input type="text" class="pay-number" name="strNum2" value="<?= $login_num2 ?>" maxlength="4" >-
                                <input type="text" class="pay-number" name="strNum3" value="<?= $login_num3 ?>" maxlength="4" >-
                                <input type="text" class="pay-number" name="strNum4" value="<?= $login_num4 ?>" maxlength="4" >
                            </dd>
                            <dt class="mainform-head">有効期限</dt>
                            <dd class="mainform-body">
                                <select name="strMonth">
                                    <?php
                                    require "../aryMonth.php";
                                    for($i=0;$i<count($aryPref);$i++){
                                        print '<option value="'.$i.'">'.$aryPref[$i].'</option><br />';
                                    }
                                    ?>
                                </select>月/
                                <select name="strYear">
                                    <?php
                                    require "../aryYear.php";
                                    for($i=0;$i<count($aryPref);$i++){
                                        print '<option value="'.$i.'">'.$aryPref[$i].'</option><br />';
                                    }
                                    ?>
                                </select>年/
                            </dd>
                            <dt class="mainform-head">セキュリティ番号</dt>
                            <dd class="mainform-body"><input type="text" class="pay-sec" name="strSec_num" maxlength="3" value="<?= $login_sec ?>"></dd>
                        </dl>
                    </div>
                </div>
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
                <a href="pur_cart.php?code=" id="back_btn">カートの中身を変更する</a>
                <input id="next_btn" type="submit" value="購入手続きへ" />
            </div>
        </form>

    </body>

</html>
