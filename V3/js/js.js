function getInnerSize() {
    var myWidth = 0, myHeight = 0;
    if (typeof (window.innerWidth) == 'number') {
        //Non-IE
        myWidth = window.innerWidth;
        myHeight = window.innerHeight;
    } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
        //IE 6+ in 'standards compliant mode'
        myWidth = document.documentElement.clientWidth;
        myHeight = document.documentElement.clientHeight;
    } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
        //IE 4 compatible
        myWidth = document.body.clientWidth;
        myHeight = document.body.clientHeight;
    }
    return [myWidth, myHeight];
}

function GetCenteredXY(w, h) {
    var ps = getScrollXY();
    var sz = getInnerSize();
    var Left = (sz[0] - w) / 2 + ps[0];
    var Top = (sz[1] - h) / 2 + ps[1];
    return [Math.ceil(Left), Math.ceil(Top)];
}

function getScrollXY() {
    var scrOfX = 0, scrOfY = 0;
    if (typeof (window.pageYOffset) == 'number') {
        //Netscape compliant
        scrOfY = window.pageYOffset;
        scrOfX = window.pageXOffset;
    } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
        //DOM compliant
        scrOfY = document.body.scrollTop;
        scrOfX = document.body.scrollLeft;
    } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
        //IE6 standards compliant mode
        scrOfY = document.documentElement.scrollTop;
        scrOfX = document.documentElement.scrollLeft;
    }
    return [scrOfX, scrOfY];
}

function showdetail(itema,h) {	
		//hi = h+250;
		var kt = GetCenteredXY(800,500);
		$("#showdetailbg").css("left",'0');
		$("#showdetailbg").css("top",'0');
		$("#showdetailbg").css("width",$(window).width());
		$("#showdetailbg").css("height",$(document).height());
		$("#showdetailbg").html('<div style="width: 100%; height: 100%" onclick="enddetail();"> </div>');
		$("#showdetailbg").fadeIn("slow");
		$("#showdetailbg").fadeTo("slow",0.60);
		$("#showdetail").html('<div id="checkdomainbox"><div id="checkdomainboxdetail"><div id="checkdomaincontent"><div style="text-align:center;"><img src="themes/minhchat/images/loading.w.gif" /><br />please wait...</div></div></div></div>');
		//tmpw = ($(window).width()-800)/2;	
		$("#showdetail").css("left",kt[0]+'px');
		$("#showdetail").css("top",kt[1]+'px');
		$("#showdetail").fadeIn("slow");
		$.ajax({
			type: "GET",
			url: 'hoa-chat-xi-ma-minh-chat-thiet-bi-xi-ma-minh-chat.html',
			data: 'detail='+itema,
			success: function(html){
				document.getElementById("showdetail").innerHTML = html;
		   }
		 });
		
};		
function enddetail() {		
		$("#showdetail").fadeOut();	
		//alert(document.getElementById("showdetail").className);
		//alert(document.getElementById("showdetailbg").className);
		$("#showdetailbg").fadeOut();
			
};
function ClickToURL()
{
	var http=document.formURL.SltWeb.value;
	if (http!="")
		window.open(document.formURL.SltWeb.value);
}
function active(c,j)
{
	var id,idj;
	idj	=	"sp_"+j;
	for (i=0;i<=c;i++) {
		id	= "sp_"+i;
		if (id == idj)
			document.getElementById(id).style.display="block";
		else 
			document.getElementById(id).style.display="none";
	}
}
function MM_validateForm() { 
  if (document.getElementById){
	var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
	for (i=0; i<(args.length-2); i+=3) { 
		test=args[i+2]; val=document.getElementById(args[i]);
		if (val) { 
			nm=val.id; 
			if ((val=val.value)!="") {
				if (test.indexOf('isEmail')!=-1) { 
					p=val.indexOf('@'); p=val.indexOf('.');
					if (p<1 || p==(val.length-1)) 
						errors+='- '+nm+' không đúng định dạng.\n';
				} else if (test!='R') { 
					num = parseFloat(val);
					if (isNaN(val)) 
						errors+='- '+nm+' must contain a number.\n';
					if (test.indexOf('inRange') != -1) { 
						p=test.indexOf(':');
						min=test.substring(8,p); 
						max=test.substring(p+1);
						if (num<min || max<num) 
							errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
					}
				} 
			} else if (test.charAt(0) == 'R') 
				errors += '- '+nm+' không hợp lệ.\n'; 
		}
	} 
	if (errors) 
		alert('Có lỗi xảy ra trong quá trình xử lý:\n'+errors);
	document.MM_returnValue = (errors == '');
  }
}

function HamThoiGian(){
	var ThoiGian = new Date(); 
	var Gio = ThoiGian.getHours(); 
	var Phut = ThoiGian.getMinutes();
	var Giay = ThoiGian.getSeconds();
	var Ngay = "";//ThoiGian.getDays();
	if(Gio<10){
		Gio="0"+Gio;
	}
	if(Phut<10){
		Phut="0"+Phut;
	}
	if(Giay<10){
		Giay="0"+Giay;
	}
	
	$('#datetime').html(Gio+":"+Phut+":"+Giay+" "+Ngay);
	setTimeout("HamThoiGian()",1000);
	GetDay();
}
function GetDay(){
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth()+1;
	var year = date.getFullYear();
	$('#datetime1').html(day+"/"+month+"/"+year);
}


$(function() {
	$('#navigation ul li:last-child').addClass('last')
	$('#footer .footer-nav ul li:last-child').addClass('last')

	if( $.browser.msie ){
		$('body').addClass('iefix');
	}

});

$(window).load(function() {
	$('.big-slider').flexslider({
		animation: "slide",
		controlsContainer: ".slider-holder",
		slideshowSpeed: 5000,
		directionNav: true,
		controlNav: true,
		animationDuration: 900
	});

	$('.testimonials-slider').flexslider({
		animation: "fade",
		slideshowSpeed: 3000,
		directionNav: false,
		controlNav: false,
	});
});
