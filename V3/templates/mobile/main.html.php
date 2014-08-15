<?
	if (empty($id['category'])) 
		$id['category']=$config['home_id'];
	if(empty($id['detail']))
		$t	=	'news';
	else
		$t	=	'detail';
	if($id['category']==143) 
		echo sys_option('mobile','main','location');
	else if($id['category']==89) 
		echo sys_option('mobile','main','home');
	else if($id['category']==90 || $id['category']==91 || $id['category']==93 || $id['category']==94 || $id['category']==95) 
		echo sys_option('mobile','main',$t);
	else if($id['category']==92)
		echo sys_option('mobile','main','contact');
	else {
		if(empty($id['detail']))
			$t	=	'product';
		else
			$t	=	'detailp';
		echo sys_option('mobile','main',$t);
	}
		
?>