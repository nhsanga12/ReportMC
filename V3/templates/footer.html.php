		<div id="showdetailbg"></div><div id="showdetail"></div>
		<script type="text/javascript">
			var LHCChatOptions = {};
			LHCChatOptions.opt = {widget_height:340,widget_width:320,popup_height:340,popup_width:340};
			(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			var refferer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
			var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
			po.src = '//xima.vn/livesupport/index.php/site_admin/chat/getstatus/(click)/internal/(position)/bottom_right/(check_operator_messages)/true/(top)/350/(units)/pixels/(department)/1?r='+refferer+'&l='+location;
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
		<!-- Add fancyBox main JS and CSS files -->
		<script src="themes/<?=themes?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
		<link href="themes/<?=themes?>/css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type : 'inline',
					fixedContentPos : false,
					fixedBgPos : true,
					overflowY : 'auto',
					closeBtnInside : true,
					preloader : false,
					midClick : true,
					removalDelay : 300,
					mainClass : 'my-mfp-zoom-in'
				});
			});
		</script>
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