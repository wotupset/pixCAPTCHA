<?php
header('Content-type: text/html; charset=utf-8');
$phpself=basename($_SERVER["SCRIPT_FILENAME"]);//被執行的文件檔名
extract($_POST,EXTR_SKIP);extract($_GET,EXTR_SKIP);extract($_COOKIE,EXTR_SKIP);
//
switch($mode){
	case 'reg':
		session_start(); 
		echo htmlhead();
		$code=$_SESSION["VerifyCode"];
		if(strtolower($input_a) == strtolower($code)){
			echo "正確";
		}else{
			echo "錯誤";
		}
		echo '<img src="./pixcap.php"/><br/>';
		echo inputform();
		echo htmlend();
	break;
	default:
		echo htmlhead();
		echo '<img src="./pixcap.php"/><br/>';
		echo inputform();
		echo htmlend();
	break;

}
//
function inputform(){
$x=<<<EOT
<form enctype="multipart/form-data" action='$phpself' method="post">
<input type="hidden" name="mode" value="reg">
<input type="text" name="input_a" id="input_a" size="20" value="">
<input type="submit" value=" send ">
</form>
EOT;
$x="\n".$x."\n";
return $x;
}

function htmlhead(){
$x=<<<EOT
<html><head>
<title>CAPTCHA</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head><body>
EOT;
$x="\n".$x."\n";
return $x;
}
//echo htmlhead();
function htmlend(){
$x=<<<EOT
</body></html>
EOT;
$x="\n".$x."\n";
return $x;
}
//echo htmlend();
?> 