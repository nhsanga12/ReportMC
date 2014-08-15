<?php
	if (isset($_POST['submit'])) {
		$sql = "SELECT * FROM ".$config['db_prefix']."_admin WHERE username='".addslashes($_POST['username'])."'";
		$authchk	= sql_detail($sql);
		if ($authchk[0]['username']	==	'') {
			$msg 	= 	'Tên đăng nhập không tồn tại';
		} else if (md5(md5(md5($_POST['password']))) != $authchk[0]['password']) {
			$msg	=	'Mật khẩu không đúng';
		} else {
			$_SESSION['auth']['login']		= true;
			$_SESSION['auth']['name']		= $authchk[0]['name'];
			$_SESSION['auth']['id']		= $authchk[0]['id'];
			@header("location:?yuli=com:system;target:home");
		}
	}
?>