<?php
	if ($id['option'] == "main") {
		$sql = "SELECT * FROM ".$config['db_prefix']."_advs con ";
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
			if ($_POST['add_title'] == '') $msg = 'Tiêu đề của khóa cấu hình cần được bổ sung !';
			if ($msg == '') {
				$picture = sys_uploads('../lib/banner/','add_pic_upload');
				$rs['title']	=	$_POST['add_title'];
				$rs['link']		=	$_POST['add_link'];
				$rs['pic_url']	=	$_POST['add_pic_url'];
				$rs['pic_upload']=	$picture;
				$rs['pic_type']	=	$_POST['add_pic_type'];
				$rs['pic_width']=	$_POST['add_pic_width'];
				$rs['pic_height']=	$_POST['add_pic_height'];
				$rs['pic_position']=	$_POST['add_pic_position'];
				$rs['pic_place']=	$_POST['add_pic_place'];
				$rs['bydate']	=	time();
				$rs['lastdate']	=	time();
				$add_live = explode("/",$_POST['add_live']);
				$livetodate = mktime(23,59,59,$add_live[1],$add_live[0],$add_live[2]);
				$rs['livetodate']=	$livetodate;
				$newid = sql_add('advs',$rs);
				$msg = 'Đã thêm thành công <strong>'.$_POST['add_title'].'</strong>';
			}
		}
	}
	if ($id['option'] == "edit") {
		if ($_POST['submit']) {
		$rsk['id']		=	$id['item'];
		$picture = sys_uploads('../lib/banner/','add_pic_upload');
		$rs['pic_url']	=	'';
		if ($_POST['add_pic_url'] != '') {
			@unlink('../lib/banner/'.$_POST['old_upload']);
			@unlink('../lib/banner/'.$picture);
			$rs['pic_url']	=	$_POST['add_pic_url'];
		}
		if ($picture != '') {
			@unlink('../lib/banner/'.$_POST['old_upload']);
			$rs['pic_upload']=	$picture;
		}
		$rs['title']	=	$_POST['add_title'];
		$rs['link']		=	$_POST['add_link'];
		$rs['pic_type']	=	$_POST['add_pic_type'];
		$rs['pic_width']=	$_POST['add_pic_width'];
		$rs['pic_height']=	$_POST['add_pic_height'];
		$rs['pic_position']=	$_POST['add_pic_position'];
		$rs['pic_place']=	$_POST['add_pic_place'];
		$rs['lastdate']	=	time();
		$add_live = explode("/",$_POST['add_live']);
		$livetodate = mktime(23,59,59,$add_live[1],$add_live[0],$add_live[2]);
		$rs['livetodate']=	$livetodate;
		sql_update('advs',$rs,$rsk); 
		$msg = 'Đã cập nhật thành công <strong>'.$_POST['add_title'].'</strong>';
		}
		$sql = "SELECT * FROM ".$config['db_prefix']."_advs ";
		$sql.= "WHERE id = '".$id['item']."' ";
		$detail = sql_detail($sql);
	}
	if ($id['option'] == 'delete') {
		$sql = "SELECT * FROM ".$config['db_prefix']."_advs ";
		$sql.= "WHERE (";
		$item = explode(",",$id['item']);
		$i = 0;
		if ($_POST['submit']) {
			while (list($key,$value)=each($item)) {
				$rsk['id']			=	$value;
				sql_delete('advs',$rsk);
			}
			@header("location:?yuli=com:".$id['com'].";target:".$id['target'].";option:main;limit_on_page:".$id['limi_on_page'].";page:".$id['page'].";search:".$id['search']."");
		}
		while (list($key,$value)=each($item)) {
			if ($i == 0) $sql.= " id= '".$value."' ";
			else $sql.= " OR id= '".$value."' ";
			$i++;
		}
		$sql.= ") ORDER BY  bydate DESC";
		$rs_list = sql_list($sql);
	}
?>