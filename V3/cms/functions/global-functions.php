<?php
function count_cart(){
	return $_SESSION['cart']['count'];
}
function check_cart($additem) {
	$n = count_cart()+1;
	$rs = false;
	for ($i = 1; $i < $n; $i++){
		if ($additem == $_SESSION['cart']['item'][$i]) { 
		$rs = $i;		
		}
	}
	return $rs;
}
function remove_cart($item_cart) {
	$n = count_cart()+1;	
	for ($i = $item_cart; $i < $n; $i++){
		$a = $i + 1;
		$_SESSION['cart']['item'][$i] = $_SESSION['cart']['item'][$a];
		$_SESSION['cart']['quanlity'][$i] = $_SESSION['cart']['quanlity'][$a];
		$_SESSION['cart']['picture'][$i] = $_SESSION['cart']['picture'][$a];
	}
		$_SESSION['cart']['count']--;
		$_SESSION['cart']['item'][$a] = false;
		$_SESSION['cart']['quanlity'][$a] = false;	
		$_SESSION['cart']['picture'][$a] = false;
}
function remove_all_cart() {
	$n = count_cart()+1;	
	for ($i = 1; $i < $n; $i++){
		$_SESSION['cart']['item'][$i] = false;
		$_SESSION['cart']['quanlity'][$i] = false;
		$_SESSION['cart']['picture'][$i] = false;
	}
	$_SESSION['cart']['count'] = 0;
}
function add_cart($item_cart,$quanlity_cart,$saveoff_cart) {
	$n = count_cart();
	$check = check_cart($item_cart);
	if ( $check == false ) {
		$_SESSION['cart']['item'][$n+1] = $item_cart;
		$_SESSION['cart']['quanlity'][$n+1] = $quanlity_cart;		
		$_SESSION['cart']['picture'][$n+1] = $saveoff_cart;
		$_SESSION['cart']['count']++;
	} else  {
		$_SESSION['cart']['quanlity'][$check] = $_SESSION['cart']['quanlity'][$check]+$quanlity_cart;			
	}
}
function edit_cart($item_cart,$quanlity_cart) {
	$_SESSION['cart']['quanlity'][$item_cart] = $quanlity_cart;			
}
function set_counter() {
	global $config;
	$uri  	= rtrim(dirname($_SERVER['PHP_SELF'])); 
	$save	=	$_SERVER['REQUEST_URI']; 
	$save	=	explode("?",$save);
	$save	=	$save[0];
	if($save == $uri) {		
		$config['counter']	+=	1;
		$sql	=	"UPDATE ".$config['db_prefix']."_configs SET key_value=".$config['counter']." WHERE key_id='counter'";
		@mysql_query($sql);	
	} 
}
function on_of_yahoo ($nick,$on,$of) {
	$url = "http://opi.yahoo.com/online?u=".$nick."&m=t&t=1"; 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch, CURLOPT_HEADER , 0); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	$result = curl_exec ($ch); 
	curl_close ($ch); 
	unset($ch); 		
	if ($result == 01):
		$str	=	'<img src="themes/'.themes.'/images/'.$on.'" title="Online" border="0" style="margin-bottom: -5px;"/>';
	else:
		$str	=	'<img src="themes/'.themes.'/images/'.$of.'" title="Offline" border="0" style="margin-bottom: -5px;"/>';
	endif;
	return $str;
}
function on_of_yahoo1 ($nick,$on,$of) {
	return '<img src="http://www.v3s.vn/ext/yim.php?y='.$nick.'" border="0" style="margin-bottom: -5px;"/>';
}
function get_size_picture($path,$w,$h) {
	$size = getimagesize($path);
	list($width, $height) = $size;
	for ($j = 1; $j < 100; $j++) {
		$nheight	=	($height*$j)/100 + 5;
		$nwidth 	=	($width*$j)/100 + 5;	
		if ($nheight >= $h || $nwidth >= $w) {											
			break;
		}
	}
	$img = array($width,$height,$nwidth,$nheight);
	return $img;
}
function config() {
	global $config,$lgroups;
	$sql = "SELECT * FROM ".$config['db_prefix']."_configs";
	$sql = @mysql_query($sql);
	while ($temp = @mysql_fetch_array($sql)) {
		$config[$temp['key_id']]				= $temp['key_value'];
	}
	$sql = "SELECT * FROM ".$config['db_prefix']."_languagesgroups";
	$sql = @mysql_query($sql);
	$i = 0;
	while ($temp = @mysql_fetch_array($sql)) {
		$lgroups[$i]['key']				= $temp['language'];
		$lgroups[$i]['title']			= $temp['title'];
		$i++;
	}
}
function sys_uploads($folder,$file,$type='gif|jpg|png|swf|GIF|JPG|PNG|SWF')
{
	global $config;
	$upload_file = "";
	if ( $_SERVER["REQUEST_METHOD"] != "POST" ) {
		return $upload_file;
	}
				
	if ( !isset($_FILES[$file]["error"]) || $_FILES[$file]["error"] != 0 ) {
		return $upload_file;
	}
	if ( $_FILES[$file]["size"] > $config['max_upload_file_size'] ) {	
		return $upload_file;
	}
	$temp = preg_split('/[\/\\\\]+/', $_FILES[$file]["name"]);
	$filename = $temp[count($temp)-1];
	if ( !preg_match('/\.('.$type.')$/i', $filename )) {
		return $upload_file;
	} 
	$filename = str_replace("%20","",$filename);
	$upload_file = time().'_'. $filename;	
	if ( move_uploaded_file($_FILES[$file]["tmp_name"],$folder.$upload_file) ) {
		return $upload_file;
	} else {
		return $upload_file;
	}
}
function sys_uploads_slide($folder,$file,$type='jpg')
{
	global $config;
	$upload_file = "";
	if ( $_SERVER["REQUEST_METHOD"] != "POST" ) {
		return $upload_file;
	}
				
	if ( !isset($_FILES[$file]["error"]) || $_FILES[$file]["error"] != 0 ) {
		return $upload_file;
	}
	if ( $_FILES[$file]["size"] > $config['max_upload_file_size'] ) {	
		return $upload_file;
	}
	$temp = preg_split('/[\/\\\\]+/', $_FILES[$file]["name"]);
	$filename = $temp[count($temp)-1];
	if ( !preg_match('/\.('.$type.')$/i', $filename )) {
		return $upload_file;
	} 
	$filename = str_replace("%20","",$filename);
	$upload_file = $filename;
	//unlink($folder.$upload_file);
	if ( move_uploaded_file($_FILES[$file]["tmp_name"],$folder.$upload_file) ) {
		return $upload_file;
	} else {
		return $upload_file;
	}
}
function sys_cut($str,$var)
{        
		$result=""; 
		$co = false ; 
		$c_str=strlen($str);
		if ($c_str>$var)
		{
			for ($i=$var;$i>0;$i--)
			{
					if($str[$i]==" ")
					{
					$dung=$i;
					$co = true;
					break;
					}
			}
				if ($co==true)
					$result=substr($str,0,$i)." ...";
				else
					$result=substr($str,0,$var)." ...";
		}
		else
		$result=$str;
		return $result;		
} 
function html2text($html)
{
	$tags = array (
	0 => '~<h[123][^>]+>~si',
	1 => '~<h[456][^>]+>~si',
	2 => '~<table[^>]+>~si',
	3 => '~<tr[^>]+>~si',
	4 => '~<li[^>]+>~si',
	5 => '~<br[^>]+>~si',
	6 => '~<p[^>]+>~si',
	7 => '~<div[^>]+>~si',
	);
	$html = preg_replace($tags,"\n",$html);
	$html = preg_replace('~</t(d|h)>\s*<t(d|h)[^>]+>~si',' - ',$html);
	$html = preg_replace('~<[^>]+>~s','',$html);
	$html = preg_replace('~ +~s',' ',$html);
	$html = preg_replace('~^\s+~m','',$html);
	$html = preg_replace('~\s+$~m','',$html);
	$html = preg_replace('~\n+~s',"\n",$html);
	return $html;
}
function html2txt2($document){ 
	$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
	               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
	               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
	               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
	); 
	$text = preg_replace($search, '', $document); 
	return $text; 
}
function languagedetail($lgkey) {
	global $config;
	$lgroups = null;
	$sql = "SELECT grp.id, detail.contents, grp.keyid FROM ".$config['db_prefix']."_languages grp RIGHT JOIN ".$config['db_prefix']."_languages_detail detail ON grp.id = detail.languageid WHERE detail.language='".$lgkey."'";
	$sql = @mysql_query($sql);
	while ($temp = @mysql_fetch_array($sql)) {
		$lgroups[$temp['keyid']]				= $temp['contents'];
	}
	return $lgroups;
}
function documents($lgkey) {
	global $config;
	$sql = "SELECT grp.id, detail.contents, grp.lastdate, detail.language, grp.keyid FROM ".$config['db_prefix']."_documents grp RIGHT JOIN ".$config['db_prefix']."_documents_detail detail ON grp.id = detail.document ";
	$sql.= "WHERE grp.keyid = '".$lgkey."' AND detail.language = '".$config['default_language']."'";
	$sql = @mysql_query($sql);
	$temp = @mysql_fetch_array($sql);
	return $temp['contents'];
}
function advs($lgkey) {
	global $config;
	$sql = "SELECT * FROM ".$config['db_prefix']."_advs ";
	$sql.= "WHERE pic_position = '".$lgkey."' AND livetodate > '".time()."' ORDER BY pic_place ASC";

	$sql = @mysql_query($sql);
	while ($temp = @mysql_fetch_array($sql)) {
		echo '<div id="advs">';
			if ($temp['pic_url'] == '') $pic = 'lib/banner/'.$temp['pic_upload'];
			else $pic = $temp['pic_url'];
			if ($temp['pic_type'] == 0) {
				echo '<a href="?yuli=com:home;target:advs;adv:'.$temp['id'].'"><img src="'.$pic.'" border=0 /></a>';
			} else {
				echo '<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="'.$temp['pic_width'].'" height="'.$temp['pic_height'].'">
				<PARAM name="movie" value="'.$pic.'">
				<PARAM name="quality" value="high">
				<EMBED src="'.$pic.'" QUALITY="high" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" TYPE="application/x-shockwave-flash" width="'.$temp['pic_width'].'" height="'.$temp['pic_height'].'"></EMBED>
			</OBJECT>';
			}
		echo '</div>';
	}
}
function access() {
	global $id, $config;
	$sql = "SELECT * FROM ".$config['db_prefix']."_admin_detail ";
	$sql.= "WHERE admin = '".$_SESSION['auth']['id']."' AND com = '".$id['target']."' AND man= '".$id['option']."'";
	$detail = sql_detail($sql);
	if ($id['target'] == 'home' || $id['target'] == 'signin' || $id['target'] == 'signout' || $id['target'] =='profiles')
	$detail[0]['access'] = 1;
	return $detail[0]['access'];
}
function sys_mail($info)
{
			
		   $from = "MIME-Versin: 1.0\r\n" .
		   "Content-type: text/html ; charset=utf-8; format=flowed\r\n" .
		   "Content-Transfer-Encoding: 8bit\r\n" .
		   "From: ".$info['from_name']."<".$info['from_email'].">\r\n" .
		   "Reply-To: ".$info['from_name']."<".$info['from_email'].">\r\n" .
		   "X-Mailer: PHP" . phpversion();
			mail($info['to_email'],$info['subject'],$info['detail'],$from);	
}
function sys_link($options) {
	global $config, $id;
	$optionsTemp = explode("&",$options);
	$options = false;
	$options = array();
	while (list($key,$value)=each($optionsTemp)) {
		$value = explode("=",$value);
		$options[$value[0]] = $value[1];
	}
	$optionsCount = count($options);
	if (empty($options['title']))
		$_SESSION['title'] = $config['varurl'];
	else 
		$_SESSION['title'] = $options['title'];
	
	if (empty($options['file'])) { 
		$options['file']  = $config['varurl'];
	}
	$options['file'] = sys_sign($config['varurl'].' '.$options['file']);
	if ($config['seo'] == 1) {
		$str 			= '';	
		$i = 0;	
		$n = count($options);
		$end = new encodeYu();
		while (list($key,$value)=each($options)) {
			if ($key == 'title' || $key == 'com' || $key == 'target' || $key == 'option')  {
				if ($key == 'title') $id['title']=$value;
				$i++;
			} else {
				$value = str_replace(" ","-",$value);
				$value = str_replace("%20","-",$value);
				if ($key != 'file') 
					$str.= $value.'-';
				else {
					$file = $value;
				}
			}
			$i++;
		}
		$str = $str.''.sys_sign($file).'.html';
		
	} else {
		$str = '?global=';
		$n = count($options);
		while (list($key,$value)=each($options)) {
			if ($i < ($n-1)) {
				$str.= $key.':'.$value.',';
			} else {
				$str.= $key.':'.$value.'';
			}
			$i++;
		}
	}
	return $str;
}
function sys_sign($str){
	$unicode 		= array(
						"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
						"ằ","ắ","ặ","ẳ","ẵ",
						"è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
						"ì","í","ị","ỉ","ĩ",
						"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
						,"ờ","ớ","ợ","ở","ỡ",
						"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
						"ỳ","ý","ỵ","ỷ","ỹ",
						"đ","ê","ù","à",
						"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
						"Ằ","Ắ","Ặ","Ẳ","Ẵ",
						"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề" ,"Ế","Ệ","Ể","Ễ",
						"Ì","Í","Ị","Ỉ","Ĩ",
						"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
						,"Ờ","Ớ","Ợ","Ở","Ỡ",
						"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
						"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
						"Đ","Ê","Ù","À"," ",",","\"","/","(",")","{","}"
					);
	$none_unicode	= array(
						"a","a","a","a","a","a","a","a","a","a","a"
						,"a","a","a","a","a","a",
						"e","e","e","e","e","e","e","e","e","e","e",
						"i","i","i","i","i",
						"o","o","o","o","o","o","o","o","o","o","o","o"
						,"o","o","o","o","o",
						"u","u","u","u","u","u","u","u","u","u","u",
						"y","y","y","y","y",
						"d","e","u","a",
						"a","a","a","a","a","a","a","a","a","a","a"
						,"a","a","a","a","a","a",
						"e","e","e","e","e","e","e","e","e","e","e",
						"i","i","i","i","i",
						"o","o","o","o","o","o","o","o","o","o","o","o"
						,"o","o","o","o","o",
						"u","u","u","u","u","u","u","u","u","u","u",
						"y","y","y","y","y",
						"d","e","u","a","-","","","-","","","",""
					);
	return strtolower(str_replace($unicode,$none_unicode,$str));
}
class encodeYu {
	var $k = array('a'=>'n','b'=>'o','c'=>'p','d'=>'q','e'=>'r','f'=>'s','g'=>'t','h'=>'u','i'=>'v','j'=>'w','k'=>'x','l'=>'y','m'=>'z','n'=>'a','o'=>'b','p'=>'c','q'=>'d','r'=>'e','s'=>'f','t'=>'g','u'=>'h','v'=>'i','w'=>'j','x'=>'k','y'=>'l','z'=>'m','A'=>'N','B'=>'O','C'=>'P','D'=>'Q','E'=>'R','F'=>'S','G'=>'T','H'=>'U','I'=>'V','J'=>'W','K'=>'X','L'=>'Y','M'=>'Z','N'=>'A','O'=>'B','P'=>'C','Q'=>'D','R'=>'E','S'=>'F','T'=>'G','U'=>'H','V'=>'I','W'=>'J','X'=>'K','Y'=>'L','Z'=>'M','='=>'&','/'=>'.','.'=>'/');
	function __encode($str) {
		return strtr($str,$this->k);	
	}
	function __decode($str) {
			return strtr($str,$this->k);
	}
	function encode($str) {
		return $this->__encode(base64_encode($str));
	}
	function decode($str) {
		return base64_decode($this->__decode($str));
	}
}
function sys_option($com,$target,$option) {
	$yulis	=   $_SERVER["SCRIPT_NAME"];
	$yulis	=	explode("/",$yulis);
	if ($yulis[count($yulis)-1] == 'index.php') {
		if (is_file('sources/'.$com.'/'.$target.'.'.$option.'.php')) include('sources/'.$com.'/'.$target.'.'.$option.'.php');
		else sys_file('sources/'.$com.'/'.$target.'.'.$option.'.php');
		if (is_file('templates/'.$com.'/'.$target.'.'.$option.'.html.php')) include('templates/'.$com.'/'.$target.'.'.$option.'.html.php');
		else sys_file('templates/'.$com.'/'.$target.'.'.$option.'.html.php');
	} else {
		if (is_file('temp_dev/'.themes.'/'.$com.'/'.$target.'.'.$option.'.html.php')) include('temp_dev/'.themes.'/'.$com.'/'.$target.'.'.$option.'.html.php');
		else sys_file('temp_dev/'.themes.'/'.$com.'/'.$target.'.'.$option.'.html.php');
	}
}
function sys_file($file) {
	echo '<div id="alertnofile">Bạn cần bổ sung file sau: <strong>'.$file.'</strong></div>';
	//echo "Dữ liệu đang được cập nhật!";
}
?>