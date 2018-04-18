<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>

<?php
$num =  $code = "";
if(isset($_GET["code"])){
    $code = $_GET["code"];
}
if(!isset($_SESSION["cart"][$code])){
    //新規追加
    $_SESSION["cart"][$code] = 1;
}else{
    //数量追加
    $_SESSION["cart"][$code] += 1;
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

mysqli_free_result($SqlRes);

if(!mysqli_close($Link)){
    exit();
}
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
         <link rel="stylesheet" href="../css/pur_cart.css">
        <!-- body random images.js -->
        <script type="text/javascript" src="../js/random_images.js"></script>

    </head>

    <body>
        <!-- パンくずリスト -->
        <div id="pankuzu-list">
            <p>カートの中身</p>
            <p>お客様情報の入力</p>
            <p>入力内容の確認</p>
            <p>購入完了</p>
        </div>

        <form action="pur_mem.php" method="post">
            <div id="cart">
                <h1>
                    <p><img src="../images/icon/cart.svg" width="20" height="20" /></p>
                    <p>カートの中身</p>
                </h1>
                <div id="cartitem_row">
                    <div class="cartitem_cell cartitem_name">商品名</div>
                    <div class="cartitem_cell cartitem_price">販売価格(税込み)</div>
                    <div class="cartitem_cell cartitem_num">数量</div>
                    <div class="cartitem_cell cartitem_del">削除</div>
                </div>

                <?php //if(isset($RowAry) != ""){?>
                    <?php for($i = 0; $i<count($RowAry); $i++): ?>
                        <div class="cartcontents_row">
                            <div class="cartcontents_cell cartcontents_name"><?php print $RowAry[$i]["fish_name"] ?> </div>
                            <div class="cartcontents_cell cartcontents_price"><?php print $RowAry[$i]["fish_price"] ?></div>
                            <div class="cartcontents_cell cartcontents_num">
                                <input type="number" name="item_num" min="1" max="3" value="<?= $_SESSION["cart"][$RowAry[$i]["fish_code"]] ?>">
                            </div>
                            <div class="cartcontents_cell cartcontents_del">
                                <a href="pur_cart.php?del">
                                    <img src="../images/icon/batu.svg" width="18" height="18">
                                </a>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php //} ?>
                <a id="del" href="pur_del.php?del=">すべて消す</a>

            </div>

            <div id="btn">
                <a href="../aqua.php" id="back_btn">買い物に戻る</a>
                <input id="next_btn" type="submit" value="購入手続きへ" />
            </div>
        </form>

    </body>

</html>
