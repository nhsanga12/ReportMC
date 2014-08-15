<?php
function categories_select ($name = '',$grp = 0,$parentid = 0, $selected = 0, $notin = 0, $str = '', $ext='') {
		global $config;
		if ($parentid == 0) {
		echo '<select name="'.$name.'" '.$ext.'>';
		echo '<option value="">----------------------------------------</option>';
		}
		$sql = "SELECT cat.id, cat.groupid , detail.title, cat.lastdate FROM ".$config['db_prefix']."_news_categories cat RIGHT JOIN ".$config['db_prefix']."_news_categories_detail detail ON cat.id = detail.category WHERE detail.language = 'vn' AND cat.groupid='".$grp."' AND cat.parentid = '".$parentid."' ORDER BY cat.oderid, cat.id ";
		$grpcat[$parentid] = sql_list($sql);
		for ($i =0; $i < count($grpcat[$parentid]); $i++) { 
				$value = $grpcat[$parentid][$i];
				if ($notin != $value['id']) {
					echo '<option value="'.$value['id'].'"';
					if ($selected == $value['id']) echo ' selected';
					echo '>'.$str.' '.$value['title'].'</option>';
					$nstr= $str.'&nbsp;&nbsp;&nbsp;&nbsp;';
					categories_select($name,$grp,$value['id'],$selected,$notin,$nstr);
				}
		}
		if ($parentid == 0) {
		echo '</select>';
		}
}
function categories_lilink ($link = '',$grp = 0,$parentid = 0, $selected = 0) {
		global $config;
		$sql = "SELECT cat.id, cat.groupid , detail.title, cat.lastdate FROM ".$config['db_prefix']."_news_categories cat RIGHT JOIN ".$config['db_prefix']."_news_categories_detail detail ON cat.id = detail.category WHERE detail.language = 'vn' AND cat.groupid='".$grp."' AND cat.parentid = '".$parentid."' ORDER BY cat.oderid, cat.id ";
		$grpcat[$parentid] = sql_list($sql);
		if ($parentid == 0) {
		echo '<ul class="menulist" id="listMenuRoot">';
		echo "\n";
		} else {
		echo '<ul>';
		}
		echo "\n";
		for ($i =0; $i < count($grpcat[$parentid]); $i++) { 
				$value = $grpcat[$parentid][$i];
				if (sql_exit("SELECT * FROM ".$config['db_prefix']."_news_categories WHERE parentid = '".$value['id']."'") == 0) {
				echo '<li><a href="'.$link.$value['id'].'">';
				if ($selected == $value['id']) echo '<strong>';
				echo $value['title'];
				if ($selected == $value['id']) echo '</strong>';
				echo '</a>';
				echo "\n";
				} else {
				echo '<li><a href="#">';
				echo $value['title'];
				echo '</a>';
				echo "\n";
				}
				if (count_child_newscat($value['id']) > 0) {
				categories_lilink($link,$grp,$value['id'],$selected);
				}
				echo '</li>';
				echo "\n";
		}
		echo '</ul>';
		echo "\n";
}
function categories_child ($parent,$grp=0) {
	global $config, $str;
	$sql = "SELECT * FROM ".$config['db_prefix']."_news_categories WHERE parentid = '".$parent."'";
	if ($grp > 0) $sql.=" AND groupid='".$grp."'";
	$temp = sql_list($sql);
	for ($i =0; $i < count($temp); $i++) {
		$str.= ','.$temp[$i]['id'];
		categories_child($temp[$i]['id'],$grp);
	}
}
function categories_by_cat_group ($grp,$cat) {
	global $config, $news_categories;
	$sql = "SELECT cat.id, cat.groupid , detail.title,detail.contents, cat.lastdate FROM ".$config['db_prefix']."_news_categories cat RIGHT JOIN ".$config['db_prefix']."_news_categories_detail detail ON cat.id = detail.category ";
	$sql.= "WHERE detail.language = '".$config['default_language']."' AND cat.groupid= '".$grp."' AND cat.parentid = '".intval($cat)."' ORDER BY cat.bydate DESC ";
	return sql_list($sql);
}
function categories_detail($cat) {
	global $config;
	return sql_detail("SELECT cat.id, cat.groupid , detail.title,detail.contents, cat.lastdate FROM ".$config['db_prefix']."_news_categories cat RIGHT JOIN ".$config['db_prefix']."_news_categories_detail detail ON cat.id = detail.category WHERE detail.language = '".$config['default_language']."' AND cat.id='".$cat."'");
}
# For show cat in home page
function loadnewscats($link,$grpid = 0, $parent = 0, $ext = -1) {
	global $config,$category, $uncategory, $id;
	$sql = "SELECT cat.*, detail.title FROM ".$config['db_prefix']."_news_categories cat LEFT JOIN ".$config['db_prefix']."_news_categories_detail detail ON detail.category = cat.id WHERE cat.parentid = '".$parent."' AND detail.language='".$config['default_language']."'";
	if ($grpid > 0) $sql.=" AND cat.groupid = '$grpid'";
	$temp = mysql_query($sql);
	$config['query'][]	= $sql;
	$category.= '<ul id="yumenu">';
	$ext+=1;
	$sta = $ext*2+3;
	for ($i=0;$i<$sta;$i++) { $str.="&nbsp;";}
	while ($records = @mysql_fetch_array($temp)) {
		$link['news_group']			= $records['groupid'];
		$link['news_category']		= $records['category'];
		$link['item']				= $records['id'];
		$link['title']				= sys_sign($records['title']);
		if (count_child_newscat($records['id']) == 0) {
		$category.= '<li>'.$str.'<a href="'.sys_link($link).'">';
		$category.= $records['title'];
		$category.= '</a></li>';
		} else {
		$category.= '<li>'.$str.'<a href="'.sys_link($link).'">';
		$category.= $records['title'].'';
		$category.= '</a></li>';	
			if ($ext < $config['cat_show_level']-1) {
				loadnewscats($link,$grpid,$records['id'],$ext);
			} else  {
				if ($uncategory[(count($uncategory)-1)-$ext] == $records['id']) {
				loadnewscats($link,$grpid,$records['id'],$ext);
				}
			}
		}
	}
	$category.= '</ul>';
}
function unloadnewscats($id,$i=-1) {
	global $config,$uncategory;
	$sql = "SELECT cat.*, detail.title FROM ".$config['db_prefix']."_news_categories cat LEFT JOIN ".$config['db_prefix']."_news_categories_detail detail ON detail.category = cat.id WHERE cat.id = '$id' AND detail.language='".$config['default_language']."' ORDER BY cat.id";
	$temp = @mysql_query($sql);
	while ($records = @mysql_fetch_array($temp)) {
		$i++;
		$uncategory[$i] = $records['id'];
		if ($records['parentid'] >= 0) {
			unloadnewscats($records['parentid'],$i);
		}
	}
}
function count_child_newscat($id) {
	global $config;
	$sql = "SELECT * FROM ".$config['db_prefix']."_news_categories cat WHERE cat.parentid = ".$id;
	$sumoff= @mysql_num_rows(@mysql_query($sql));
	return $sumoff;
}
function get_parentid_category($id)
{
	global $config;
	$sql	= "SELECT * FROM ".$config['db_prefix']."_news_categories cat WHERE cat.id = ".$id;
	$temp	= @mysql_query($sql);
	if (count($temp) > 0) {
		$temp	= @mysql_fetch_array($temp);
		return  $temp['parentid'];
	}
	else
		return 0;
}
function get_member($id,$i=0,$str='')
{
	global $config, $listmember;
	if ($i != 0){
		$str	.=	'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;';
	}
	$listmember	.= $str;
	$listmember	.= '<b>C'.$i.'</b>|--<a href="'.sys_link('com=home@target=main@newscategory=122').'">'.$id.'</a>';
	//Tìm tất cả các thành viên có mã số người bảo trợ là $id
	$sql	= "SELECT * FROM ".$config['db_prefix']."_member mem WHERE mem.sponsorid = ".$id;
	$temp	= @mysql_query($sql);
	//Nếu danh sách này khác rỗng thì vẻ ra và lấy tiếp con của các thành viên vừa tìm được
	if (count($temp) > 0) {
		$i++;//echo $i;
		while ($record = @mysql_fetch_array($temp)) {
			$listmember	.= '<br/>'.$str.$str.'&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;<br/>';
			get_member($record['idm'],$i,$str);
			//$listmember	.= '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;';
		}
	}
}
# For show cat in home page
?>