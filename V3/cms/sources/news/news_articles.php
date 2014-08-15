<?php
	if ($id['option'] == "main") {
		$sql = "SELECT art.id, detail.title, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article ";
		$sql.= "WHERE title LIKE '%".addslashes($id['search'])."%' AND detail.language = 'vn' AND art.category= '".$id['category']."' ORDER BY art.bydate DESC ";
		$pages['rs']		=	sql_exit($sql);
		$pages['page']		=	ceil($pages['rs']/$config['limit_on_page']);
		$pages['current']	=	$id['page'] ? $id['page'] : 1;
		$pages['begin']		= 	($pages['current'] - 1) * $config['limit_on_page'];
		$sql.= "LIMIT ".$pages['begin'].",".$config['limit_on_page'];
		$rs_list = sql_list($sql);
	}
	if ($id['option'] == "add") {
		if (isset($_POST['submit'])) {
			if ($_POST['add_title_vn'] == '') $msg = 'Tiêu đề của bài viết cần được bổ sung !';
			if ($msg == '') {
				$rs['category']	=	$id['category'];
				$rs['picture']	=	sys_uploads('../lib/articles/','add_picture','gif|jpg|png|doc|pdf|GIF|JPG|PNG|DOC|PDF');
				$rs['status']	= 	$_POST['add_status'];
				$rs['opt']		= 	$_POST['add_opt'];
				$rs['bydate']	=	time();
				$rs['lastdate']	=	time();
				if($_POST['add_picture_text_0'] != '') 
					$rs['state_p'] = 1;
				if($_POST['add_video_text_0'] != '') 
					$rs['state_v'] = 1;
				$newid = sql_add('news_articles',$rs);
				$rsa['newestarticles'] = $newid;
				$rska['id'] = $id['groups'];
				sql_update('news_groups',$rsa,$rska); 
				$rskna['id'] = $id['category'];
				sql_update('news_categories',$rsa,$rskna); 
				for ($i=0; $i < count($lgroups); $i++) {
					$rsn['article']	=	$newid;
					$rsn['title']		= 	$_POST['add_title_'.$lgroups[$i]['key']];
					$rsn['quick']		= 	$_POST['add_quick_'.$lgroups[$i]['key']];
					$rsn['contents']	= 	$_POST['add_contents_'.$lgroups[$i]['key']];
					$rsn['language']	=	$lgroups[$i]['key'];					
					sql_add('news_articles_detail',$rsn);					
				}	
				//Thêm các hình ảnh của bài viết
				for ($j=0;$j<$config['max_pic'];$j++) {
					$title1	=	'add_picture_text_'.$j;
					$file	=	'add_picture_'.$j;
					if ($_POST[$title1] != '') {
						$rsp['title']	=	$_POST[$title1];
						$rsp['file']	=	sys_uploads('../lib/images/',$file,'gif|jpg|png|GIF|JPG|PNG');
						$rsp['article']	=	$newid;
						sql_add('picture',$rsp);
					}
				}
				//Thêm các video của bài viết
				for ($j=0;$j<$config['max_video'];$j++) {
					$title1	=	'add_video_text_'.$j;
					$file	=	'add_video_'.$j;
					$file_p	=	'add_video_picture_'.$j;
					if ($_POST[$title1] != '') {
						$rsp['title']	=	$_POST[$title1];
						$rsp['file_p']	=	sys_uploads('../lib/video/',$file_p,'gif|jpg|png|GIF|JPG|PNG');
						$rsp['file']	=	sys_uploads('../lib/video/',$file,'wmv|asf|flv|WMV|ASF|FLV');
						$rsp['article']	=	$newid;
						sql_add('video',$rsp);
					}
				}
				$msg = 'Đã thêm thành công <strong>'.$_POST['add_title_vn'].'</strong>';
			}
		}
	}
	if ($id['option'] == "edit") {
		if ($_POST['submit']) {
		$rsk['id']			=	$id['item'];
		$rsn['status']		= 	$_POST['add_status'];
		$rsn['opt']			= 	$_POST['add_opt'];
		$rsn['lastdate']	=	time();
		$npic				=	sys_uploads('../lib/articles/','add_picture','gif|jpg|png|doc|pdf|GIF|JPG|PNG|DOC|PDF');
		if ($npic != '') {
			$rsn['picture'] = $npic;
			@unlink('../lib/articles/'.$_POST['old_picture']);
		}		
		sql_update('news_articles',$rsn,$rsk); 
		for ($i=0; $i < count($lgroups); $i++) {
			$chk = sql_exit("SELECT * FROM ".$config['db_prefix']."_news_articles_detail WHERE article='".$id['item']."' AND language='".$lgroups[$i]['key']."'");
			if ($chk > 0) {
					$rsi['title']		= 	$_POST['add_title_'.$lgroups[$i]['key']];
					$rsi['quick']		= 	$_POST['add_quick_'.$lgroups[$i]['key']];
					$rsi['contents']	= 	$_POST['add_contents_'.$lgroups[$i]['key']];
					$rsnk['language']	=	$lgroups[$i]['key'];
					$rsnk['article']	=	$id['item'];
					sql_update('news_articles_detail',$rsi,$rsnk); 
			} else {
					$rsu['article']		=	$id['item'];
					$rsu['title']		= 	$_POST['add_title_'.$lgroups[$i]['key']];
					$rsu['quick']		= 	$_POST['add_quick_'.$lgroups[$i]['key']];
					$rsu['contents']	= 	$_POST['add_contents_'.$lgroups[$i]['key']];
					$rsu['language']	=	$lgroups[$i]['key'];
					sql_add('news_articles_detail',$rsu);
			}
		}	
		//Thêm các hình ảnh của bài viết
		for ($j=0;$j<$config['max_pic'];$j++) {
			$title1	=	'add_picture_text_'.$j;
			$file	=	'add_picture_'.$j;
			if ($_POST[$title1] != '') {
				$rsp['title']	=	$_POST[$title1];
				$rsp['file']	=	sys_uploads('../lib/images/',$file,'gif|jpg|png|GIF|JPG|PNG');
				$rsp['article']	=	$id['item'];
				sql_add('picture',$rsp);
			}
		}
		//Thêm các video của bài viết
		for ($j=0;$j<$config['max_video'];$j++) {
			$title1	=	'add_video_text_'.$j;
			$file	=	'add_video_'.$j;
			$file_p	=	'add_video_picture_'.$j;
			if ($_POST[$title1] != '') {
				$rsp['title']	=	$_POST[$title1];
				$rsp['file_p']	=	sys_uploads('../lib/video/',$file_p,'gif|jpg|png|GIF|JPG|PNG');
				$rsp['file']	=	sys_uploads('../lib/video/',$file,'wmv|asf|flv|WMV|ASF|FLV');
				$rsp['article']	=	$id['item'];
				sql_add('video',$rsp);
			}
		}
		$msg = 'Đã cập nhật thành công <strong>'.$_POST['add_title_vn'].'</strong>';
		}
		$sql = "SELECT art.id, art.picture, art.lastdate, art.status, art.opt, detail.language, detail.title,detail.quick,detail.contents FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article ";
		$sql.= "WHERE art.id = '".$id['item']."' ";
		$detail = sql_detail($sql);
		$sqlp = "SELECT * FROM ".$config['db_prefix']."_picture WHERE article = ".$id['item'];
		$gr_picture = sql_detail($sqlp);
		$sqlv = "SELECT * FROM ".$config['db_prefix']."_video WHERE article = ".$id['item'];
		$gr_video = sql_detail($sqlv);
	}
	if ($id['option'] == 'delete') {
		$sql = "SELECT art.id, detail.title, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article ";
		$sql.= "WHERE detail.language = 'vn' AND (";
		$item = explode(",",$id['item']);
		$i = 0;
		if ($_POST['submit']) {
			while (list($key,$value)=each($item)) {
				$rsk['id']			=	$value;
				sql_delete('news_articles',$rsk);
				$rskn['articles']	=	$value;
				sql_delete('news_articles_detail',$rskn);
				$rsp['article']	=	$value;
				//Xóa tất cả hình ảnh trong picture
				$sqlp	=	'SELECT * FROM '.$config['db_prefix'].'_picture WHERE article = '.$value;
				$cpic	=	count(sql_list($sqlp));
				for ($i=0;$i<$cpic;$i++)
					sql_delete('picture',$rsp);
				//Xóa tất cả video trong video
				$sqlv	=	'SELECT * FROM '.$config['db_prefix'].'_video WHERE article = '.$value;
				$cv	=	count(sql_list($sqlv));
				for ($i=0;$i<$cv;$i++)
					sql_delete('video',$rsp);
			}
			@header("location:?yuli=com:".$id['com'].";target:".$id['target'].";option:main;limit_on_page:".$id['limi_on_page'].";page:".$id['page'].";search:".$id['search'].";groups:".$id['groups'].";category:".$id['category']."");
		}
		while (list($key,$value)=each($item)) {
			if ($i == 0) $sql.= " art.id= '".$value."' ";
			else $sql.= " OR art.id= '".$value."' ";
			$i++;
		}
		$sql.= ") ORDER BY art.bydate DESC";
		$rs_list = sql_list($sql);
	}
?>