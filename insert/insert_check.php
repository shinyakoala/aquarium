<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
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
<title>新規登録 確認画面</title>
</head>
<body>
    <div id="wrap">
        <form action="insert_ex.php" method="post">
            <div id="form_bottom">
                <a href="../aqua.php"><img src="../images/logo/logo.svg" / width="30%" height="30%" alt="logo"></a>
                <?php if(isset($strMail) != ""){ ?>
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
                
                <h1>以下の内容で登録しますか？</h1>
                <section id="main-member">
                    <dl class="mainform">
                        <dt class="mainform-head">お名前</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strName); ?>
                        </dd>
                        <dt class="mainform-head">パスワード</dt>
                        <dd class="mainform-body">
                            <?php print "セキュリティ上、表示されません。" ?>
                        </dd>
                        <dt class="mainform-head">メールアドレス</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strMail); ?>
                        </dd>
                        <dt class="mainform-head">郵便番号</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strPostal); ?>
                        </dd>
                        <dt class="mainform-head">都道府県</dt>
                        <dd class="mainform-body">
                            <?php
                            require "../aryPref.php";
                            print $aryPref[ $_POST["strPref"] ].'<br />';
                            ?>
                        </dd>
                        <dt class="mainform-head">住所1:市区町村・町名番地</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strAddr); ?>
                        </dd>
                        <?php if(isset($strAddr2) != ""){?>
                        <dt class="mainform-head">住所2:建物名・部屋番号</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strAddr2); ?>
                        </dd>
                        <?php } ?>
                        <dt class="mainform-head">電話番号</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strPhone); ?>
                        </dd>
                        <hr />
                        <h2>カード情報</h2>
                        <dl class="mainform">
                            <dt class="mainform-head">経済の種類</dt>
                            <dd class="mainform-body"><input type="radio" checked>クレジットカード</dd>
                        </dl>
                        <dt class="mainform-head">カード番号</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strNum1); ?>-
                            <?php print htmlspecialchars($strNum2); ?>-
                            <?php print htmlspecialchars($strNum3); ?>-
                            <?php print htmlspecialchars($strNum4); ?>
                        </dd>
                        <dt class="mainform-head">有効期限</dt>
                            <dd class="mainform-body">
                                    <?php
                                    require "../aryMonth.php";
                                    print $aryPref[ $_POST["strMonth"] ];
                                    ?>/
                                    <?php
                                    require "../aryYear.php";
                                    print $aryPref[ $_POST["strYear"] ].'<br />';
                                    ?>
                            </dd>
                        <dt class="mainform-head">セキュリティ番号</dt>
                        <dd class="mainform-body">
                            <?php print htmlspecialchars($strSec_num); ?>
                        </dd>
                    </dl>
                </section>
                <?php } ?>
                <a href="insert_input.php"></a>
                <input type="submit" class="next" value="次へ">
            </div>
        </form>
    </div>
</body>
</html>
