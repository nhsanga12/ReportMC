<?php 
/*

# Project name: 	vitaCMS
# Version:			1.0.1
# Năm:				05.2008
# Chức năng:		Xây dựng website theo chuẩn chung
# Cơ quan quản lý:	CÔNG TY TNHH VIỆT TAM SAO
# Coder: 			Lê Hoàng Vũ
# Chức vụ:			Giám đốc Kỹ Thuật
# Email:			v3s.tech@live.com
# Website:			http://www.v3s.vn


WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWd::xWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMN:..:NMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWNXxcoXMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMX,..kMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMN00kxKMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMd  ,NMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMNOxOOKWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMX' .oWMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWl  .OMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM0.  lMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMK.  cMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMWNNMMMMMMMMMMMMMMMMMMMd. .xMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMN:..oWMMMMMMMMMMMMMMMWx.  cWMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMWo. .,kWMMMMMMMMMMMW0:. .cNN0kxddxXMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMWO,. .'lk0XNWNX0ko,.  'cl;.      oMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMWOc.   ......    .;;'.  .;ldxkONMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMN0xolcccc;,,;,,,,;:cdOO;. .;kNMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMXd;.          .'ckNMMMMMK'  .kWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMXl.  .,lxOO0Okdc'.  'xWMMW:  .0MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMM0.  .oKWMMMMMMMMMWO:.  ;OWO.  oMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMXl;lXMMMMMMMMMMMMMMWO.  .dx   xMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMWd,,xMMMMMMMMMMMMMMMMMMMO.  .o.  lMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMWd,,xMMMMMMMMMMMMMMMMMMMMc   lc  .OMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMXocdNMMMMMMMMMMMMMMMMMMMMMMl   cX,  .dWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMM0;':XMMMMMMMMMMMMMMMMMMMMMX,  .xMNo. .'lkXWMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMx;;kMMMMMMMMMMMMMMMMMMMMMMMN;   :WMMMXd,.  ..,:oXXo:oNNd:lXXo:oNMMMMMMMM
WMMMMMMMd.'xMMMMMMMMMMMMMMMMMMMMMMMK'..oXMMMMMMW0dc,...'00'.'KX,..00'.,KMMMMMMMM
WMMMMMMMMWWMMMMMMMMMMMMMMMMMMMMMMMMMWXWMMMMMMMMMMMMMWXXWMMWXWMMWXNMMWXWMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMdc0oXXokdxWMMMool0MdooxMk:d0MXl:OMXokdXWldoONdxxdWKckWk:kdONkcxXMMMMMMMM
WMMMMMMMcoc'K0;0dcWMMM::;oMc::oWd'o0Wlcl;KK,:cXN;oxKX;kx;XX,xWdco.xMX;KMMMMMMMMM
WMMMMMMMKNN0NMKOONMMMMKOONMKXN0WXkkKW0WMKXW0W0KW0NMMMXOOXMXO0WXKW0XMW0WMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW

*/

	require 'config.php';
	$mysql = mysql_connect($config['db_servername'],$config['db_username'],$config['db_password']);
	$mysql = mysql_select_db($config['db_name'],$mysql);
	require 'mysql/global-mysql.php';
	require 'session.php'; 
	# Thư viện các Hàm
	require 'functions/global-functions.php';
	require 'functions/auto-load.php';
	require 'functions/categories-functions.php';
	require 'functions/articles-functions.php';
	# Hết thư viện hàm
	require 'menu.php';
	//require 'menu.php';
	# Lấy ID;
	$yuli	= $_GET['yuli'];	
	$yuli 	= explode(';',$yuli);
	while (list($key,$value)=each($yuli)) {
		$value = explode(':',$value);
		$id[$value[0]]	= $value[1];
	}
	if ($_SESSION['auth']['login']	== false) {
		$id['com']		=	'system';
		$id['target']	=	'signin';
	}
	if (count($id) > 1) {
		if ($menu[$id['com']] == '') $id['com']	= 'system';
		if ($menu[$id['com']][$id['target']] == '') $id['target'] = 'error';
	}
	else {
		$id['com']	= 'system';
		$id['target'] = 'home';
	}
	if ($id['option'] == "") $id['option'] = 'main';
	if ($id['limit_on_page'] > 1) $config['limit_on_page'] = $id['limit_on_page'];
	# Kiểm tra quyền
	if (access() == 1) {
		if (is_file('sources/'.$id['com'].'/'.$id['target'].'.php')) {
			require 'sources/'.$id['com'].'/'.$id['target'].'.php';
		}
	}
	require 'templates/header.html';
	if (access() == 1) {
		if (is_file('templates/'.$id['com'].'/'.$id['target'].'.html')) {
			require 'templates/'.$id['com'].'/'.$id['target'].'.html';
		} else {
			require 'templates/error.html';
		}
	} else {
			require 'templates/nopermission.html';
	}
	require 'templates/footer.html';
	@mysql_close($mysql);
?>