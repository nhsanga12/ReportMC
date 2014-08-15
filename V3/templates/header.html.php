<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php if(!empty($id['title'])) echo $id['title'].' - ';?><?php echo $config['title'];?></title>
		<meta name="description" content="<?php if(!empty($id['title'])) echo $id['title']; if(!empty($id['description'])) echo ' - '.$id['description'];?> " />
		<meta name="keywords" content="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" />
		<meta name="robots" content="index,follow,noodp" />
		
		<meta property="og:locale" itemprop="inLanguage" content="vi_VN" />
		<meta property="og:image" itemprop="thumbnailUrl" content="http://minhchat.com.vn/<?php echo !empty($id['image'])? 'lib/articles/'.$id['image'] : 'themes/'.themes.'/images/logo.jpg' ?>"/>
		<meta property="og:title" content="<?php if(!empty($id['title'])) echo $id['title']; ?>"/>
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Hóa chất xi mạ, thiết bị xi mạ, chuyển giao công nghệ ngành xi mạ"/>
		<meta property="og:url" itemprop="url" content="<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>"/>  
		<meta property="og:description" content="<?php if(!empty($id['description'])) echo $id['description'];?>" />
		
		<meta name="alexaVerifyID" content="3RfnnDqOtirVRjRGa41wxTL4sRE"/> 
		<meta name="msvalidate.01" content="75BE5DCBEE371407A9A6060B814C5865" />
		<meta name="Generator" content="(C) 2008 minhchat.vn. All rights reserved." />
		<meta name="google-site-verification" content="cb1SWopvirAAU9M5hDIkUOyMdeoFzZJKdEEl9dNQKfg" />
		<meta name="Copyright" content="Minh Chat Co, Ltd." />
		
		<link rel="canonical" href="<?php echo 'https://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI] ?>" />
		<link rel="shortcut icon" href="themes/<?=themes?>/images/icon_mc.ico" />
		<link rel="image_src" href="themes/<?=themes?>/images/logo.jpg" />
		
		<script src="themes/<?=themes?>/js/jquery1.min.js" language="javascript" type="text/javascript"></script>
		<script src="themes/<?=themes?>/js/megamenu.js" language="javascript" type="text/javascript"></script>
		<script src="themes/<?=themes?>/js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="themes/<?=themes?>/js/css3-mediaqueries.js" type="text/javascript"></script>
		<script src="themes/<?=themes?>/js/fwslider.js" type="text/javascript"></script>
		<script src="themes/<?=themes?>/js/jquery.easydropdown.js" type="text/javascript"></script>
		<script src="js/js.js" language="javascript" type="text/javascript"></script>
		<script type="text/javascript" id="sourcecode">
			$(document).ready(function() {
				$(".megamenu").megamenu();
			});
		</script>
		<script src="https://apis.google.com/js/plusone.js" type="text/javascript"></script>
		<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c0e5af67c5f3f0" type="text/javascript"></script>
	
		<style type="text/css">
			<!--
			@import url("css/styles.css");
			@import url("themes/<?=themes?>/css/style.css");
			@import url("themes/<?=themes?>/css/form.css");
			@import url("themes/<?=themes?>/css/megamenu.css");
			@import url("themes/<?=themes?>/css/fwslider.css");
			-->
		</style>
		<!--[if IE 6]><link rel="stylesheet" href="themes/<?=themes?>/css/ie6.css" type="text/css" media="all" /><![endif]-->
		
	</head>
	<body onload="HamThoiGian();">
		<!--
		<div style="position: fixed; top: 10pt; left: 0px; z-index: 999;" class="fixbanner">
			<a href="#" title="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>">
				<img alt="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" src="themes/<?=themes?>/images/dao.png" style="border: 0pt none;" height="158" width="200">
			</a>
		</div>
		-->
		<!--
		<div style="position: fixed; top: 10pt; right: 0px; z-index: 999;" class="fixbanner">
			<a href="#" title="<?php if($id['title']) echo $id['title'].' - ';?><?=$config['title']?>">
				<img alt="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" src="themes/<?=themes?>/images/mai.png" style="border: 0pt none;" height="158" width="200">
			</a>
		</div>
		-->
		<!--
		<div style="position: fixed; top: 70pt; left: 0px; z-index: 999;" class="fixbanner">
			<a href="#" title="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>">
				<img alt="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" src="themes/<?=themes?>/images/tuanlocl.png" style="border: 0pt none;" height="158" width="200">
			</a>
		</div>
		<div style="position: fixed; top: 70pt; right: 0px; z-index: 999;" class="fixbanner">
			<a href="#" title="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>">
				<img alt="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" src="themes/<?=themes?>/images/tuanloc.png" style="border: 0pt none;" height="158" width="200">
			</a>
		</div>
		-->
		<!-- <div style="position: fixed; top: 13pt; right: 0px; z-index: 999;">
			<a target="_blank"  style="margin-bottom: 10px;" href="https://www.facebook.com/sharer/sharer.php?u=http://minhchat.com.vn&p[title]=Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on Facebook&display=popup" title="Hóa chất xi mạ Minh Chất - Share on Facebook">
				<img alt="Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on facebook" src="themes/<?=themes?>/images/share-fb.png" height="150">
			</a><br/>
			<a target="_blank"  style="margin-bottom: 10px;" href="https://plus.google.com/share?url=http://minhchat.com.vn&t=Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on Google+" title="Hóa chất xi mạ Minh Chất - Share on Google +">
				<img alt="Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on google+" src="themes/<?=themes?>/images/share-g+.png" height="150">
			</a><br/>
			<a target="_blank" href="https://twitter.com/intent/tweet?text=Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on Twitter&url=http://minhchat.com.vn&related=popup" title="Hóa chất xi mạ Minh Chất - Share on Twitter">
				<img alt="Cung ứng hóa chất xi mạ, công ty hóa chất xi mạ Minh Chất, share on twitter" src="themes/<?=themes?>/images/share-tw.png" height="150">
			</a>
		</div> -->
