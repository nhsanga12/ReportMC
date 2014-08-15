						<?php
							$title_about = array('vn'=>'Giới thiệu', 'en'=>'About us', 'ja'=>'私達について', 'cn'=>'關於我們');
							$title_detail = array('vn'=>'Xem chi tiết...', 'en'=>'View more...', 'ja'=>'もっと見る', 'cn'=>'查看更多');
							$title_hot_product = array('vn'=>'Sản phẩm nổi bật', 'en'=>'Hot products', 'ja'=>'人気製品', 'cn'=>'热销产品');
							$title_news = array('vn'=>'Tin tức', 'en'=>'News', 'ja'=>'ニュース', 'cn'=>'新闻');
							$title_product_seller = array('vn'=>'Sản phẩm bán chạy', 'en'=>'Products bestsellers', 'ja'=>'製品ベストセラー', 'cn'=>'畅销产品'); 
						?>
						<h2 class="head"><?=$title_hot_product[$_SESSION['lang']]?></h2>
						<div class="top-box">
						<?php
			                $sp		=	articles_by_cat_opt(96,1);
			                $count	=	count($sp);
							$s		=	100;
							for($j=0;$j<$count;$j++) {
								//var_dump($sp[$j]);die(); 
			            ?>
							<div class="col_1_of_3 span_1_of_3">
								<div class="inner_content clearfix">
									<div class="product_image">
										<a class="popup-with-zoom-anim" href="#dialog<?=$j?>">
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
								
								<div id="dialog<?=$j?>" class="small-dialog1 mfp-hide">
									<div class="pop_up2">
										<h2><?=$sp[$j]['title']?></h2>
										<p>
											<?=$sp[$j]['contents']?>
										</p>
									</div>
								</div>
							</div>
						<?php
	                        if($j>0 && ($j+1)%3==0) {
								echo '<div class="clear"></div>';
								echo '</div>';
								echo '<div class="top-box">';
							}
	                    }
	                    ?>
	                    	<div class="clear"></div>
	                    </div>
						<?php
				            $about	=	new_articles_by_cat(91,2);
				        ?>
						<div class="top-box1">
							<div class="labout span_1_of_about">
								<div class="top-border"></div>
								<div class="inner_content border-shadow">
									<h2 class="m_1">
										<?=$title_news[$_SESSION['lang']]?>
									</h2>
								  	<div class="testimonials ">
										<div class="testi-item">
											<blockquote class="testi-item_blockquote">
												<?=sys_cut(html2text($about[0]['contents']),200);?>
												<div class="clear"></div>
											</blockquote>
											<small class="testi-meta"><span title="<?=$about[1]['title']?>" class="user"><?=sys_cut($about[0]['title'], 55)?></span><br/>
											<span class="info">
												<a href="<?=sys_link('com=home&target=main&category=95&detail='.$about[0]['id'].'&title='.$about[0]['title'])?>">
													<?=$title_detail[$_SESSION['lang']]?>
												</a>
											</small>
										</div>
									</div>
								   	<div class="testimonials ">
										<div class="testi-item">
											<blockquote class="testi-item_blockquote">
												<?=sys_cut(html2text($about[1]['contents']),200);?>
												<div class="clear"></div>
											</blockquote>
											<small class="testi-meta"><span title="<?=$about[1]['title']?>" class="user"><?=sys_cut($about[1]['title'], 55)?></span><br/>
											<span class="info">
												<a href="<?=sys_link('com=home&target=main&category=95&detail='.$about[0]['id'].'&title='.$about[1]['title'])?>">
													<?=$title_detail[$_SESSION['lang']]?>
												</a>
											</small>
										</div>
									</div>
								</div>
						    </div>		
						    <?php
					            $about	=	new_articles_by_cat(90,1);
					        ?>					
							<div class="cont span_2_of_about">
								<div class="top-border"></div>
								<div class="inner_content border-shadow">
									<h2 class="m_1">
										<?=$title_about[$_SESSION['lang']]?>
									</h2>
									<div>
										<?=sys_cut($about[0]['contents'],1400);?>
									</div>
									<p>
										<a href="<?=sys_link('com=home&target=main&category=90&title=gioi thieu&title=Giới thiệu')?>">
											&nbsp;<?=$title_detail[$_SESSION['lang']]?>
										</a>
									</p>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<h2 class="head">New Products</h2>
						<div class="section group">
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="themes/<?=themes?>/images/pic5.jpg" alt=""/>
									</div>
									<div class="sale-box">
										<span class="on_sale title_shop">New</span>
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">
												Lorem Ipsum simply
											</p>
											<div class="price1">
												<span class="actual">$12.00</span>
											</div>
										</div>
										<div class="cart-right"></div>
										<div class="clear"></div>
									</div>
								</div> </a>
							</div>
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="themes/<?=themes?>/images/pic2.jpg" alt=""/>
									</div>
									<div class="sale-box">
										<span class="on_sale title_shop">New</span>
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">
												Lorem Ipsum simply
											</p>
											<div class="price1">
												<span class="actual">$12.00</span>
											</div>
										</div>
										<div class="cart-right"></div>
										<div class="clear"></div>
									</div>
								</div> </a>
							</div>
							<div class="col_1_of_3 span_1_of_3">
								<a href="single.html">
								<div class="inner_content clearfix">
									<div class="product_image">
										<img src="themes/<?=themes?>/images/pic3.jpg" alt=""/>
									</div>
									<div class="sale-box">
										<span class="on_sale title_shop">New</span>
									</div>
									<div class="price">
										<div class="cart-left">
											<p class="title">
												Lorem Ipsum simply
											</p>
											<div class="price1">
												<span class="actual">$12.00</span>
											</div>
										</div>
										<div class="cart-right"></div>
										<div class="clear"></div>
									</div>
								</div> </a>
							</div>
							<div class="clear"></div>
						</div>