<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("mysqlenv.php");

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
//魚を持ってくるの変数
$fish_id = 1;

//  クエリー送信(選択クエリー)
//t_fishsのデータ(plant)全抽出
$SQL_fish = "select * from t_fishes, t_genre where";
$SQL_fish .= " t_fishes.genre_id = t_genre.genre_id and";
$SQL_fish .= " t_genre.genre_id = ".$fish_id."";
$SQL_fish .= " order by fish_code desc;";

if(!$SqlRes_fish = mysqli_query($Link,$SQL_fish)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL_fish);
}

//  連想配列への抜出（全件配列に格納）
while($Row_fish = mysqli_fetch_array($SqlRes_fish)){
  //  データが存在する間処理される
  $RowAry_fish[] = $Row_fish;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry_plant[0]["fish_code"]
$RowAry_plant[0]["fish_name"]
$RowAry_plant[0]["fish_price"]
$RowAry_plant[0]["fish_comment"]
$RowAry_plant[0]["fish_img"]
$RowAry_plant[0]["genre_id"]

$RowAry_plant[1]["fish_code"]
$RowAry_plant[1]["fish_name"]
$RowAry_plant[1]["fish_price"]
$RowAry_plant[1]["fish_comment"]
$RowAry_plant[1]["fish_img"]
$RowAry_plant[1]["genre_id]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows_fish = mysqli_num_rows($SqlRes_fish);


//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes_fish);


/*********************************************************/

//水草を持ってくるの変数
$plant_id = 2;

//  クエリー送信(選択クエリー)
//t_fishsのデータ(plant)全抽出
$SQL_plant = "select * from t_fishes, t_genre where";
$SQL_plant .= " t_fishes.genre_id = t_genre.genre_id and";
$SQL_plant .= " t_genre.genre_id = ".$plant_id."";
$SQL_plant .= " order by fish_code desc;";

if(!$SqlRes_plant = mysqli_query($Link,$SQL_plant)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL_plant);
}

//  連想配列への抜出（全件配列に格納）
while($Row_plant = mysqli_fetch_array($SqlRes_plant)){
  //  データが存在する間処理される
  $RowAry_plant[] = $Row_plant;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry_plant[0]["fish_code"]
$RowAry_plant[0]["fish_name"]
$RowAry_plant[0]["fish_price"]
$RowAry_plant[0]["fish_comment"]
$RowAry_plant[0]["fish_img"]
$RowAry_plant[0]["genre_id"]

$RowAry_plant[1]["fish_code"]
$RowAry_plant[1]["fish_name"]
$RowAry_plant[1]["fish_price"]
$RowAry_plant[1]["fish_comment"]
$RowAry_plant[1]["fish_img"]
$RowAry_plant[1]["genre_id]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows_plant = mysqli_num_rows($SqlRes_plant);


//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes_plant);

/*********************************************************/

/*********************************************************/

//フードを持ってくるの変数
$food_id = 3;

//  クエリー送信(選択クエリー)
//t_fishsのデータ(plant)全抽出
$SQL_food = "select * from t_fishes, t_genre where";
$SQL_food .= " t_fishes.genre_id = t_genre.genre_id and";
$SQL_food .= " t_genre.genre_id = ".$food_id."";
$SQL_food .= " order by fish_code desc;";

if(!$SqlRes_food = mysqli_query($Link,$SQL_food)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL_food);
}

//  連想配列への抜出（全件配列に格納）
while($Row_food = mysqli_fetch_array($SqlRes_food)){
  //  データが存在する間処理される
  $RowAry_food[] = $Row_food;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry_plant[0]["fish_code"]
$RowAry_plant[0]["fish_name"]
$RowAry_plant[0]["fish_price"]
$RowAry_plant[0]["fish_comment"]
$RowAry_plant[0]["fish_img"]
$RowAry_plant[0]["genre_id"]

$RowAry_plant[1]["fish_code"]
$RowAry_plant[1]["fish_name"]
$RowAry_plant[1]["fish_price"]
$RowAry_plant[1]["fish_comment"]
$RowAry_plant[1]["fish_img"]
$RowAry_plant[1]["genre_id]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows_food = mysqli_num_rows($SqlRes_food);


//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes_food);

/*********************************************************/

/*********************************************************/

//フードを持ってくるの変数
$other_id = 4;

//  クエリー送信(選択クエリー)
//t_fishsのデータ(plant)全抽出
$SQL_other = "select * from t_fishes, t_genre where";
$SQL_other .= " t_fishes.genre_id = t_genre.genre_id and";
$SQL_other .= " t_genre.genre_id = ".$other_id."";
$SQL_other .= " order by fish_code desc;";

if(!$SqlRes_other = mysqli_query($Link,$SQL_other)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $SQL_other);
}

//  連想配列への抜出（全件配列に格納）
while($Row_other = mysqli_fetch_array($SqlRes_other)){
  //  データが存在する間処理される
  $RowAry_other[] = $Row_other;
}

/*********************************
抜き出された連想配列(二次元配列)

$RowAry_plant[0]["fish_code"]
$RowAry_plant[0]["fish_name"]
$RowAry_plant[0]["fish_price"]
$RowAry_plant[0]["fish_comment"]
$RowAry_plant[0]["fish_img"]
$RowAry_plant[0]["genre_id"]

$RowAry_plant[1]["fish_code"]
$RowAry_plant[1]["fish_name"]
$RowAry_plant[1]["fish_price"]
$RowAry_plant[1]["fish_comment"]
$RowAry_plant[1]["fish_img"]
$RowAry_plant[1]["genre_id]
...
**********************************/

//  抜き出されたレコード件数を求める
$NumRows_other = mysqli_num_rows($SqlRes_other);


//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($SqlRes_other);

/*********************************************************/

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}

?>
<!DOCTYPE html>

<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>アクア de ショップ 3D</title>
        <meta name="viewport" content="width=device-width">
        
        <!-- cssスタイルシート -->
         <link rel="stylesheet" href="css/reset.css">
         <link rel="stylesheet" href="css/aqua.css">
        
        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        
        <!-- switching.js -->
        <script type="text/javascript" src="js/switching.js"></script>
        
    </head>

    <body>
        <!-- ログイン,カートなど -->
        <div id="option">
            <a href="index.php">戻る</a>
            <a href="purchase/pur_cart.php?code=">カート</a>  
            <?php if(isset($_SESSION["login_name"]) == ""){ ?>
                <a href="login/login_input.php">ログイン</a>
                <a href="insert/insert_input.php">新規登録</a>
            <?php }elseif(isset($_SESSION["login_name"]) != ""){?>
                <a href="javascript:void(0)" class="cursor"><?php print $_SESSION["login_name"] ?></a>
                <a href="login/logout.php">ログアウト</a>
            <?php } ?>
        </div>
        
        <header>
            <img src="images/header.png" />
        </header>
        
        <nav>
            <div class="item_1">
                <p>水草類</p>
            </div>
            <div class="item_2">
                <p>熱帯魚</p>
            </div>
            
            <div class="icon"></div>
            
            <div class="item_3">
                <p>フード</p>
            </div>
            <div class="item_4">
                <p>その他</p>
            </div>
        </nav>
        <!--  -->
        <div id="item_list">
            <div id="img_info">
                <p>上のナビゲーションを押すことでここに新入荷商品の画像が表示されます。</p>
            </div>
<?php
?>
            <?php for($i=0;$i<4;$i++){ ?>
            <div class="item_1">
                <a href="purchase/pur_cart.php?code=<?= $RowAry_plant[$i]["fish_code"] ?>">
                    <dl class="item_info">
                        <img src="images/item/<?= $RowAry_plant[$i]["fish_img"] ?>" width="200" height="200" alt="fish"/>
                        <div class="item_contents">
                            <dt class="item_head">名前:</dt>
                            <dd class="item_body"><?= $RowAry_plant[$i]["fish_name"] ?></dd>
                            <dt class="item_head">値段:</dt>
                            <dd class="item_body"><?= $RowAry_plant[$i]["fish_price"] ?>円</dd>
                            <dt class="item_head">記載</dt>
                            <dd class="item_body"><?= $RowAry_plant[$i]["fish_comment"] ?></dd>
                        </div>
                    </dl>
                </a>
            </div>
            <?php } ?>

            <?php for($i=0;$i<4;$i++){ ?>
            <div class="item_2">
                <a href="purchase/pur_cart.php?code=<?php print $RowAry_fish[$i]["fish_code"] ?>">
                    <dl class="item_info">
                        <img src="images/item/<?= $RowAry_fish[$i]["fish_img"] ?>" width="200" height="200" alt="fish"/>
                        <div class="item_contents">
                            <dt class="item_head">名前:</dt>
                            <dd class="item_body"><?= $RowAry_fish[$i]["fish_name"] ?></dd>
                            <dt class="item_head">値段:</dt>
                            <dd class="item_body"><?= $RowAry_fish[$i]["fish_price"] ?>円</dd>
                            <dt class="item_head">記載</dt>
                            <dd class="item_body"><?= $RowAry_fish[$i]["fish_comment"] ?></dd>
                        </div>
                    </dl>
                </a>
            </div>
            <?php } ?>

            <?php for($i=0;$i<4;$i++){ ?>
                <div class="item_3">
                    <a href="purchase/pur_cart.php?code=<?php print $RowAry_food[$i]["fish_code"] ?>">
                        <dl class="item_info">
                            <img src="images/item/<?= $RowAry_food[$i]["fish_img"] ?>" width="200" height="200" alt="fish"/>
                            <div class="item_contents">
                                <dt class="item_head">名前:</dt>
                                <dd class="item_body"><?= $RowAry_food[$i]["fish_name"] ?></dd>
                                <dt class="item_head">値段:</dt>
                                <dd class="item_body"><?= $RowAry_food[$i]["fish_price"] ?>円</dd>
                                <dt class="item_head">記載</dt>
                                <dd class="item_body"><?= $RowAry_food[$i]["fish_comment"] ?></dd>
                            </div>
                        </dl>
                    </a>
                </div>
                <?php } ?>
            
            <?php for($i=0;$i<4;$i++){ ?>
                <div class="item_4">
                    <a href="purchase/pur_cart.php?code=<?php print $RowAry_other[$i]["fish_code"] ?>">
                        <dl class="item_info">
                            <img src="images/item/<?= $RowAry_other[$i]["fish_img"] ?>" width="200" height="200" alt="fish"/>
                            <div class="item_contents">
                                <dt class="item_head">名前:</dt>
                                <dd class="item_body"><?= $RowAry_other[$i]["fish_name"] ?></dd>
                                <dt class="item_head">値段:</dt>
                                <dd class="item_body"><?= $RowAry_other[$i]["fish_price"] ?>円</dd>
                                <dt class="item_head">記載</dt>
                                <dd class="item_body"><?= $RowAry_other[$i]["fish_comment"] ?></dd>
                            </div>
                        </dl>
                    </a>
                </div>
                <?php } ?>
            
        </div>
        
    </body>

</html>