<?php
	global $config, $id;
	if (!empty($_GET['detail']))
		$id['news_detail']	=	$_GET['detail'];
	$detail	=	articles_detail();	
	$title	=	explode("@",$detail[0]['title']);
	$size	=	get_size_picture('lib/articles/'.$detail[0]['picture'],350,350);
        if ($config['default_language'] == 'vn')
		$info = array("Tên","Địa chỉ","Điện thoại","E-mail","Nội dung","Gởi đi","Hủy bỏ");
	else
		$info = array("Name","Address","Telephone","Email","Contents","Send","Reset");
?>

        <div id="checkdomainbox">
            <div id="checkdomainboxdetail">
                <div id="checkdomainboxtitle">
                	<?=$detail[0]['title']?>
                </div>
                <div id="checkdomainboxclose"><a href="javascript:enddetail();"><img border="0" src="themes/<?=themes?>/images/button_cancel.png" /></a></div>
            </div>
            <div id="checkdomaincontent">
                <table width="100%">
                    <tr>
                        <td width="40%" valign="middle" align="center">
                            <img alt="<?=$config['title']?>" align="center" src="lib/articles/<?=$detail[0]['picture']?>" style="padding:2px; border:1px solid #ccc" border="0" width="<?=$size[2]?>" height="<?=$size[3]?>"><br/><br/>                    
                        	<br/>
                        	<div style="width: 100%; text-align: left;">
	                        	<p style="color:#d45407; font-size:13px; font-weight:bold;">
	                            	<?php if($config['default_language'] == 'vn') echo "Thông tin chi tiết:"; else echo "Description:";?>
	                            </p>
	                            <p style="line-height: 18px; text-align: justify;">     
	                            <?=$detail[0]['quick']?>
	                            <?=$detail[0]['contents']?>
	                            </p>
                 			</div>
                        </td>
                        <td width="60%" valign="top">
                            <div style="width: 100%; text-align: left; line-height: 20px">
                        	<?php
				        		$lienhe = new_articles_by_cat(92);
				        		echo $lienhe[0]['quick'];
				        	?>
				        	</div>
				        	<p style="color:#d45407; font-size:13px; font-weight:bold; padding-top: 10px">
                            	<?php if($config['default_language'] == 'vn') echo "Liên h&#7879; &#273;&#7863;t h&agrave;ng:"; else echo "Contact us:";?></p>
                            <p>
							<div style="width: 100%; padding-top: 5px; ">
								<?=$msgcont?>
								<form name="contact" action="" method="post" enctype="multipart/form-data">
								<div id="rs_line">
									<div id="rs_line_l">
										<?=$info[0]?> <span style="color: red; ">*</span>:
									</div>
									<div id="rs_line_r">
										<input type="text" id="<?=$info[0]?>" name="name" value="" size="40" />
									</div>
								</div>
								<div id="rs_line">
									<div id="rs_line_l">
										<?=$info[1]?> :
									</div>
									<div id="rs_line_r">
										<input type="text" id="<?=$info[1]?>" name="address" value="" size="45" />
									</div>
								</div>
								<div id="rs_line">
									<div id="rs_line_l">
										<?=$info[2]?> :
									</div>
									<div id="rs_line_r">
										<input type="text" id="<?=$info[2]?>" name="phone" value="" size="25" />
									</div>
								</div>
								<div id="rs_line">
									<div id="rs_line_l">
										<?=$info[3]?> <span style="color: red; ">*</span>:
									</div>
									<div id="rs_line_r">
										<input type="text" id="<?=$info[3]?>" name="email" value="" size="50" />
									</div>
								</div>
								<div id="rs_line">
									<div id="rs_line_l">
										<?=$info[4]?> <span style="color: red; ">*</span>:
									</div>
									<div id="rs_line_r">
										<textarea name="content" id="<?=$info[4]?>" rows="5" cols="35"></textarea>
									</div>
								</div>
								<br/>
								<div id="rs_line">
									<div id="rs_line_r">
										<input type="submit" name="dangtin" value="<?=$info[5]?>" onclick="MM_validateForm('<?=$info[0]?>','','R','<?=$info[3]?>','','RisEmail','<?=$info[4]?>','','R');return document.MM_returnValue" class="buttom "/>
										<input type="reset" name="huybo" value="<?=$info[6]?>" class="buttom "/>
									</div>
								</div>
								</form>
							</div>
                        </td>
                    </tr>
                </table>
                <div style="margin: 10px; display: inline-block;">
                	<div style="float: left;">
						<iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" vspace="0" width="100%" src="https://apis.google.com/u/0/_/+1/fastbutton?usegapi=1&size=medium&hl=vi&origin=<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>&url=<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>&gsrc=3p&ic=1&jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.oB9eZgYz5Ic.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAItRSTOSF_MqnN8cq1M4Aph2KuhHFZNbhA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload" data-gapiattached="true" title="+1"></iframe>
					</div>
					<div style="float: left;">
						<iframe width="450px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?href=<?php echo 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=450" style="border: none; visibility: visible; width: 83px; height: 20px;" class=""></iframe>
					</div>
					<div style="float: left;">
						<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
                </div>
            </div>
        </div>


