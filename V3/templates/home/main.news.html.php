<?php 
	global $id;
	$cat	=	categories_detail($id['category']);
?>
<div class="box1">
	<h3 class="header">
		<span class="backgr">
			<?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
		<div style="width: 100%;">
			<?php
				$news	=	new_articles_by_cat($id['category'],10);
				$count	=	count($news);
				for ($i=0;$i<$count;$i++) {
			?>
			<div style="width: 100%; padding-top: 5px; text-align: justify; display: table;">		
				<div style="width: 130px; height: 100px; float: left; padding-right: 10px; ">
					<?php $pic = ($news[$i]['picture']=='')?'temp.jpg':$news[$i]['picture']; ?>
					<img src="image.php?t=cropH&amp;file=<?=urlencode('lib/articles/'.$pic)?>&amp;w=130&amp;h=100" border="0" style="border: 1px solid #FF6633; padding:1px; display: table; " />
				</div>
				<div style="width: 510px; float: left; ">
				<span style="font-size: 12px; font-weight: bold; ">
					<a style="color:#FF3300; text-decoration: none; " href="<?=sys_link('com=home&target=main&category='.$id['category'].'&detail='.$news[$i]['id'])?>">
						<?=$news[$i]['title']?>
					</a>
				</span><br/><br/>
				<?=sys_cut(html2text($news[$i]['quick'].$news[$i]['contents']),400)?>		
				</div>
			</div>
			<div style="width: 100%; text-align: right; ">
				<a href="<?=sys_link('com=home&target=main&category='.$id['category'].'&detail='.$news[$i]['id'])?>">
					<img src="themes/<?=themes?>/images/xct.gif" border="0" />
				</a>
			</div>
			<div style="height: 5px; ">&nbsp;</div>
			<?php }?>
		</div>
	</div>
</div>