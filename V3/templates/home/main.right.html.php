<?php
	$lang_key = array('vn', 'en', 'ja', 'cn');
	$title_cat = array('vn'=>'Danh mục sản phẩm', 'en'=>'Product Categories', 'ja'=>'製品カタログ', 'cn'=>'产品目录');
	$title_support = array('vn'=>'Hỗ trợ trực tuyến', 'en'=>'Online support', 'ja'=>'オンライン支援', 'cn'=>'在线支持');
	$title_bus_s = array('vn'=>'Kinh doanh miền Nam', 'en'=>'Southern business', 'ja'=>'サザン·ビジネス', 'cn'=>'南方商务');
	$title_bus_t = array('vn'=>'Kinh doanh miền Trung', 'en'=>'Central business', 'ja'=>'中央ビジネス', 'cn'=>'中央企业');
	$title_partner = array('vn'=>'Đối tác', 'en'=>'Partners', 'ja'=>'パートナー', 'cn'=>'合作伙伴');
	$title_tech = array('vn'=>'Kỹ thuật', 'en'=>'Techniques', 'ja'=>'テクニック', 'cn'=>'技术');
	$cult_code = array('vn'=>'vi_VN', 'en'=>'en_US', 'ja'=>'ja_JP', 'cn'=>'zh_CN');
?>					
					<div class="rsidebar span_1_of_left">
						<!-- <div class="top-border"></div>
						<div class="border">
							<link href="themes/<?=themes?>/css/default.css" rel="stylesheet" type="text/css" media="all" />
							<link href="themes/<?=themes?>/css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
							<script src="themes/<?=themes?>/js/jquery.nivo.slider.js"></script>
							<script type="text/javascript">
								$(window).load(function() {
									$('#slider').nivoSlider();
								});
							</script>
							<div class="slider-wrapper theme-default">
								<div id="slider" class="nivoSlider">
									<img src="themes/<?=themes?>/images/t-img1.jpg"  alt="" />
									<img src="themes/<?=themes?>/images/t-img2.jpg"  alt="" />
									<img src="themes/<?=themes?>/images/t-img3.jpg"  alt="" />
								</div>
							</div>
							<div class="btn">
								<a href="single.html">Check it Out</a>
							</div>
						</div> -->
						<!--categories-->
						<div class="top-border"></div>
						<div class="sidebar-bottom">
							<h2 class="m_1">
								<?=$title_cat[$_SESSION['lang']]?>
							</h2>
							<div class="subscribe menu_categories" style="text-align: left;">
								<ul>
								<?php
									global $config, $id;
						            $cat	=	categories_by_cat_group (18,96);
						            $count	=	count($cat)-1;
						            for($i=$count;$i>=0;$i--) {
						        ?>
						        	<li>
						        		<a <?php if($id['category']==$cat[$i]['id']) echo 'class="active"';?> style="text-decoration: none;" href="<?=sys_link('com=home&target=main&category='.$cat[$i]['id'])?><?='#'.sys_sign($cat[$i]['title'])?>">
						        			<img alt="Hóa chất xi mạ Minh Chất" src="themes/<?=themes?>/images/arrow1.jpg" style="margin-top:-15px;" />&nbsp;&nbsp;<?=$cat[$i]['title']?>
						        		</a>
						        		
						        			<?php
						                        $it			=	categories_by_cat_group (18,$cat[$i]['id']);
						                        $countit	=	count($it)-1;
												if ($countit >= 0) echo "<ul>";
						                        for ($j=$countit;$j>=0;$j--) {
						                    ?>
						                    <li>
												<a <?php if($id['category']==$it[$j]['id']) echo 'class="active"';?> href="<?=sys_link('com=home&target=main&category='.$it[$j]['id'])?><?='#'.sys_sign($it[$j]['title'])?>">
													&nbsp;&nbsp;&nbsp;&nbsp;<img alt="Hóa chất xi mạ Minh Chất" src="themes/<?=themes?>/images/arrow.jpg" style="margin-top:-5px" />&nbsp;&nbsp;<?=$it[$j]['title']?>
							                    </a>
						                    </li>
						                    <?php
						                        //if($j>0) echo '<div style="width: 200px; height:1px; border-bottom:1px solid #ddd">&nbsp;</div>';
						                     }
												if ($countit >= 0) echo "</ul>";
						                    ?>
						        		
						        	</li>
					        	<?php }?>
						        </ul>
							</div>
						</div>
						<!--/categories-->
						<!--location-->
						<div class="top-border"></div>
						<div class="sidebar-bottom" style="padding-top: 10px;">
							<a href="http://minhchat.com.vn/143-hoa-chat-xi-ma-xi-ma-hoa-chat-xi-ma-xi-ma.html#duong-di-den-cong-ty-minh-chat">
								<img width="100%" src="themes/<?=themes?>/images/location-mc.jpg" alt="Hóa chất xi mạ Minh Chất" />
							</a>
						</div>
						<!--/location-->
						<!--support online-->
						<div class="top-border"></div>
						<div class="sidebar-bottom">
							<h2 class="m_1">
								<?=$title_support[$_SESSION['lang']]?>
							</h2>
							<div class="subscribe">
								<table class="tvalignm" border="0" cellpadding="3" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td><?=$title_bus_s[$_SESSION['lang']]?></td>
										</tr>
										<tr>
											<td>
												<img class="fl mr5" alt="" src="themes/<?=themes?>/images/phone_small.png" /> 
												&nbsp;<strong class="fs13">Hotline: 08-3961.8319</strong>
											</td>
										</tr>
									</tbody>
								</table><br/>
								<table class="tvalignm" border="0" cellpadding="3" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td><?=$title_bus_t[$_SESSION['lang']]?></td>
										</tr>
										<tr>
											<td>
												<img class="fl mr5" alt="" src="themes/<?=themes?>/images/phone_small.png" /> 
												&nbsp;<strong class="fs13">Hotline: 0511-373.9981</strong>
											</td>
										</tr>
									</tbody>
								</table><br/>
								<table class="tvalignm" border="0" cellpadding="3" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td><?=$title_tech[$_SESSION['lang']]?></td>
										</tr>
										<tr>
											<td>
												<img class="fl mr5" alt="" src="themes/<?=themes?>/images/phone_small.png" /> 
												&nbsp;<strong class="fs13">Hotline: 0918.276.118</strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--/support online-->
						<!--client-->
						<div class="top-border"></div>
						<div class="sidebar-bottom">
							<h2 class="m_1">
								<?=$title_partner[$_SESSION['lang']]?>
							</h2>
							<div class="subscribe">
							<?php 
								$qc = new_articles_by_cat(135,10);
								for ($i=0;$i<count($qc);$i++) {
							?>
				                <a target="_blank" href="http://<?=html2text($qc[$i]['quick'])?>">
				                	<img width="213px" src="lib/articles/<?=$qc[$i]['picture']?>" border="0" alt="<?=$qc[$i]['title']?>" title="<?=$qc[$i]['title']?>" />
				                </a>
				                <br />
				                <br />
				            <?php }?>	
							</div>
						</div>
						<!--/client-->
						<div class="top-border"></div>
						<div class="sidebar-bottom">
							<h2 class="m_1">Newsletters</h2>
							<p class="m_text">
								Lorem ipsum dolor sit amet, consectetuer
							</p>
							<div class="subscribe">
								<form>
									<input name="userName" type="text" class="textbox">
									<input type="submit" value="Subscribe">
								</form>
							</div>
						</div>
					</div>
