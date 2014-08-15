<? 
	global $config, $id;
	$link	=	'com=home';
	$link	.=	'&target=main';
	$link	.=	'&category=1';
	$link	.=	($id['searchkey']=='')?'':'&searchkey='.$id['searchkey'];
	$link	.=	($id['searchid']=='')?'':'&searchid='.$id['searchid'];
	$link	.=	'&lang='.$config['default_language'];
	$link	.=	'&file='.$id['file'];
	$link	.=	'&title='.$id['title'];
	$item		=	$_POST['i'];
	$quanlity	=	$_POST['quanlity'];
	edit_cart($item,$quanlity);
	echo "<script>window.location='".sys_link($link)."';</script>";
?>