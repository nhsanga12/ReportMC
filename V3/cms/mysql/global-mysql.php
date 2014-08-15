<?php
# Example: $temp = sql_add ('configs',array('name'=>'name','value'=>'value'));
# Tên của key (Thuộc Array) sẽ là tên trường trong cơ sở dữ liệu.
# Giá trị của key (Thuộc Array) sẽ là giá trị điền vào trường dữ liệu.

function sql_add($tbl,$rs) {
	global $config;
	$sql = "INSERT INTO ".$config['db_prefix']."_".$tbl." SET ";
	$i = 0; $n = count($rs);
	while (list($key,$value) = each($rs)) {
		$sql.= " ".$key." = '".$value."' ";
		$i++;
		if ($i < $n)
		$sql.= ",";
	}
	@mysql_query($sql);
	$config['query'][]	= $sql;
	$id = @mysql_insert_id();
	return $id;
}

# Example: sql_update ('configs',array('name'=>'name','value'=>'value'),'id',1);
# Tên của key (Thuộc Array) sẽ là tên trường trong cơ sở dữ liệu.
# Giá trị của key (Thuộc Array) sẽ là giá trị điền vào trường dữ liệu.
# Field sẽ là tên trường điều kiện
# Id sẽ là giá trị lọc theo điều kiện

function sql_update($tbl,$rs,$rsk) {
	global $config;
	$sql = "UPDATE ".$config['db_prefix']."_".$tbl." SET ";
	$i = 0; $n = count($rs);
	while (list($key,$value) = each($rs)) {
		$sql.= "".$key." = '".$value."'";
		$i++;
		if ($i < $n)
		$sql.= ", ";
	}
	$sql.= " WHERE ";
	$i = 0;
	while (list($key,$value)=each($rsk)) {
		if ($i == 0) $sql.= " ".$key." = '".$value."'";
		else  $sql.= " AND ".$key." = '".$value."'";
		$i++;
	}
	@mysql_query($sql);
	$config['query'][]	= $sql;	
}

# Example: $temp = sql_detail("SELECT * FROM ".$config['db_prefix']."_menu_detail WHERE id = '1'");

function sql_detail($sql) {
	$records = null;
	$rs = @mysql_query($sql);
	$config['query'][]	= $sql;
	$i = 0;
	while ($temp = @mysql_fetch_array($rs)) {
		while (list($key,$value) = each($temp)) {
			$records[$i][$key] = $value;
		}
		$i++;
	}
	return $records;
}
# Example: $temp = sql_list("SELECT * FROM ".$config['db_prefix']."_menu_detail LIMIT 0,10");
function sql_list($sql) {
	$records = null;
	$rs = @mysql_query($sql);
	$config['query'][]	= $sql;
	$i = 0;
	while ($temp = @mysql_fetch_array($rs)) {
		while (list($key,$value) = each($temp)) {
			$records[$i][$key] = $value;
		}
		$i++;
	}
	return $records;
}

# Example: $temp = sql_exit("SELECT * FROM ".$config['db_prefix']."_menu_detail WHERE id = '1'");
# Giá trị trả về lớn hơn 0 là tồn tại, bằng 0 là chưa tồn tại

function sql_exit($sql) {
	$rs = @mysql_query($sql);
	$config['query'][]	= $sql;
	$chk = @mysql_num_rows($rs);
	return $chk;
}

# Các câu lệnh SQL khác

function sql_delete($tbl,$rsk) {
	global $config;
	$sql = "DELETE FROM ".$config['db_prefix']."_".$tbl." ";
	$sql.= " WHERE ";
	$i = 0;
	while (list($key,$value)=each($rsk)) {
		if ($i == 0) $sql.= " ".$key." = '".$value."'";
		else  $sql.= " AND ".$key." = '".$value."'";
		$i++;
	}
	@mysql_query($sql);
	$config['query'][]	= $sql;
}
?>