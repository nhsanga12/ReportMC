<?php
	global $msgcont, $id, $config;
	if (isset($_POST['name'])) {
		$rs['detail']	 =	" - Tên: ".$_POST['name']."<br/>\n";
		$rs['detail']	.=	" - Địa chỉ: ".$_POST['address']."<br/>\n";
		$rs['detail']	.=	" - Điện thoại: ".$_POST['phone']."<br/>\n";
		$rs['detail']	.=	" - Email: ".$_POST['email']."<br/>\n";
		$rs['detail']	.=	" - Nội dung: ".$_POST['content']."<br/>\n";
		//$rs['detail']	 =	sys_sign1($rs['detail']);
		$rs['from_name'] =	$_POST['name'];
		//$rs['from_name'] =	sys_sign1($rs['from_name']);
		$rs['from_email']=	$_POST['email'];
		$rs['to_email']  =	"minhchat@vnn.vn";
		//$rs['to_email']  =	"binhmoto@gmail.com";
		$rs['subject']   =	"Thông tin liên hệ của khách hàng";
		//$rs['subject'] =	sys_sign1($rs['subject']);
		sys_mail($rs);
		if ($config['default_language'] == 'vn')
			$msgcont	=	"Thông tin của bạn đã được gởi";
		else
			$msgcont	=	"Completed";
	}
?>