<? 
	global $id,$config;
	if ($config['default_language'] == 'vn')
		$t	=	array('Stt','Mã số','Hình ảnh','Số lượng','Xóa','OK','Thanh toán','Hủy giỏ hàng');
	else
		$t	=	array('N.','Id','Picture','Quanlity','Delete','OK','Checkout','Remove cart');
	$n	=	count_cart();
	
?>

<div style="width: 100%; padding-bottom: 10px; padding-top: 10px; background: url(themes/<?=themes?>/images/bg_modl.png) top left no-repeat; ">
	&nbsp;&nbsp;&nbsp;<img src="themes/<?=themes?>/images/shop_<?=$config['default_language']?>.png" border="0"/><img src="themes/<?=themes?>/images/bg_modr.png" border="0" style="margin-bottom:-3px; "/><br/><br/>
	<table width="100%" style=" border-right: 1px solid #ccc; border-left: 1px solid #ccc; border-top: 1px solid #ccc; color: #ccc;" cellpadding="0" cellspacing="0">
		<tr>
			<th align="center" valign="middle" width="10%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$t[0]?></td>
			<th align="left" valign="middle" width="20%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$t[1]?></td>
			<th align="center" valign="middle" width="30%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$t[2]?></td>
			<th align="center" valign="middle" width="25%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$t[3]?></td>
			<th align="right" valign="middle" width="15%" style=" border-bottom: 1px solid #ccc; padding: 3px;"><span style=" color: #ccc; "><?=$t[4]?></td>
		</tr>
		<? 			
			for($i=1;$i<=$n;$i++) {
		?>
		<tr>
			<td align="center" valign="middle" width="10%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$i?></td>
			<th align="left" valign="middle" width="20%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><?=$_SESSION['cart']['item'][$i]?></td>
			<td align="center" valign="middle" width="30%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; "><img src="lib/articles/<?=$_SESSION['cart']['picture'][$i]?>" border="0" width="100" /></td>
			<td align="center" valign="middle" width="25%" style=" border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 3px; font-weight: bold; ">
				<form name="editcart" id="editcart" action="<?=sys_link('com=cart&target=main&option=edit')?>" method="post">
					<input type="text" name="quanlity" width="20" value="<?=$_SESSION['cart']['quanlity'][$i]?>" />
					<input type="hidden" name="i" id="i" value="<?=$i?>" />
					<input type="submit" name="submit" value="<?=$t[5]?>" />
				</form>
			</td>
			<td align="right" valign="middle" width="15%" style=" border-bottom: 1px solid #ccc; padding: 3px;"><span style=" color: #ccc; ">
				<form name="delcart" id="delcart" action="<?=sys_link('com=cart&target=main&option=del')?>" method="post">
					<input type="hidden" name="i" id="i" value="<?=$i?>" />
					<input type="submit" name="submit" value="<?=$t[4]?>" />
				</form>
			</td>
		</tr>
		<? }?>
	</table>
	<div style="90%; text-align: right; "><br/>
		<a href="<?=sys_link('com=home&target=main&category=94&order=1&file=dat hang&title=Đặt hàng')?>" ><?=$t[6]?></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?=sys_link('com=cart&target=main&option=remove&category=1')?>" ><?=$t[7]?></a>
	</div>
</div>