<?php
function html_txt($name,$value,$attr) {
	echo '<input type="text" name="'..'" value="'..'"';
	while (list($key,$value)=each($attr)) {
		echo ' '.$key.'="'.$value.'"';
	}
	echo '/>';
}
function html_chk($name,$value,$attr) {

}
function html_rdo($name,$value,$attr) {
}
function html_txtarea($name,$value,$attr) {
}
?>