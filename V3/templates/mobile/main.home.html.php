				<?
					$title_about = array('vn'=>'Giới thiệu', 'en'=>'About us', 'ja'=>'私達について', 'cn'=>'關於我們');
					$title_detail = array('vn'=>'Xem chi tiết', 'en'=>'See more', 'ja'=>'もっと見る', 'cn'=>'查看更多');
					$title_hot_product = array('vn'=>'Sản phẩm nổi bật', 'en'=>'Hot products', 'ja'=>'人気製品', 'cn'=>'热销产品');
					$title_news = array('vn'=>'Tin tức', 'en'=>'News', 'ja'=>'ニュース', 'cn'=>'新闻');
					$title_product_seller = array('vn'=>'Sản phẩm bán chạy', 'en'=>'Products bestsellers', 'ja'=>'製品ベストセラー', 'cn'=>'畅销产品'); 
				?>
				<div class="clear"></div>
				<!-- Display left -->
				<div class="cont-left">
					<h4><?=$title_about[$_SESSION['lang']]?></h4>
					<div class="grid-left">
						<div class="date">
							<img src="lib/articles/hoa-chat-xi-ma-ma-thiec.jpg" alt="Hóa chất xi mạ Minh Chất, hoa chat xi ma Minh Chat">
						</div>
						<div class="nav-cont">
							<ul>
								<li>
									<h6>
										<?php 
											$about	=	new_articles_by_cat(90,1);
										?>
										<a href="<?=sys_link('com=home&target=main&category=90&detail='.$about[0]['id'].'&title='.$title_about[$_SESSION['lang']].'&file='.$title_about[$_SESSION['lang']])?>">
										<?=$about[0]['title']?>
								        </a>
							        </h6>
								</li>
								<li>
									<span><?=date('d-m-Y', $about[0]['lastdate'])?></span>
								</li>
							</ul>
						</div>
						<div class="clear"></div>
						<p>
							<?=sys_cut(html2text($about[0]['contents']),240)?>
						</p>
					</div>
				</div>
				<!-- End Display left -->
				
				<!-- Display main -->
				<?
	                $sp		=	articles_by_cat_opt(96,1);
	                //$count	=	count($sp);
					//$s		=	100;
	            ?>
				<div class="content-main">
					<? for($j=0;$j<8;$j++) { ?>
					<div class="grid-a">
						<ul>
							<li>
								<h5><?=$sp[$j]['title']?></h5>
								<br/>
								<img src="lib/articles/<?=$sp[$j]['picture']?>" alt="<?=$sp[$j]['title']?>">
								<br/>
								<p>
									<?=sys_cut(html2text($sp[$j]['contents']),300)?>
								</p>
								<div class="rd-more">
									<a href="<?=sys_link('com=home&target=main&category=detail&title='.$sp[$j]['title'].'&file='.$sp[$j]['title'])?>"><?=$title_detail[$_SESSION['lang']]?></a>
								</div>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
					<? }?>
				</div>
				<!-- End Display main -->
				
				<!-- Display right -->
				<?
		            $about	=	new_articles_by_cat(91,2);
		        ?>
				<div class="cont-right">
					<h4><?=$title_news[$_SESSION['lang']]?></h4>
					<div class="cont-pic">
						<img src="lib/articles/<?=$about[0]['picture']?>" alt="<?=$about[0]['title']?>">
					</div>
					<div class="cont-para">
						<p class="p1">
							<a href="<?=sys_link('com=home&target=main&category=95&detail='.$about[0]['id'].'&title='.$about[0]['title'])?>">
							<?=$about[0]['title']?>
							</a>
						</p>
						<p>
							<? 
								echo sys_cut(html2text($about[0]['contents']),100);
							?>
						</p>
					</div>
					<div class="clear"></div>
					
					<div class="cont-pic1">
						<img src="lib/articles/<?=$about[1]['picture']?>" alt="<?=$about[1]['title']?>">
					</div>
					<div class="cont-para1">
						<p class="p1">
							<a href="<?=sys_link('com=home&target=main&category=95&detail='.$about[1]['id'].'&title='.$about[0]['title'].'&file='.$about[0]['title'])?>">
							<?=$about[1]['title']?>
							</a>
						<p>
							<? 
								echo sys_cut(html2text($about[1]['contents']),100);
							?>
						</p>
					</div>
					
					<div class="clear"></div>
				</div>
				<!-- End Display right -->