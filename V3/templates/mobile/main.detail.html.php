<? 
	global $id;
	$title_detail = array('vn'=>'Các tin khác', 'en'=>'Other news', 'ja'=>'その他のニュース', 'cn'=>'其他新闻');
	$cat	=	categories_detail($id['category']);
	$id['news_detail']	=	$id['detail'];
	$sp		=	articles_detail();
	$id['title'] = $sp[0]['title'];
	$news1	=	new_articles_by_cat($id['category'],5,$id['detail']);
	$count	=	count($news1);
?>
				<!-- <div class="clear"></div>
				<div class="cont-left">
					<h4>
						<?=$cat[0]['title']?>
					</h4>
				</div>
				<div class="clear"></div> -->
				<div class="content-main">
					<? 
						$pic = ($sp[0]['picture']=='')?'noimg':$sp[0]['picture'];	
					?>
					<div class="grid-a">
						<ul>
							<li>
								<h5><?=$sp[0]['title']?></h5>
								<?php if ($pic != 'noimg') { ?>
								<img src="lib/articles/<?=$pic?>" alt="<?=$sp[0]['title']?>">
								<br/>
								<?php } ?>
								<p>
									<?=str_replace('dashed','',$sp[0]['contents'])?>
								</p>
								
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="cont-left">
					<h4>
						<?=$title_detail[$_SESSION['lang']]?>
					</h4>
					<hr/>
					<div class="grid-left">
						<div class="nav-cont">
							<ul>
								<? for ($i=0;$i<$count;$i++) { ?>
								<li>
									<h6>
										<a href="<?=sys_link('com=home&target=main&category='.$id['category'].'&detail='.$news1[$i]['id'].'&title='.$news1[$i]['title'].'&file='.$news1[$i]['title'])?>">
											<?=$news1[$i]['title']?>
										</a>
									</h6>
								</li>
								<? }?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>