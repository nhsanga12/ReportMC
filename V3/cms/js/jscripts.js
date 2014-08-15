function chkall () {
	gid = document.frm.iddetail;
	if (gid != null) {
		z = gid.length;
		if (z == null) gid.checked = document.frm.idall.checked;
		else {
			for (i=0;i<z;i++) {
					gid[i].checked = document.frm.idall.checked;
			}
		}
	}
}
function checkeditem() {
	gid = document.frm.iddetail;
	if (gid != null) {
		str = '';
		z = gid.length;
		if (z == null) { if (gid.checked == true) str= gid.value+','; }
		else {
			for (i=0;i<z;i++) {
				if (gid[i].checked == true) str+= gid[i].value+',';
			}
		}
	}
	return str;
}
function cfrm_del(mainurl) {
	chk = checkeditem();
	if (chk == '') {
		alert('Bạn vui lòng chọn ít nhất 1 mẫu tin');
	} else {
		window.location = ''+mainurl+';item:'+chk;
	}
}
function gotopage(page,url) {
	window.location = url + page;
}