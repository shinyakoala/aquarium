<?php
session_start();
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
if(isset($_GET["strMail"]) != ""){
    $ErrMsg = $_SESSION["login_Err"];
    $strMail = $_GET["strMail"];
    $strPass = $_GET["strPass"];
}else{
    $_SESSION["login_Err"] = "";
    $strMail = "";
    $strPass = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
               "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />

<link rel="stylesheet" href="../css/login.css" type="text/css" media="all" />
<script src="../js/check.js" type="text/javascript"></script>
<!-- PAGE TITLE -->
<title>ログイン入力画面</title>
</head>
<body>
    <div id="wrap">
        <form action="login_search.php" method="post" name="form1" onSubmit="return check();">
            <div id="form_bottom">
                <a href="../aqua.php"><img src="../images/logo/logo.svg" / width="30%" height="30%" alt="logo"></a>
                <?php if(isset($ErrMsg) != ""){
                        echo '<p class="err">メールアドレスかパスワードが間違えています。</p>';
                        }
                ?>
                <h1>ログイン</h1>
                <input type="text" class="textbox" name="strMail" value="<?= $strMail ?>" placeholder="メールアドレス">
                <input type="text" class="textbox" name="strPass" value="<?= $strPass ?>" placeholder="パスワード">
                <input type="submit" class="next" value="ログイン">
            </div>
        </form>
    </div>
</body>
</html>
