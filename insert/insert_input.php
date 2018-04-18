<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
if(isset($_GET["strMail"]) != ""){
    $ErrMsg = $_SESSION["login_Err"];
    $strMail = $_GET["strMail"];
    $strPass = $_GET["strPass"];
    $strPostal = $_GET["strPostal"];
    $strPref = $_GET["strPref"];
    $strAddr = $_GET["strAddr"];
    $strAddr2 = $_GET["strAddr2"];
    $strPhone = $_GET["strPhone"];
    
    $strNum1 = $_GET["strNum1"];
    $strNum2 = $_GET["strNum2"];
    $strNum3 = $_GET["strNum3"];
    $strNum4 = $_GET["strNum4"];
    $strMonth = $_GET["strMonth"];
    $strYear = $_GET["strYear"];
    $strSec_num = $_GET["strSec_num"];
    
}else{
    $_SESSION["login_Err"] = "";
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
<script src="../js/check.js" type="text/javascript"></script>
<!-- PAGE TITLE -->
<title>新規登録</title>
</head>
<body>
    <div id="wrap">
        <form action="insert_check.php" name="form1" method="post" onSubmit="return check();">
            <div id="form_bottom">
                <a href="../aqua.php"><img src="../images/logo/logo.svg" / width="30%" height="30%" alt="logo"></a>
                <h1>新規登録</h1>
                <section id="main-member">
                    <h2>お客様情報</h2>
                    <dl class="mainform">
                        <dt class="mainform-head">お名前<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" class="textbox" name="strName" value="<?= $strName ?>" placeholder="お名前" />
                        </dd>
                        <dt class="mainform-head">パスワード<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="password" class="textbox" name="strPass" value="<?= $strPass ?>" placeholder="123456789abc" />
                        </dd>
                        <dt class="mainform-head">メールアドレス<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" class="textbox" name="strMail" value="<?= $strMail ?>" placeholder="メールアドレス" />
                        </dd>
                        <dt class="mainform-head">郵便番号<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" class="textbox" name="strPostal" value="<?= $strPostal ?>" placeholder="123-4567" />
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
                            <input type="text" class="textbox" name="strAddr" value="<?= $strAddr ?>" placeholder="住所1:市区町村・町名番地">
                        </dd>
                        <dt class="mainform-head">住所2:建物名・部屋番号</dt>
                        <dd class="mainform-body">
                            <input type="text" class="textbox" name="strAddr2" value="<?= $strAddr2 ?>" placeholder="住所2:建物名・部屋番号">
                        </dd>
                        <dt class="mainform-head">電話番号<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" class="textbox" name="strPhone" value="<?= $strPhone ?>" placeholder="080-1234-5678">
                        </dd>
                        <hr />
                        <h2>カード情報</h2>
                        <dl class="mainform">
                            <dt class="mainform-head">経済の種類</dt>
                            <dd class="mainform-body"><input type="radio" checked>クレジットカード</dd>
                        </dl>
                        <dt class="mainform-head">カード番号<span class="important">*必須</span></dt>
                        <dd class="mainform-body">
                            <input type="text" class="cardbox" name="strNum1" value="<?= $strNum1 ?>" placeholder="1111" maxlength="4">-
                            <input type="text" class="cardbox" name="strNum2" value="<?= $strNum2 ?>" placeholder="1111" maxlength="4">-
                            <input type="text" class="cardbox" name="strNum3" value="<?= $strNum3 ?>" placeholder="1111" maxlength="4">-
                            <input type="text" class="cardbox" name="strNum4" value="<?= $strNum4 ?>" placeholder="1111" maxlength="4">
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
                        <dd class="mainform-body"><input type="text" class="pay-sec" name="strSec_num" maxlength="3"></dd>
                    </dl>
                </section>
                <input type="submit" class="next" value="次へ">
            </div>
        </form>
    </div>
</body>
</html>
