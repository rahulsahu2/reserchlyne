     
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Latlong</label>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="lat" name="lat" readonly placeholder="Plese enter Latitude" onkeyup="moveMarker();" onblur="moveMarker();" value="<?php echo set_value('lat'); ?>" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('lat'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="long" name="long" readonly value="<?php  echo set_value('long'); ?>" onkeyup="moveMarker();" onblur="moveMarker();"  placeholder="Plese enter logitude" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('long'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<input id = "btnShow1" data-toggle="modal" data-target="#exampleModal" type="button" onclick="getvalue()" value="Select From location"/>
								<input  type="hidden" id = "btn1" value="from"/>
							  </div>
							</div>


							<div class="form-group col-md-12">
								<style>
									#mapCanvas {
										width: 100%;
										height: 520px;
										float: left;
									}
									#infoPanel {
										float: left;
										margin-left: 10px;
									}
									#infoPanel div {
										margin-bottom: 5px;
									}
								</style>
							
							<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document" >
										<div class="modal-content" style="height: 620px;width: 665px">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Map</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div id="mapCanvas"></div>
													<h2 id="add"></h2>
														<div id="infoPanel">
															<b>Marker status:</b>
															<div id="markerStatus"><i>Click and drag the marker.</i></div>
															<b>Current position:</b>
															<div id="info"></div>
															<b>Closest matching address:</b>
															<div id="address"></div>
														</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>

						
						</form>
					</div>
				</div>
            </div>
        </div>
		  
				
              </div>
             
    </div>
            <!-- /page content -->

  
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.datetimepicker.css"/ >
<script src="<?php echo base_url(); ?>js/datepicker/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/jquery.datetimepicker.full.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>

<script>  
	$(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#addmore').after('<br><div class="form-group"><div class="col-md-9 col-sm-6 col-xs-12 row'+i+'" style="padding-left: 268px;" ><input type="file"  name="images[]" class="form-control col-md-7 col-xs-12"></div><div class="form-group col-md-2" id="addmore" style="float:left;padding-left:0px;" ><input type="button" id="'+i+'" value="Delete" class="row'+i+' btn_remove btn btn-danger"></div></div>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $(".row"+button_id+"").remove();
            });
        });
   
	function getadmin()
	{
	  var category_id = $('#category_id').val();	 
	  var params = {category_id: category_id};
		$.ajax({
			url: '<?php echo base_url();?>admin/getadmin',
			type: 'post',
			data: params,
			success: function (r)
			 {
				 $("#admin_id").html(r);
			 }
		});
	}
</script>
  
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />
 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
	<script type="text/javascript">
	function getvalue() {
		alert($(this).val());
	}
	
	$(document).ready(function(){
		$("#btnShow1").click(function(){
			$("#btn1").val('from');
			$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').trigger('focus')
			})  });
	});

	var geocoder = new google.maps.Geocoder();

	function geocodePosition(pos) {
		geocoder.geocode({
			latLng: pos
		}, function(responses) {
		if (responses && responses.length > 0) {
		  updateMarkerAddress(responses[0].formatted_address);
		} else {
		  updateMarkerAddress('Cannot determine address at this location.');
		}
	  });
	}

	function updateMarkerStatus(str) {
		document.getElementById('markerStatus').innerHTML = str;
	}

	function updateMarkerPosition(latLng) {
		
		document.getElementById('info').innerHTML = [
			latLng.lat(),
			latLng.lng()
		].join(', ');
	}

	function updateMarkerAddress(str) {
		document.getElementById('address').innerHTML = str;
	}

	function moveMarker() {
		var lat = parseFloat(document.getElementById('lat').value);
		var lng = parseFloat(document.getElementById('long').value);
		
			var latLng = new google.maps.LatLng(lat, lng);
			var map = new google.maps.Map(document.getElementById('mapCanvas'), {
				zoom: 14,
				center: latLng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			var marker = new google.maps.Marker({
				position: latLng,
				title: 'Point A',
				map: map,
				draggable: true
			});

			// Update current position info.
			updateMarkerPosition(latLng);
			geocodePosition(latLng);

			// Add dragging event listeners.
			google.maps.event.addListener(marker, 'dragstart', function() {
			updateMarkerAddress('Dragging...');
			
				document.getElementById('lat').value = marker.getPosition().lat();
				document.getElementById('long').value = marker.getPosition().lng();
			});

			google.maps.event.addListener(marker, 'drag', function() {
				updateMarkerStatus('Dragging...');
				updateMarkerPosition(marker.getPosition());
		
				document.getElementById('lat').value = marker.getPosition().lat();
				document.getElementById('long').value = marker.getPosition().lng();
			});

			google.maps.event.addListener(marker, 'dragend', function() {
				updateMarkerStatus('Drag ended');
				geocodePosition(marker.getPosition());
			
				document.getElementById('lat').value = marker.getPosition().lat();
				document.getElementById('long').value = marker.getPosition().lng();
			});
	}

	function initialize() {
		var latLng = new google.maps.LatLng(22.71792, 75.8333);
		var map = new google.maps.Map(document.getElementById('mapCanvas'), {
			zoom: 14,
			center: latLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var marker = new google.maps.Marker({
			position: latLng,
			title: 'Point A',
			map: map,
			draggable: true
		});

		// Update current position info.
		updateMarkerPosition(latLng);
		geocodePosition(latLng);

		// Add dragging event listeners.
		google.maps.event.addListener(marker, 'dragstart', function() {
		updateMarkerAddress('Dragging...');
		
			document.getElementById('lat').value = marker.getPosition().lat();
			document.getElementById('long').value = marker.getPosition().lng();
		});

		google.maps.event.addListener(marker, 'drag', function() {
			updateMarkerStatus('Dragging...');
			updateMarkerPosition(marker.getPosition());
		
			document.getElementById('lat').value = marker.getPosition().lat();
			document.getElementById('long').value = marker.getPosition().lng();
		});

		google.maps.event.addListener(marker, 'dragend', function() {
			updateMarkerStatus('Drag ended');
			geocodePosition(marker.getPosition());
		
			document.getElementById('lat').value = marker.getPosition().lat();
			document.getElementById('long').value = marker.getPosition().lng();
		});
	}
	// Onload handler to fire off the app.
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCRo7V4f7wZd0vROUSNM0joDbY1AoRLe6k&callback=myMap"></script>
		
