<?php 
	global $id, $config;
	$title_product = array('vn'=>'sản phẩm', 'en'=>'products', 'ja'=>'製品', 'cn'=>'产品');
	$cat	=	categories_by_cat_group (18,$id['category']);
	$count	=	count($cat);
	if ($count == 0) {
		$cat = categories_detail($id['category']);
	} else
		$count--;	
	for ($i=$count;$i>=0;$i--) {
		$sp		=	new_articles_by_cat($cat[$i]['id'],40);
        $count1	=	count($sp);
		if ($count1 > 0) {
	
?>

						<h2 class="head">
							<?=$cat[$i]['title']?> (<?=$count1." ".$title_product[$_SESSION['lang']]?>)
						</h2>
						<div class="top-box">
						<?php for($j=$count1-1;$j>=0;$j--) { ?>
							<div class="col_1_of_3 span_1_of_3">
								<div class="inner_content clearfix">
									<div class="product_image">
										<a class="popup-with-zoom-anim" href="#dialog<?=$i.$j?>">
											<span class="rollover"></span>
											<img src="lib/articles/<?=$sp[$j]['picture']?>" alt="<?=$sp[$j]['title']?>"  title="<?=$sp[$j]['title']?>"/>
										</a>
									</div>
									<?php if ($sp[$j]['opt']== 1) {?>
									<div class="sale-box">
										<span class="on_sale title_shop">HOT</span>
									</div>
									<?php } else if ($sp[$j]['opt']== 2) {?>
									<div class="sale-box1">
										<span class="on_sale title_shop">NEW</span>
									</div>
									<?php }?>
									<a href="<?=sys_link('com=home&target=main&category='.$sp[$j]['category'].'&detail='.$sp[$j]['id'].'&title='.$sp[$j]['title'].'&file='.$sp[$j]['title'])?>">
									<div class="price">
										<div class="cart-left">
											<p class="title" title="<?=$sp[$j]['title']?>">
												<?=sys_cut($sp[$j]['title'], 25)?>
											</p>
											<div class="price1" title="<?=html2text($sp[$j]['contents'])?>">
												<span class="actual"><?=sys_cut(html2text($sp[$j]['contents']),150)?></span>
											</div>
										</div>
										<div class="cart-right"></div>
										<div class="clear"></div>
									</div>
									</a>
								</div> 
								
								<div id="dialog<?=$i.$j?>" class="small-dialog1 mfp-hide">
									<div class="pop_up2">
										<h2><?=$sp[$j]['title']?></h2>
										<br/>
										<p align="center">
											<img style="max-width: 70%;" src="lib/articles/<?=$sp[$j]['picture']?>" alt="<?=$sp[$j]['title']?>"  title="<?=$sp[$j]['title']?>"/>
										</p>
										<p>
											<?=$sp[$j]['contents']?>
										</p>
									</div>
								</div>
							</div>
						<?php 
						if($j>0 && ($count1-$j)%3==0) {
								echo '<div class="clear"></div>';
								echo '</div>';
								echo '<div class="top-box">';
							}
	                    }
						?>
							<div class="clear"></div>
						</div>



<?php } } ?>