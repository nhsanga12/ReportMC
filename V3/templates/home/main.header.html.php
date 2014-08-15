<?php 
	global $id, $config;
	$topmenu = array(
		'title_vn' => array('Trang chủ', 'Diễn đàn', 'Đăng nhập', 'Đăng ký', 'Trợ giúp'),
		'title_en' => array('Home', 'Forum', 'Login', 'Sign up', 'Help center'),
		'title_ja' => array('Home', 'Forum', 'Login', 'Sign up', 'Help center'),
		'title_cn' => array('Home', 'Forum', 'Login', 'Sign up', 'Help center'),
		'link'	=> array('/', 'forum/', 'forum/login/', 'forum/register/', 'help')
	);
	$count_top_menu = count($topmenu['title_vn']); 
?>
		<div class="header-top">
			<div class="wrap">
				<div class="header-top-left">
					<div class="box">
						<form id="form_language" action="#" method="get">
							<select tabindex="4" class="dropdown" onchange="document.getElementById('form_language').submit();">
								<option value="vn" <?=$_SESSION['lang']=='vn'? 'class="label"':''?>>Tiếng Việt</option>
								<option value="vn" <?=$_SESSION['lang']=='vn'? 'class="label"':''?>>Tiếng Việt</option>
								<option value="en" <?=$_SESSION['lang']=='en'? 'class="label"':''?>>English</option>
								<option value="ja" <?=$_SESSION['lang']=='ja'? 'class="label"':''?>>日本の</option>
								<option value="cn" <?=$_SESSION['lang']=='cn'? 'class="label"':''?>>中国</option>
							</select>
						</form>
					</div>
					<div class="box1">
						<span id="datetime"></span> - <span id="datetime1"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="cssmenu">
					<ul>
						<?php for($i=0; $i<$count_top_menu; $i++) {?>
						<li <?=$i==0?'class="active"':''?>>
							<a href="<?=$topmenu['link'][$i]?>"><?=$topmenu['title_'.$_SESSION['lang']][$i]?></a>
						</li>
						<?php
						if ($i+1 < $count_top_menu) echo ' | ';
						}
						?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="wrap">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.html"><img src="themes/<?=themes?>/images/logo.png" alt=""/></a>
					</div>
					<div class="menu">
						<ul class="megamenu skyblue">
							<?php
								$title_seemore = array('vn'=>'Xem chi tiết', 'en'=>'See more', 'ja'=>'もっと見る', 'cn'=>'查看更多');
								if (empty($id['category'])) $id['category']=$config['home_id1'];
					            //$menu	=	array('Trang chủ','Giới thiệu','Tin tức','Liên hệ','Dịch vụ khách hàng','Nhịp cầu giao thương','Cầu nối việc làm'); 
					            //$cat	=	88;
								$menu 	=	array('89','90','96','91','92');//,'94','95');
								$countmenu = count($menu);
					            for($i=0;$i<$countmenu;$i++) {
					                $cat = $menu[$i];
									//if($i==4) continue;
									$cat1	=	categories_detail($cat);
					        ?>
							<li class="<?=$id['category']==$cat?'active':''?> grid">
								<a href="<?=sys_link('com=home&target=main&category='.$cat.'&file='.$cat1[0]['title'].'&title='.$cat1[0]['title'])?>">
				                    <?=$cat1[0]['title']?>
				                </a>
				                <?php 
				                if($cat == 96) {
				                	$subcat	=	categories_by_cat_group (18,96);
						            $countsubcat =	count($subcat)-1;
				                ?>
				                <div class="megapanel">
									<div class="row">
										<?php for($j=$countsubcat;$j>2;$j--) { ?>
										<div class="h_nav">
											<!-- <h4>
												<a href="<?=sys_link('com=home&target=main&category='.$subcat[$j]['id'])?><?='#'.sys_sign($subcat[$j]['title'])?>">
					                				<?=$subcat[$j]['title']?>
					                			</a>
											</h4> -->
											<ul>
												<li>
													<a href="<?=sys_link('com=home&target=main&category='.$subcat[$j]['id'])?><?='#'.sys_sign($subcat[$j]['title'])?>">
						                				<?=$subcat[$j]['title']?>
						                			</a>
												</li>
											</ul>
										</div>
										<?php }?>
									</div>
								</div>
				                <?PHP }?>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
				<div class="header-bottom-right">
					<div class="search">
						<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="Subscribe" id="submit" name="submit">
						<div id="response"></div>
					</div>
					<div class="tag-list">
						<ul class="icon1 sub-icon1 profile_img">
							<li>
								<a class="active-icon c1" href="#"> </a>
								<ul class="sub-icon1 list">
									<li>
										<h3>sed diam nonummy</h3><a href=""></a>
									</li>
									<li>
										<p>
											Lorem ipsum dolor sit amet, consectetuer <a href="">adipiscing elit, sed diam</a>
										</p>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="icon1 sub-icon1 profile_img">
							<li>
								<a class="active-icon c2" href="#"> </a>
								<ul class="sub-icon1 list">
									<li>
										<h3>No Products</h3><a href=""></a>
									</li>
									<li>
										<p>
											Lorem ipsum dolor sit amet, consectetuer <a href="">adipiscing elit, sed diam</a>
										</p>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="last">
							<li>
								<a href="#">Cart(0)</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- start slider -->
		<div id="fwslider">
			<div class="slider_container">
				<div class="slide">
					<!-- Slide image -->
					<img src="themes/<?=themes?>/images/banner.jpg" alt=""/>
					<!-- /Slide image -->
					<!-- Texts container -->
					<div class="slide_content">
						<div class="slide_content_wrap">
							<!-- Text title -->
							<h4 class="title">Aluminium Club</h4>
							<!-- /Text title -->

							<!-- Text description -->
							<p class="description">
								Experiance ray ban
							</p>
							<!-- /Text description -->
						</div>
					</div>
					<!-- /Texts container -->
				</div>
				<!-- /Duplicate to create more slides -->
				<div class="slide">
					<img src="themes/<?=themes?>/images/banner1.jpg" alt=""/>
					<div class="slide_content">
						<div class="slide_content_wrap">
							<h4 class="title">consectetuer adipiscing </h4>
							<p class="description">
								diam nonummy nibh euismod
							</p>
						</div>
					</div>
				</div>
				<div class="slide">
					<img src="themes/<?=themes?>/images/banner3.jpg" alt=""/>
					<div class="slide_content">
						<div class="slide_content_wrap">
							<h4 class="title">consectetuer adipiscing </h4>
							<p class="description">
								diam nonummy nibh euismod
							</p>
						</div>
					</div>
				</div>
				<div class="slide">
					<img src="themes/<?=themes?>/images/banner4.jpg" alt=""/>
					<div class="slide_content">
						<div class="slide_content_wrap">
							<h4 class="title">consectetuer adipiscing </h4>
							<p class="description">
								diam nonummy nibh euismod
							</p>
						</div>
					</div>
				</div>
				<div class="slide">
					<img src="themes/<?=themes?>/images/banner5.jpg" alt=""/>
					<div class="slide_content">
						<div class="slide_content_wrap">
							<h4 class="title">consectetuer adipiscing </h4>
							<p class="description">
								diam nonummy nibh euismod
							</p>
						</div>
					</div>
				</div>
				<!--/slide -->
			</div>
			<div style="display: none;" class="timers"></div>
			<div class="slidePrev">
				<span></span>
			</div>
			<div class="slideNext">
				<span></span>
			</div>
		</div>
		<!--/slider -->