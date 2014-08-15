<? 
	global $id;
	$title_detail = array('vn'=>'Xem chi tiết', 'en'=>'See more', 'ja'=>'もっと見る', 'cn'=>'查看更多');
	$cat	=	categories_detail($id['category']);
	$id['title'] = $cat[0]['title'];
	$sp		=	new_articles_by_cat($id['category'],100);
	$count	=	count($sp);
?>
				<div class="clear"></div>
				<div class="cont-left">
					<h4>
						<?=$cat[0]['title']?>
					</h4>
				</div>
				<div class="clear"></div>
				<div class="content-main">
					<? 
					for($j=0;$j<$count;$j++) { 
						$pic = ($sp[$j]['picture']=='')?'noimg':$sp[$j]['picture'];	
					?>
					<div class="grid-a">
						<ul>
							<li>
								<h5><?=$sp[$j]['title']?></h5>
								<?php if ($pic != 'noimg') { ?>
								<img src="lib/articles/<?=$pic?>" alt="<?=$sp[$j]['title']?>">
								<br/>
								<?php } ?>
								<p>
									<?=sys_cut(html2text($sp[$j]['contents']),300)?>
								</p>
								<div class="rd-more">
									<a href="<?=sys_link('com=home&target=main&category='.$sp[$j]['category'].'&detail='.$sp[$j]['id'].'&title='.$sp[$j]['title'].'&file='.$sp[$j]['title'])?>"><?=$title_detail[$_SESSION['lang']]?></a>
								</div>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
					<? }?>
				</div>