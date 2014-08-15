<?php 
	global $id;
	$title_detail = array('vn'=>'Sản phẩm khác', 'en'=>'Other products', 'ja'=>'その他の製品', 'cn'=>'其他产品');
	$contact = array('vn'=>'Liên hệ mua hàng', 'en'=>'Contact Us', 'ja'=>'お問い合わせ', 'cn'=>'联系我们');
	$cat	=	categories_detail($id['category']);
	$id['news_detail']	=	$id['detail'];
	$sp		=	articles_detail();
	$id['title'] = $sp[0]['title'];
	//$news1	=	new_articles_by_cat($id['category'],20,$id['detail']);
	//$count	=	count($news1);
	$thongtin 	=	new_articles_by_cat(140,1);
?>
<div class="box1">
	<h3 class="header">
		<span class="backgr" style="cursor: pointer;" onclick="active(<?=$count?>,<?=$i?>);">
			<?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
		<div style="width: 100%;">
			<h4><?=$sp[0]['title']?></h4><br/>
			<p>
			<?php 
			$pic = ($sp[0]['picture']=='')?'noimg':$sp[0]['picture'];
			if ($pic != 'noimg') { 
			?>
			<img style="padding: 5px; border: 1px solid #ccc; margin: 5px; max-width: 350px;" align="left" src="lib/articles/<?=$pic?>" alt="<?=$sp[0]['title']?>">
			<?php } ?>
			
				<?=str_replace('dashed','',$sp[0]['contents'])?><br/>
				<br/><hr/><br/>
				<?=str_replace('dashed','',$thongtin[0]['contents'])?>
			</p>
		</div>
		<div style="display: inline-block; padding: 10px 0 0 0;">
			
			<div style="float: right; text-align: right;"> 
				<div class="addthis_native_toolbox"></div>
			</div>
			<!-- <div style="float: left;">
				<g:plusone size="medium"></g:plusone>
			</div>
			<div style="float: left;">
				<iframe width="450px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?href=<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=450" style="border: none; visibility: visible; width: 83px; height: 20px;" class=""></iframe>
			</div>
			<div style="float: left;">
				<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
			<div style="float: left; margin-right: 5px; padding-top: 3px;">
				Chia sẻ: 
			</div>
			<div style="float: left;">
				<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-hashtags="Sang" data-dnt="true">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div> -->
		</div>
	</div>
</div>

<div class="box1">
	<h3 class="header">
		<span class="backgr" style="cursor: pointer;" onclick="active(<?=$count?>,<?=$i?>);">
			<?=$title_detail[$_SESSION['lang']]?> - <?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
    	<?php
            $sp		=	new_articles_by_cat($id['category'],20,$id['detail']);
            $count1	=	count($sp);
			$s		=	200;
        ?>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px dotted #acaa9f">
            <tr>
                <?php for($j=0;$j<$count1;$j++) { ?>
                <td width="50%" style=" <?php if ($j<$count1-2) echo 'border-bottom: 1px dotted #acaa9f;'; if ($j%2==0) echo 'border-right: 1px dotted #acaa9f;'; ?>">
                    <table width="100%">
                    	<tr>
                        	<td colspan="2" align="left" width="100%">
								<a href="<?=sys_link('com=home&target=main&category='.$sp[$j]['category'].'&detail='.$sp[$j]['id'].'&title='.$sp[$j]['title'].'&file='.$sp[$j]['title'])?>" style="text-decoration: none; color:#FF6600; font-weight: bold; cursor: pointer;" >
									<?=$sp[$j]['title']?>
                               </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="60%" onclick="javascript:showdetail(<?=$sp[$j]['id']?>,<?=$s?>);" style="cursor: pointer; text-align:justify"><?=sys_cut(html2text($sp[$j]['contents']),200)?></td>
                            <td width="40%" align="center">
                            	<a onclick="javascript:showdetail(<?=$sp[$j]['id']?>,<?=$s?>);" style="text-decoration: none; color:#000; font-weight: bold; cursor: pointer;" >
                            		<img src="lib/articles/<?=$sp[$j]['picture']?>"  style="border: 1px solid #FF6633; padding: 2px;" width="100" />
                            	</a>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
                    if($j%2==1) { $s+=100; echo '</tr><tr>'; }
                }
                ?>
            </tr>
        </table>
    </div>
</div>