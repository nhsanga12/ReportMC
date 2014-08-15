<?php 
	global $id,$config;
	$cat		=	categories_detail($id['category']);
	$thongtin 	=	new_articles_by_cat(140,1);
	if ($config['default_language'] == 'vn')
		$info = array("Tên","Địa chỉ","Điện thoại","E-mail","Nội dung","Gởi đi","Hủy bỏ");
	else
		$info = array("Name","Address","Telephone","Email","Contents","Send","Reset");
?>
	<div class="top-border"></div>
	<div class="inner_content border-shadow">
		<h2 class="m_1">
			<?=$cat[0]['title']?>
		</h2>
		<div class="login">
			<div class="wrap">
				<!-- <ul class="breadcrumb breadcrumb__t">
					<a class="home" href="#">Home</a> / Contact
				</ul> -->
				<?=$msgcont?>
				<div class="content-top">
					<form method="post" action="contact-post.html">
						<div class="to">
							<input type="text" class="text" placeholder="<?=$info[0]?>" id="<?=$info[0]?>">
							<input type="text" class="text" placeholder="<?=$info[1]?>" id="<?=$info[1]?>" style="margin-left: 10px">
						</div>
						<div class="to">
							<input type="text" class="text" placeholder="<?=$info[2]?>" id="<?=$info[2]?>">
							<input type="text" class="text" placeholder="<?=$info[3]?>" id="<?=$info[3]?>" style="margin-left: 10px">
						</div>
						<div class="text">
							<textarea placeholder="<?=$info[4]?>" id="<?=$info[4]?>"></textarea>
						</div>
						<div class="submit">
							<input type="submit" name="dangtin" value="<?=$info[5]?>" onclick="MM_validateForm('<?=$info[0]?>','','R','<?=$info[3]?>','','RisEmail','<?=$info[4]?>','','R');return document.MM_returnValue">
						</div>
					</form>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m29!1m12!1m3!1d15678.113541000299!2d106.6292572970825!3d10.770783664685482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m14!1i0!3e6!4m5!1s0x31752e98f7938e49%3A0x568a6697f0c893f9!2zQ8O0bmcgdmnDqm4gxJDhuqdtIFNlbiBIw7JhIELDjG5oLCBWaeG7h3QgTmFt!3m2!1d10.768811!2d106.63786499999999!4m5!1s0x0%3A0xcc4e3f0fc5f4be99!2sMinh+Chat+Production-Trading+Co.%2C+Ltd!3m2!1d10.768191999999999!2d106.622872!5e0!3m2!1svi!2s!4v1399081196958" width="100%" height="450" frameborder="0" style="border:0"></iframe>
					</div>
					<div style="width: 100%; text-align: center; line-height: 20px; ">
			       		<?=$thongtin[0]['contents']?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>