function check(){

	var flag = 0;


	// 設定開始（必須にする項目を設定してください）

	if(document.form1.strName.value == ""){ // 「お名前」の入力をチェック

		flag = 1;

	}
	else if(document.form1.strMail.value == ""){ // 「パスワード」の入力をチェック

		flag = 1;

	}
	else if(document.form1.strPass.value == ""){

		flag = 1;

	}else if(document.form1.strPostal.value == ""){

		flag = 1;

	}else if(document.form1.strAddr.value == ""){

		flag = 1;

	}else if(document.form1.strPhone.value == ""){

		flag = 1;

	}else if(document.form1.strNum1.value == ""){

		flag = 1;

	}else if(document.form1.strNum2.value == ""){

		flag = 1;

	}else if(document.form1.strNum3.value == ""){

		flag = 1;

	}else if(document.form1.strNum4.value == ""){

		flag = 1;

	}else if(document.form1.strSec_num.value == ""){

		flag = 1;

	}

	// 設定終了


	if(flag){

		window.alert('必須項目に未入力がありました'); // 入力漏れがあれば警告ダイアログを表示
		return false; // 送信を中止

	}
	else{

		return true; // 送信を実行

	}

}