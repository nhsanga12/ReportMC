<?php
	if ($id['option'] == "main") {
		$sql = "SELECT * FROM ".$config['db_prefix']."_languagesgroups ";
		$sql.= "WHERE title LIKE '%".addslashes($id['search'])."%' ORDER BY bydate DESC ";
		$pages['rs']		=	sql_exit($sql);
		$pages['page']		=	ceil($pages['rs']/$config['limit_on_page']);
		$pages['current']	=	$id['page'] ? $id['page'] : 1;
		$pages['begin']		= 	($pages['current'] - 1) * $config['limit_on_page'];
		$sql.= "LIMIT ".$pages['begin'].",".$config['limit_on_page'];
		$rs_list = sql_list($sql);
	}
	if ($id['option'] == "add") {
		if (isset($_POST['submit'])) {
			if ($_POST['add_title'] == '') $msg = 'Tiêu đề của nhóm ngôn ngữ cần được bổ sung !';
			if ($msg == '') {
				$rs['language']	=	$_POST['add_language'];
				$rs['title']	= 	$_POST['add_title'];
				$rs['bydate']	=	time();
				$rs['lastdate']	=	time();
				$newid = sql_add('languagesgroups',$rs);
				$msg = 'Đã thêm thành công <strong>'.$_POST['add_title'].'</strong>';
			}
		}
	}
	if ($id['option'] == "edit") {
		if ($_POST['submit']) {
		$rsn['language']		=	$_POST['add_language'];
		$rsn['title']		=	$_POST['add_title'];
		$rsk['id']			=	$id['item'];
		sql_update('languagesgroups',$rsn,$rsk);		
		$msg = 'Đã cập nhật thành công <strong>'.$_POST['add_title'].'</strong>';
		}
		$sql = "SELECT * FROM ".$config['db_prefix']."_languagesgroups ";
		$sql.= "WHERE id = '".$id['item']."' ";
		$detail = sql_detail($sql);
	}
	if ($id['option'] == 'delete') {
		$sql = "SELECT * FROM ".$config['db_prefix']."_languagesgroups ";
		$sql.= "WHERE ";
		$item = explode(",",$id['item']);
		$i = 0;
		if ($_POST['submit']) {
			while (list($key,$value)=each($item)) {
				$rsk['id']			=	$value;
				sql_delete('languagesgroups',$rsk);
			}
			@header("location:?yuli=com:".$id['com'].";target:".$id['target'].";option:main;limit_on_page:".$id['limi_on_page'].";page:".$id['page'].";search:".$id['search']."");
		}
		while (list($key,$value)=each($item)) {
			if ($i == 0) $sql.= " id= '".$value."' ";
			else $sql.= " OR id= '".$value."' ";
			$i++;
		}
		$sql.= " ORDER BY bydate DESC";
		$rs_list = sql_list($sql);
	}
?>