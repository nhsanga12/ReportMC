				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Main Contents -->
		<div class="nav">
			<ul>
				<?
					if (empty($id['category'])) $id['category']=$config['home_id'];
		            $menu	=	array(0,1,7,2,3); 
		            $cat	=	0;
					$temp 	= 	89;
					$count = count($menu);
		            for($i=0;$i<$count;$i++) {
		                $cat = $temp + $menu[$i];
						//echo $cat;
						$cat1	=	categories_detail($cat);
		        ?>
		        <li>
	                <a <? if($id['category']==$cat) echo 'class="active"'; else echo 'class=""';?> href="<?=sys_link('com=home&target=main&category='.$cat.'&file='.$cat1[0]['title'].'&title='.$cat1[0]['title'])?>">
	                    <?=$cat1[0]['title']?>
	                </a>
	            </li>
	            <? }?>
				
			</ul>
		</div>
		<div class="clear"></div>
		<!-- Footer -->
		<div class="footer-bg">
			<div class="footer">
				
				<div class="soc">
					<a href="#"><img src="themes/<?=themes?>/images/facebook.png" title="FaceBook"></a>
					<a href="#"><img src="themes/<?=themes?>/images/twitter.png" alt="" title="Twitter"></a>
					<a href="#"><img src="themes/<?=themes?>/images/feed.png" title="Feed"></a>
					<a href="#"><img src="themes/<?=themes?>/images/youtube.png" alt="" title="Youtube"></a>
				</div>
				<div class="footer-link">
					<ul>
						<li>
							<?
				        		$lienhe = new_articles_by_cat(92);
				        		echo $lienhe[0]['quick'];
				        	?>
						</li>
						<li>
							<span><a href="http://minhchat.com.vn">&copy;Bản quyền thuộc về Minh Chất 2009-2014</a></span>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- End Footer -->
	</body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-40579021-3', 'minhchat.com.vn');
	  ga('send', 'pageview');
	
	</script>
</html>