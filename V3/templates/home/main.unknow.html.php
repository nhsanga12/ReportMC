<?php 
	global $id,$config;
	$cat	=	categories_detail($id['category']);
	$id['title'] = $cat[0]['title'];
?>
<div class="box1">
	<h3 class="header">
		<span class="backgr" style="cursor: pointer;">
			<?=$cat[0]['title']?>
		</span>
	</h3>
	<div class="silver">
    	<?php
            $sp		=	new_articles_by_cat($id['category'],40);
            $count1	=	count($sp);
			$s		=	200;
        ?>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px dotted #acaa9f">
            <tr>
                <?php for($j=0;$j<$count1;$j++) { ?>
                <td width="50%" style=" <?php if ($j<$count1-2) echo 'border-bottom: 1px dotted #acaa9f;'; if ($j%2==0) echo 'border-right: 1px dotted #acaa9f;'; ?>">
                    <table width="100%">
                    	<tr>
                        	<td colspan="2" align="left" width="100%">
								<a href="<?=sys_link('com=home&target=main&category='.$sp[$j]['category'].'&detail='.$sp[$j]['id'].'&title='.$sp[$j]['title'].'&file='.$sp[$j]['title'])?>" style="text-decoration: none; color:#FF6600; font-weight: bold; cursor: pointer;" >
									<?=$sp[$j]['title']?>
                               </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="60%" onclick="javascript:showdetail(<?=$sp[$j]['id']?>,<?=$s?>);" style="cursor: pointer; text-align:justify"><?=sys_cut(html2text($sp[$j]['contents']),200)?></td>
                            <td width="40%" align="center">
                            	<a onclick="javascript:showdetail(<?=$sp[$j]['id']?>,<?=$s?>);" style="text-decoration: none; color:#000; font-weight: bold; cursor: pointer;" >
                            		<img src="lib/articles/<?=$sp[$j]['picture']?>"  style="border: 1px solid #FF6633; padding: 2px;" width="100" />
                            	</a>
                            </td>
                        </tr>
                    </table>
                </td>
                <?php
                    if($j%2==1) { $s+=100; echo '</tr><tr>'; }
                }
                ?>
            </tr>
        </table>
    </div>
</div>