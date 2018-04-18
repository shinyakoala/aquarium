<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//商品を全部消すページ
session_start();
if(isset($_GET["del"])){
    session_unset();
    header("Location: ../aqua.php");
    exit();
}else{
    echo ('エラー発生<br> <form action="../aqua.php"><input type="submit" value="戻る"><form>');
}

?>