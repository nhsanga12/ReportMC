<?php
function articles_by_cat_d($cat,$item,$k) {
	global $id, $config, $pages, $news_articles, $str;
	$sql = "SELECT art.id, art.opt, art.picture, detail.title, art.category, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND art.id ".$k." ".$item." AND ( ";
	$sql.= " art.category= '".$cat."";
	$str = '';
	categories_child($cat,18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	if ($k=='<') $temp='DESC'; else $temp='ASC';
	$sql.= $str." ) ORDER BY art.bydate ".$temp." ";
	$sql.= "LIMIT 1";
	$news_articles = sql_list($sql);
	return $news_articles;
}
function articles_by_cat() {
	global $id, $config, $pages, $news_articles, $str;
	$sql = "SELECT art.id, art.picture, art.opt, detail.title, art.category, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND ( ";
	$sql.= " art.category= '".$id['newscategory']."";
	$str = '';
	categories_child($id['newscategory'],18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	$sql.= $str." ) ORDER BY art.bydate DESC ";
	$pages['rs']		=	sql_exit($sql);
	$pages['page']		=	ceil($pages['rs']/$config['limit_on_page_p']);
	$pages['current']	=	$id['page'] ? $id['page'] : 1;
	$pages['begin']		= 	($pages['current'] - 1) * $config['limit_on_page_p'];
	$sql.= "LIMIT ".$pages['begin'].",".$config['limit_on_page_p'];
	$news_articles = sql_list($sql);
	return $news_articles;
}
function articles_by_cat_opt($cat=91,$opt=0) {
	global $id, $config, $pages, $news_articles, $str;
	$sql = "SELECT art.id, art.picture, detail.title, art.category, art.opt, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND art.opt = '".$opt."' AND ( ";
	$sql.= " art.category= '".$cat."";
	$str = '';
	categories_child($cat,18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	$sql.= $str." ) ORDER BY art.lastdate DESC ";
	$pages['rs']		=	sql_exit($sql);
	$pages['page']		=	ceil($pages['rs']/$config['limit_on_page_p']);
	$pages['current']	=	$id['page'] ? $id['page'] : 1;
	$pages['begin']		= 	($pages['current'] - 1) * $config['limit_on_page_p'];
	$sql.= "LIMIT ".$pages['begin'].",".$config['limit_on_page_p'];
	$news_articles = sql_list($sql);
	return $news_articles;
}
function articles_by_cat_rand($idn,$count) {
	global $id, $config, $pages, $news_articles, $str;
	$sql = "SELECT art.id, art.picture, detail.title, art.category, art.opt, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND ( ";
	$sql.= " art.category= '".$idn."";
	$str = '';
	categories_child($idn,18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	$sql.= $str." ) ORDER BY RAND() ";	
	$sql.= "LIMIT ".$count;
	$news_articles = sql_list($sql);
	return $news_articles;
}
function new_articles_by_cat($cat,$limit=5,$sid=0) {
	global $id, $config, $str;
	$sql = "SELECT art.id, art.picture, detail.title, art.opt, art.category, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."'";
	if ($sid > 0) $sql.= " AND art.id <> '".$sid."'";
	$sql.= " AND art.status = '2' AND ( ";
	$sql.= " art.category= '".$cat."";
	$str = '';
	categories_child($cat,18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	$sql.= $str." ) ORDER BY art.bydate DESC ";
	$sql.= "LIMIT ".$limit;	
	return sql_list($sql);
}
function articles_detail() {
	global $id,$config;
	$sql = "SELECT art.id, art.picture, detail.title, art.category, art.opt, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid  WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND art.id = '".$id['news_detail']."'";
	$detail = sql_detail($sql);
	return $detail;
}
function get_video($ida='',$count=8) {
	global $config;
	$sql = "SELECT v.* FROM ".$config['db_prefix']."_video v";
	if ($ida != '')
		$sql .= " WHERE v.article = ".$ida;
	$sql.= " ORDER BY v.id DESC LIMIT ".$count;
	return sql_list($sql);	
}
function vp_detail($idv,$cat) {
	global $config;
	$sql = "SELECT v.* FROM ".$config['db_prefix']."_".$cat." v WHERE v.id = ".$idv;
	return sql_detail($sql);
}
function get_picture($ida='',$count=20) {
	global $config;
	$sql = "SELECT p.* FROM ".$config['db_prefix']."_picture p";
	if ($ida != '')
		$sql .= " WHERE p.article = ".$ida;
	$sql.= " ORDER BY p.id DESC LIMIT ".$count;
	return sql_list($sql);	
}
function news_search($cat,$dist,$key) {
	global $id, $config, $pages, $news_articles, $str;
	$sql = "SELECT art.id, art.picture, detail.title, art.category, grp.id AS news_groups, detail.quick, detail.contents, art.lastdate FROM ".$config['db_prefix']."_news_articles art RIGHT JOIN ".$config['db_prefix']."_news_articles_detail detail ON art.id = detail.article RIGHT JOIN ".$config['db_prefix']."_news_categories cat ON cat.id = art.category  RIGHT JOIN ".$config['db_prefix']."_news_groups grp ON grp.id = cat.groupid ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND art.status = '2' AND ( ";
	$sql.= " art.category= '".$cat."";
	$str = '';
	categories_child($cat,18);
	if ($str != '') {
		$str = str_replace(',',"' OR art.category = '",$str);
	}
	$str.= "'";
	$sql.= $str." )";
	if ($dist != '')
		$sql.= " AND detail.dist = ".$dist;
	if ($key == 'Từ khóa' || $key == 'Keyword')
		$key = '';
	$sql.= " AND ( detail.title LIKE '%".$key."%' OR detail.contents LIKE '%".$key."%' )";
	$sql.= " ORDER BY art.bydate DESC ";
	$pages['rs']		=	sql_exit($sql);
	$pages['page']		=	ceil($pages['rs']/$config['limit_on_page_p']);
	$pages['current']	=	$id['page'] ? $id['page'] : 1;
	$pages['begin']		= 	($pages['current'] - 1) * $config['limit_on_page_p'];
	$sql.= "LIMIT ".$pages['begin'].",".$config['limit_on_page_p'];
	$news_articles = sql_list($sql);
	//echo $sql;
	return $news_articles;
}
?>