<?php 
	global $id;
	$cat	=	categories_detail($id['category']);
	$news1	=	new_articles_by_cat($id['category'],20,$id['detail']);
	$count	=	count($news1);
	$id['news_detail']	=	$id['detail'];
	$news	=	articles_detail();
?>
<div class="box1">
	<h3 class="header">
		<span class="backgr">
			<?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
		<div style="width: 100%;">
			<div style="width: 100%; padding-top: 5px; text-align: justify; display: table;">		
				
				<span style="font-size: 12px; font-weight: bold; color: #FF3300; ">
						<?=$news[0]['title']?>
				</span><br/>
				<? if($news[0]['picture']!='') {?>
					<div style="margin: auto;"><img src='lib/articles/<?=$news[0]['picture']?>' /></div>
				<? }?>		
				<br/>
				<?=str_replace('dashed','',$news[0]['contents'])?>		
			</div>
		</div>
		<div style="height: 10px; width: 100%; border-bottom: 1px solid #FF6633; "></div>
		<div style="height: 1px; width: 100%;"></div>
		<div style="height: 10px; width: 100%; border-top: 1px solid #FF6633; "></div>
		
		<div style="width: 100%; display: table; ">
			<div style=" font-size:13px; font-weight: bold; color:#FF3300; width: 605px; padding-left: 10px; ">
				Các bài viết khác:
			</div>
			<div style=" height: 5px; ">&nbsp;</div>
		<?php for ($i=0;$i<$count;$i++) { ?>
			<div style="text-align:left; padding: 2px; padding-left: 40px;">
				<div class="title_i" style=" font-weight: bold; ">
					<img src="themes/<?=themes?>/images/arrow1.jpg" border="0" style="padding-right: 5px; " />
					<a href="<?=sys_link('com=home&target=main&category='.$id['category'].'&detail='.$news1[$i]['id'])?>"><?=$news1[$i]['title']?></a>
				</div>
			</div>
		<?php }?>
		</div>
	</div>
</div>