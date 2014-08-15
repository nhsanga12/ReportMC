<?php
echo 'sasas';
	include('cms/config.php');
	$mysql = mysql_connect($config['db_servername'],$config['db_username'],$config['db_password']);
	$mysql = mysql_select_db($config['db_name'],$mysql) or die('Please set cms/config.php to connect a database !');
	require 'cms/mysql/global-mysql.php';
	require 'session.php'; 
	$browser_t = '';
	//include ('cms/detect.php');
	# Thư viện các Hàm
	require 'cms/functions/global-functions.php';
	require 'cms/functions/auto-load.php';
	require 'cms/functions/categories-functions.php';
	require 'cms/functions/articles-functions.php';
	# Bộ đếm
	set_counter();
	# SET Themes
	define('themes',$config['themes'],true);
	$id = null;
	# Lấy ID;
		# Nếu là SEO link thì nhập biến theo kiểu này
		if ($config['seo'] == 1) {
			$end = new encodeYu();
			$yuli	= $_SERVER['REQUEST_URI']; //echo $yuli;
			$yuli	= explode("/",$yuli);
			$yuli	= explode("-",$yuli[count($yuli)-1]);
			//echo count($yuli);
			if (count($yuli) > 1 && !is_numeric($yuli[0])) $id['option']='pdetail';
			if (count($yuli) > 1) $id['category'] = $yuli[0];
			if (count($yuli) > 2 && is_numeric($yuli[1])) $id['detail'] = $yuli[1];
			
		} else {
		# Ngược lại thì lấy kiểu truyền thống
			$yuli	= $_GET['global'];	
			$yuli 	= explode(',',$yuli);
			while (list($key,$value)=each($yuli)) {
				if ($value!='') {
				$value = explode(':',$value);
				$id[$value[0]]	= $value[1];
				}
			}
		}
		# Nếu chưa tồn tại một com và target thì tự set
		if (empty($id['com']) || empty($id['target'])) {
			if (!empty($browser_t))
				$id['com'] = $browser_t;
			else
				$id['com']		= 	$config['com_default'];
			$id['target'] 	= 	'main';
			//header("location:".sys_link('com='.$id['com'].'&target='.$id['target']));
		}	
		# Nếu chưa tồn tại tiêu đề thì lấy tiêu đề mặc địch
		if (!empty($id['title'])) 
			$id['title'] = $config['varurl'];	
	
	# Gọi ngôn ngữ khi có sự yêu cầu
	
	if (isset($_POST['language']) && !is_null($_POST['language']))
		$_SESSION['lang'] = $_POST['language']; 
	else if (!isset($_SESSION['lang']) || is_null($_SESSION['lang']))
		$_SESSION['lang'] = $config['default_language'];	
	$config['default_language'] = $_SESSION['lang'];
	
	# Lấy ngôn ngữ đưa vào sử dụng
	$languages = languagedetail($config['default_language']); 
	
	# Kiểm tra trang thông tin
		if (is_file('sources/'.$id['com'].'/'.$id['target'].'.php')) {
			require 'sources/'.$id['com'].'/'.$id['target'].'.php';
		} else sys_file('sources/'.$id['com'].'/'.$id['target'].'.php');
		# Load các hàm auto
		//require 'templates/'.$browser_t.'header.html.php';
		if (!empty($id['option'])) {
			if (is_file('sources/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.php')) {
				require('sources/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.php');
			} else sys_file('sources/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.php');
			if (is_file('templates/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.html.php')) {
				require('templates/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.html.php');
			} else {
				sys_file('templates/'.$id['com'].'/'.$id['target'].'.'.$id['option'].'.html.php');
				require 'templates/error.html.php';
			}	
		} else if (!empty($id['target'])) {
			if (is_file('templates/'.$id['com'].'/'.$id['target'].'.html.php')) {
				require('templates/'.$id['com'].'/'.$id['target'].'.html.php');
			} else {
				sys_file('templates/'.$id['com'].'/'.$id['target'].'.html.php');
				require 'templates/error.html.php';
			}	
		} else {
				require 'templates/main.html.php';
		}
		# Load Template Footer & Env report
		//require 'templates/env.report.php';
		//require 'templates/'.$browser_t.'footer.html.php';
		//echo sys_link('com=home&target=main&option=pdetail');
	# Và xử lý menu
	@mysql_close($mysql);
?>
