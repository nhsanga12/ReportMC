<? 
	global $id,$config;
	$cat		=	categories_detail($id['category']);
	$thongtin 	=	new_articles_by_cat(140,1);
	if ($config['default_language'] == 'vn')
		$info = array("Nhập địa chỉ của bạn","Bấm vào đây để lấy địa chỉ hiện tại của bạn","Chọn chi nhánh công ty Minh Chất","Trụ sở chính: 244-246 Phan Anh, P.Hiệp Tân, Q.Tân Phú, Tp.HCM","Chi nhánh Đà Nẵng: Đường số 3, KCN Hòa Khánh, Q.Liên Chiểu, Tp.Đà Nẵng", "Tìm đường","Hủy bỏ");
	else
		$info = array("Your address","Click here to get your position","Select subsidiary Minh Chat company","Main office: 244-246 Phan Anh Stress, Hiep Tan ward, Tan Phu district, HCM city","Branch Da Nang: Stress 3, Hoa Khanh Industrial Parks, Lien Chieu district, Da Nang city","OK","Reset");
?>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyA4rdkDWqVe7a8m77tbTdAGJDiNa-EHhCw&sensor=true"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
  function calculateRoute(from, to) {
    // Center initialized to Naples, Italy
    var myOptions = {
      zoom: 10,
      center: new google.maps.LatLng(40.84, 14.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // Draw the map
    var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }
 
      $(document).ready(function() {
        // If the browser supports the Geolocation API
    if (typeof navigator.geolocation == "undefined") {
      $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }
 
        $("#from-link, #to-link").click(function(event) {
      event.preventDefault();
      var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            $("#" + addressId).val(results[0].formatted_address);
          else
            $("#error").append("Unable to retrieve your address<br />");
        });
      },
      function(positionError){
        $("#error").append("Error: " + positionError.message + "<br />");
      },
      {
        enableHighAccuracy: true,
        timeout: 10 * 1000 // 10 seconds
          });
        });
 
        $("#calculate-route").submit(function(event) {
      event.preventDefault();
      calculateRoute($("#from").val(), $("#to").val());
    });
  });
</script>
<style type="text/css">
  #map {
    width: 90%;
    height: 350px;
    margin-top: 10px;
    margin: auto;
    padding: 10px;
  }
  /* #### bootstrap Form #### */
.bootstrap-frm {
    width: 80%;
    margin-right: auto;
    margin-left: auto;
    background: #FFF;
    padding: 10px;
    font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #888;
    text-shadow: 1px 1px 1px #FFF;
    border:1px solid #DDD;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}
.bootstrap-frm h1 {
    font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom: 1px solid #DADADA;
    margin: -10px -30px 30px -30px;
    color: #888;
}
.bootstrap-frm h1>span {
    display: block;
    font-size: 12px;
}
.bootstrap-frm label {
    display: block;
    margin: 0px 0px 5px;
}
.bootstrap-frm label>span {
    text-align: left;
    padding-right: 10px;
    margin-top: 10px;
    color: #333;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: bold;
}
.bootstrap-frm input, .bootstrap-frm input, .bootstrap-frm textarea, .bootstrap-frm select{
    border: 1px solid #CCC;
    color: #888;
    height: 20px;
    margin-bottom: 16px;
    margin-right: 6px;
    margin-top: 2px;
    outline: 0 none;
    padding: 6px 12px;
    width: 90%;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font: normal 14px/14px "Helvetica Neue", Helvetica, Arial, sans-serif;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.bootstrap-frm select {
    background: #FFF url('down-arrow.png') no-repeat right;
    background: #FFF url('down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 100%;
    height: 35px;
}
.bootstrap-frm textarea{
    height:100px;
}
.bootstrap-frm .button {
    background: #FFF;
    border: 1px solid #CCC;
    padding: 10px 25px 10px 25px;
    color: #333;
    border-radius: 4px;
    height: 35px;
    width: 50%;
}
.bootstrap-frm .button:hover {
    color: #333;
    background-color: #EBEBEB;
    border-color: #ADADAD;
}
</style>
				<div class="content-main">
					<div class="grid-a">
						<ul>
							<li>
								<h5><?=$cat[0]['title']?></h5>
								<p>
									<form class="bootstrap-frm" id="calculate-route" name="calculate-route" action="#" method="get">
									  <label><span><a id="from-link" href="#"><?=$info[1]?></a></span></label>
									  <input type="text" id="from" name="from" required="required" placeholder="<?=$info[0]?>" size="100%" />
									  <select id="to">
										<option value="244 Phan Anh, phường Hiệp Tân, quận Tân Phú, thành phố Hồ Chí Minh"><?=$info[3]?></option>
									  	<option value="Hòa Khánh Bắc, quận Liên Chiểu, thành phố Đà Nẵng"><?=$info[4]?></option>
									  </select>
									 
									  <input class="button" type="submit" value="<?=$info[5]?>" />
									  <input class="button" type="reset" value="<?=$info[6]?>" />
									  <br/>
									    <div id="map">
									    	<iframe src="https://www.google.com/maps/embed?pb=!1m29!1m12!1m3!1d31356.391701738135!2d106.62595280385688!3d10.769202310404316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m14!1i0!3e6!4m5!1s0x31752e98f7938e49%3A0x568a6697f0c893f9!2zQ8O0bmcgdmnDqm4gxJDhuqdtIFNlbiBIw7JhIELDjG5o!3m2!1d10.768811!2d106.63786499999999!4m5!1s0x31752c18e8fc8247%3A0xcc4e3f0fc5f4be99!2sMinh+Chat+Production-Trading+Co.%2C+Ltd%2C+244-246+Phan+Anh+Street%2C+Hiep+Tan+Ward%2C+Tan+Phu+District%2C+Hochiminh+City%2C+%7B%7BProvince%2C+Vi%E1%BB%87t+Nam!3m2!1d10.768191999999999!2d106.622872!5e0!3m2!1svi!2s!4v1400174576329" width="100%" height="350" frameborder="0" style="border:0"></iframe>
									    </div>
									    <p id="error"></p>
								 	</form>
								</p>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="content-main">
					<div class="grid-a">
						<ul>
							<li>
								<h5><?=$thongtin[0]['title']?></h5>
								<p>
									<?=str_replace('dashed','',$thongtin[0]['contents'])?>
								</p>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

