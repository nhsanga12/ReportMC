<?php 
	global $id,$config;
	$cat		=	categories_detail($id['category']);
	$thongtin 	=	new_articles_by_cat(140,1);
	if ($config['default_language'] == 'vn')
		$info = array("Nhập địa chỉ của bạn","Bấm vào đây để lấy địa chỉ hiện tại của bạn","Chọn chi nhánh công ty Minh Chất","Trụ sở chính: 244-246 Phan Anh, P.Hiệp Tân, Q.Tân Phú, Tp.HCM","Chi nhánh Đà Nẵng: Đường số 3, KCN Hòa Khánh, Q.Liên Chiểu, Tp.Đà Nẵng", "Tìm đường","Hủy bỏ");
	else
		$info = array("Your address","Click here to get your position","Select subsidiary Minh Chat company","Main office: 244-246 Phan Anh Stress, Hiep Tan ward, Tan Phu district, HCM city","Branch Da Nang: Stress 3, Hoa Khanh Industrial Parks, Lien Chieu district, Da Nang city","OK","Reset");
?>
<div class="box1">
	<h3 class="header">
		<span class="backgr">
			<?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
		<!-- Place this tag where you want the Live Helper Plugin to render. -->
		<div id="lhc_status_container_page" ></div>
		
		<!-- Place this tag after the Live Helper Plugin tag. -->
		<script type="text/javascript">
		var LHCChatOptionsPage = {};
		LHCChatOptionsPage.opt = {};
		(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = '//xima.vn/livesupport/index.php/site_admin/chat/getstatusembed/(hide_offline)/true/(department)/1';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
		</script>
	</div>
</div>