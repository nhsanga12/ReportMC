					<?php global $id, $config;?>
					<div class="cont span_2_of_3">
						<?php
					    	if (empty($id['category'])) 
					    		$id['category'] = $config['home_id1'];
							if(empty($id['detail']))
								$t	=	'news';
							else
								$t	=	'detail';
							if($id['category']==143) 
								echo sys_option('home','main','location');
							else if($id['category']==144) 
								echo sys_option('home','main','support');
							else if($id['category']==89) 
								echo sys_option('home','main','home');
							else if($id['category']==90 || $id['category']==91 || $id['category']==93 || $id['category']==94 || $id['category']==95) 
								echo sys_option('home','main',$t);
							else if($id['category']==92)
								echo sys_option('home','main','contact');
							else if($id['category']==98 || $id['category']>=128){
								if(empty($id['detail']))
									$t	=	'unknow';
								else
									$t	=	'detailp';
								echo sys_option('home','main',$t);
							}
							else {
								if(empty($id['detail']))
									$t	=	'product';
								else
									$t	=	'detailp';
								echo sys_option('home','main',$t);
							}
						?>
					</div>