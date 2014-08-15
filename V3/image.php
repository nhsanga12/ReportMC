<?
# Hàm thay đổi kích cỡ ảnh theo chiều rộng/cao, tự động hoặc không tự động
function resizeIMG ($img_path,$new_width=0,$new_height=0) {
		# Lấy định dạng
		$Splitted = explode('.',$img_path);
		# Kiểm tra định dạng			
		$ext= end($Splitted);
		$ext = strtolower($ext);
		if($ext == 'gif')
			$image =   imagecreatefromgif($img_path);
		elseif($ext == 'jpg' || $ext == 'jpeg')
			$image =   imagecreatefromjpeg($img_path);
		elseif($ext == 'png')
			$image =   imagecreatefrompng($img_path);
		$old_width = imagesx($image);
		$old_height= imagesy($image);		
		# Resize lại hình ảnh
		if ($new_height == 0):
			$new_height = $new_width * $old_height / $old_width ;
		endif;
		if ($new_width == 0):
			$new_width = $new_height * $old_width / $old_height ;
		endif;
		$new_image= imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		# Xuất ảnh ra ngoài
		if($ext == 'gif') {
			 header('Content-Type: image/gif');
			 imagegif($new_image,null,100);
		} elseif($ext == 'jpg' || $ext == 'jpeg') {
			 header('Content-Type: image/jpeg');
			 imagejpeg($new_image,null,100);
		} elseif($ext == 'png') {
			 header('Content-Type: image/png');
			 imagepng($new_image,null,100);
		}
		imagedestroy($new_image);
}
# Hàm cắt 1 khu vực ảnh theo ý của mình
function cropIMGfullHEIGHT ($img_path,$new_width,$new_height) {
		# Lấy định dạng
		$Splitted = explode('.',$img_path);
		# Kiểm tra định dạng			
		$ext= end($Splitted);
		$ext = strtolower($ext);
		if($ext == 'gif')
			$image =   imagecreatefromgif($img_path);
		elseif($ext == 'jpg' || $ext == 'jpeg')
			$image =   imagecreatefromjpeg($img_path);
		elseif($ext == 'png')
			$image =   imagecreatefrompng($img_path);
		$old_width = imagesx($image);
		$old_height= imagesy($image);		
		# Cắt lại hình ảnh
		$wm = $old_width/$new_width;
		$hm = $old_height/$new_height;
		
		$w_height = $new_width/2;
		$h_height = $new_height/2;
		
		$new_image= imagecreatetruecolor($new_width, $new_height);
		if($old_width > $old_height) {
			$adjusted_width = $old_width / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($new_image, $image,-$int_width,0,0,0,$adjusted_width,$new_height,$old_width,$old_height);
		} elseif(($old_width < $old_height) || ($old_width == $old_height)) {
			$adjusted_height = $old_height / $wm;
			$half_height = $adjusted_height / 2;
			$int_height = $half_height - $h_height;
			imagecopyresampled($new_image, $image,0,-$int_height,0,0,$new_width,$adjusted_height,$old_width,$old_height);
		} else {
			imagecopyresampled($new_image, $image,0,0,0,0,$new_width,$new_height,$old_width,$old_height);
		}
		# Xuất ảnh ra ngoài
		if($ext == 'gif') {
			 header('Content-Type: image/gif');
			 imagegif($new_image,null,100);
		} elseif($ext == 'jpg' || $ext == 'jpeg') {
			 header('Content-Type: image/jpeg');
			 imagejpeg($new_image,null,100);
		} elseif($ext == 'png') {
			 header('Content-Type: image/png');
			 imagepng($new_image,null,100);
		}
		imagedestroy($new_image);
}
function cropIMGfullWIDTH ($img_path,$new_width,$new_height) {
		# Lấy định dạng
		$Splitted = explode('.',$img_path);
		# Kiểm tra định dạng			
		$ext= end($Splitted);
		$ext = strtolower($ext);
		if($ext == 'gif')
			$image =   imagecreatefromgif($img_path);
		elseif($ext == 'jpg' || $ext == 'jpeg')
			$image =   imagecreatefromjpeg($img_path);
		elseif($ext == 'png')
			$image =   imagecreatefrompng($img_path);
		$old_width = imagesx($image);
		$old_height= imagesy($image);		
		# Cắt lại hình ảnh
		$wm = $old_width/$new_width;
		$hm = $old_height/$new_height;
		
		$w_height = $new_width/2;
		$h_height = $new_height/2;
		
		$new_image= imagecreatetruecolor($new_width, $new_height);
		if($old_width < $old_height) {
			$adjusted_width = $old_width / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($new_image, $image,-$int_width,0,0,0,$adjusted_width,$new_height,$old_width,$old_height);
		} elseif(($old_width > $old_height) || ($old_width == $old_height)) {
			$adjusted_height = $old_height / $wm;
			$half_height = $adjusted_height / 2;
			$int_height = $half_height - $h_height;
			imagecopyresampled($new_image, $image,0,-$int_height,0,0,$new_width,$adjusted_height,$old_width,$old_height);
		} else {
			imagecopyresampled($new_image, $image,0,0,0,0,$new_width,$new_height,$old_width,$old_height);
		}
		# Xuất ảnh ra ngoài
		if($ext == 'gif') {
			 header('Content-Type: image/gif');
			 imagegif($new_image,null,100);
		} elseif($ext == 'jpg' || $ext == 'jpeg') {
			 header('Content-Type: image/jpeg');
			 imagejpeg($new_image,null,100);
		} elseif($ext == 'png') {
			 header('Content-Type: image/png');
			 imagepng($new_image,null,100);
		}
		imagedestroy($new_image);
}
if ($_GET['t'] == 'resize'):resizeIMG(urldecode($_GET['file']),intval($_GET['w']),intval($_GET['h'])); endif;
if ($_GET['t'] == 'cropW'):cropIMGfullWIDTH(urldecode($_GET['file']),intval($_GET['w']),intval($_GET['h'])); endif;
if ($_GET['t'] == 'cropH'):cropIMGfullHEIGHT(urldecode($_GET['file']),intval($_GET['w']),intval($_GET['h'])); endif;
?>