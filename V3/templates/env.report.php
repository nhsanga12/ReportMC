<?
if ($config['show_hidden_value'] == 1) {
$config['end']			= microtime();
?>
<div id="envreport">
<div id="envreport_title">
THÔNG SỐ XỬ LÝ CỦA HỆ THỐNG<span>
</div>
<div id="envreport_detail">
<div>
<strong>PAGE LOAD</strong>
<p>
Thời gian load trang là <?=$config['begin']-$config['end']?> giây
</p>
<strong>COM - TARGET - OPTION</strong>
<pre>
<?
$yuli	= $_SERVER['REQUEST_URI'];
$yuli	= explode("/",$yuli);
$yuli	= $yuli[count($yuli)-1];
$yuli	= explode(",",$yuli);
$value 	= explode('.',$yuli[0]);
$id['title']	=	$value[0];
$yuli 	= $end->decode($yuli[1]);
echo $yuli;
?>
<br />
ID = <? print_r($id)?>
</pre>
<strong>ALL REQUEST</strong>
<p>
<pre>
REQUEST = <? print_r($_REQUEST)?>
</pre>		
</p>
<strong>POST</strong>
<p>
<pre>
POST = <? print_r($_POST)?>
</pre>		
</p>
<strong>COOKIES</strong>
<p>
<pre>
COOKIE = <? print_r($_COOKIE)?>
</pre>		
</p>
<strong>SESSIONS</strong>
<p>
<pre>
SESSION = <? print_r($_SESSION)?>
</pre>		
</p>
<strong>SQL</strong>
<p>
<strong>Đã xử lý tất cả <?=count($config['query'])?> câu SQL;</strong>
<ul style="list-style:none; margin:0px; padding:0px;">		
<?
while(list($key,$value)=each($config['query'])) {
echo '<li style="margin-bottom:10px;">'.$value.';</li>';
}
?>		
</ul>
</p> 
</div>
</div>
</div>
<?
}
?>