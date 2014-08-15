<!DOCTYPE HTML>
<html>
	<head>
		<title><?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" />
		<meta name="keywords" content="<?php if(!empty($id['title'])) echo $id['title'].' - ';?><?=$config['title']?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="alexaVerifyID" content="3RfnnDqOtirVRjRGa41wxTL4sRE"/> 
		<link rel="stylesheet" href="themes/<?=themes?>/css/mobilestyle.css" />
		<link rel="stylesheet" href="themes/<?=themes?>/css/bjqs.css" />
		
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="themes/<?=themes?>/js/bjqs-1.3.min.js"></script>
		<script src="themes/<?=themes?>/js/jquery.secret-source.min.js"></script>
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<script type="application/x-javascript">
			jQuery(function($) {

				$('.secret-source').secretSource({
					includeTag : false
				});

			});
		</script>
		<script class="secret-source">
			jQuery(document).ready(function($) {

				$('#banner-fade').bjqs({
					height : 400,
					responsive : true
				});
				$('#menuproduct, #list_product').on('click', function(){
					var check = $('#disok').val();
					//alert(check);
					if(check == 'on'){
						$('#list_product').fadeOut();
						$('#disok').val('off');
						$('.category').attr('style','width: 1%;');
					}
					else{
						$('#disok').val('on');
						$('#list_product').fadeIn();
						$('.category').attr('style','width: 70%;');
					}
				});
			});
		</script>
	</head>
	<body>
		<!-- Logo -->
		<div class="header-bg">
			<div class="wrap1">
				<div class="logo">
					<a name="top" href="index.html"><img src="themes/<?=themes?>/images/logo.png"/ alt=""> </a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Logo -->
		<div class="category">
			<img id="menuproduct" src="themes/<?=themes?>/images/menu-item.png" title="Danh mục sản phẩm" alt="Xi ma Minh Chat" />
			<a href="#top">
				<img class="toppage" src="themes/<?=themes?>/images/top_button.gif" title="Top" alt="Xi ma Minh Chat" />
			</a>
			<input id="disok" type="hidden" value="off" />
			<?php
				$title_cat = array('vn'=>'Danh mục sản phẩm', 'en'=>'Product Categories', 'ja'=>'製品カタログ', 'cn'=>'产品目录');
			?>
			<div id="list_product">
				<div class="titlecat"><?=$title_cat[$_SESSION['lang']]?></div>
				<ul>
				<?
					global $config, $id;
		            $cat	=	categories_by_cat_group (18,96);
		            $count	=	count($cat)-1;
		            for($i=$count;$i>=0;$i--) {
		        ?>
					<li>
						<a <? if($id['category']==$cat[$i]['id']) echo 'class="active"';?> style="text-decoration: none;" href="<?=sys_link('com=home&target=main&category='.$cat[$i]['id'])?><?='#'.sys_sign($cat[$i]['title'])?>">
		        			<img alt="Hóa chất xi mạ Minh Chất" src="themes/<?=themes?>/images/arrow1.jpg" style="margin-top:-15px;" />&nbsp;&nbsp;<?=$cat[$i]['title']?>
		        		</a>
		        		
		        			<?
		                        $it			=	categories_by_cat_group (18,$cat[$i]['id']);
		                        $countit	=	count($it)-1;
								if ($countit >= 0) echo "<ul>";
		                        for ($j=$countit;$j>=0;$j--) {
		                    ?>
		                    <li>
								<a <? if($id['category']==$it[$j]['id']) echo 'class="active"';?> href="<?=sys_link('com=home&target=main&category='.$it[$j]['id'].'&title='.$it[$j]['title'].'&file='.$it[$j]['title'])?><?='#'.sys_sign($it[$j]['title'])?>">
									&nbsp;&nbsp;&nbsp;&nbsp;<img alt="Hóa chất xi mạ Minh Chất" src="themes/<?=themes?>/images/arrow.jpg" style="margin-top:-5px" />&nbsp;&nbsp;<?=$it[$j]['title']?>
			                    </a>
		                    </li>
		                    <?
		                        //if($j>0) echo '<div style="width: 200px; height:1px; border-bottom:1px solid #ddd">&nbsp;</div>';
		                     }
								if ($countit >= 0) echo "</ul>";
		                    ?>
					</li>
				<? } ?>
				</ul>
			</div>
		</div>
		<!-- Menu -->
		<div class="nav1-bg">
			<div class="wrap">
				<div class="nav">
					<ul>
						<?
							if (empty($id['category'])) $id['category']=$config['home_id'];
				            $menu	=	array(0,1,7,2,3); 
				            $cat	=	0;
							$temp 	= 	89;
				            for($i=0;$i<5;$i++) {
				                $cat = $temp + $menu[$i];
								//echo $cat;
								$cat1	=	categories_detail($cat);
				        ?>
				        <li>
			                <a <? if($id['category']==$cat) echo 'class="active"'; else echo 'class=""';?> href="<?=sys_link('com=home&target=main&category='.$cat.'&file='.$cat1[0]['title'].'&title='.$cat1[0]['title'])?>">
			                    <?=$cat1[0]['title']?>
			                </a>
			            </li>
			            <? }?>
						
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Menu -->
		
		<!-- Main Contents -->
		<div class="body-content">
			<div class="wrap">
				<div class="slider">
					<div id="container">
						<div id="banner-fade">
							<ul class="bjqs">
								<li><img src="lib/articles/hoa-chat-xi-ma-ma-thiec.jpg" alt="" title="Công ty TNHH  Minh Chất (Việt Nam). ĐT: (08)39618319 - Fax: (08)39618320. 244 Phan Anh, P.Hiệp Tân , Q.Tân Phú, Tp.HCM">
								</li>
								<li><img src="lib/articles/hoa-chat-xi-ma-ma-dong.jpg" alt="" title="Công ty TNHH  Minh Chất (Việt Nam). E-mail: info@minhchat.com.vn hoặc minhchat@vnn.vn">
								</li>
								<li><img src="lib/banner/c5.jpg" alt="" title="Chi nhánh Đà Nẵng: Đường số 3, KCN Hòa Khánh, Q. Liên Chiểu, TP. Đà Nẵng. ĐT: (0511) 3739816 - Fax: (0511) 3739886 - DĐ: 0903.592136">
								</li>
							</ul>
							<!-- end Basic jQuery Slider -->
						</div>
					</div>
				</div>
				<!-- Contents -->
				
				<!-- End Contents -->
