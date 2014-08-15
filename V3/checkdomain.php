<?
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
	/*
	http://whois.matbao.net/checkdomain.asp?domain=v3s&ext=com&btn_submit=Whois
	domain=v3s
	ext=com
	btn_submit=Whois
	$_POST['domainName'];
	$available = false;
	$tmp = file_get_contents('http://www.checkdomain.com/cgi-bin/checkdomain.pl?domain='+$_POST['domainName']);
	$tmp = explode("\r\n",$tmp);
	while (list($key,$value)=@each($tmp)) {
		 if (preg_match('/(.+)is still available(.+)?$/i', $value, $matches)) {
		 	$available = true;
		 }
	}
	*/
	$ext = array(
	'.com' 			=> array('whois.crsnic.net','No match for'),
	'.net' 			=> array('whois.crsnic.net','No match for'),	
	'.info' 		=> array('whois.afilias.net','NOT FOUND'),	
	'.biz' 			=> array('whois.biz','Not found'),
	'.org'			=> array('whois.publicinterestregistry.net','NOT FOUND'),
	'.gov'			=> array('whois.publicinterestregistry.net','NOT FOUND'),
	'.edu'			=> array('whois.crsnic.net','No match for'),
	);
	unset($buffer); // clean buffer - prevents problems
	$checkDomain = $firstDomain?$firstDomain:$_POST['domainName'];	
	preg_match('@^(http://www\.|http://|www\.)?([^/]+)@i',$checkDomain, $matches);
	$domain = $matches[2];
	
	$tld = explode('.', $domain, 2);
	$extension = strtolower(trim($tld[1]));
	$extvn = explode(".",$tld[1]);
	if ($extvn[count($extvn)-1] == 'vn') {
		# Nếu là tên miền Việt Nam thì
		$url = 'http://whois.pavietnam.net/whois.php';
		$str = 'domain='.$domain;
		$useragent='YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://search.yahoo.com/)';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);	
		curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
		$available  = @curl_exec($ch);
		curl_close ($ch);

	} else {
		# Ngược lại
		if(strlen($domain) > 0 && array_key_exists('.' . $extension, $ext))
		{
			$server = $ext['.' .$extension][0];
			
			$sock = @fsockopen($server, 43) or die('Error Connecting To Server:' . $server);
			@fputs($sock, "$domain\r\n");
			
			while( !feof($sock) )
			{
				$buffer .= @fgets($sock,128);
			}
		
			fclose($sock);
		//	if($extension == 'org') echo nl2br($buffer);
			
			if(eregi($ext['.' . $extension][1], $buffer)) { $available = true; }
			
			else { $available = false; }
		}
			else
			{
				if(strlen($domain) > 0)	 { }
			}
		
			ob_flush();
			flush();
			sleep(0.1);
	}
	if ($available == false) {
		$txt = 'Đã có người sở hữu';
		$css = 'no';
	} else {
		$txt = '<strong>Chưa ai sở hữu</strong>';
		$css = 'yes';
	}
?>
