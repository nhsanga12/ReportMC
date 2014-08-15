<? 
	global $config, $id;
	$link	=	'com=home';
	$link	.=	'&target=main';
	$link	.=	'&category='.$id['category'];
	$link	.=	($id['searchkey']=='')?'':'&searchkey='.$id['searchkey'];
	$link	.=	($id['searchid']=='')?'':'&searchid='.$id['searchid'];
	$link	.=	'&lang='.$config['default_language'];
	$link	.=	'&file='.$id['file'];
	$link	.=	'&title='.$id['title'];
	$item	=	$id['detail'];
	$id['news_detail']	=	$item;
	$detail	=	articles_detail();
	add_cart($detail[0]['title'],1,$detail[0]['picture']);
	echo "<script>window.location='".sys_link($link)."';</script>";
?>