


<div class="row r1">
	<div class=col-md-6>
	
		<h4>Choose your lat and lng of your shop on the following map:</h4>
		<div id="map" class=mp1>
		
		</div>
	</div>
	

	<div class=col-md-6>
		<form action="" id='frm_shop' class=t1 method=post>
			<h1>Your shop profile:</h1>
		  <div class="form-group">
			   <input type="text" class="form-control" id="fnm" name="fnm" placeholder="Type your shop's name" value="">
		  </div>
		  <div class="form-group">
		   <input type="text" class="form-control" id="phone" name="ph" placeholder="Type your shop's phone ex: 2610234536" value="">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="address" name="adr" placeholder="Type your shop's address ex: Ermou 54" value="">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="lat" required name="lat" placeholder="Lat: ex. 30.584785">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="lng" required name="lng" placeholder="Lng: ex. 25.584785">
		  </div>
		  <input type=hidden name='shopid' value='<?php echo $_GET['shopid']; ?>'>
		   <!--<div class="form-group">
			   Profile image: <input type="file" required accept="image/png, image/gif, image/jpeg" capture="camera" class="form-control" id="fimage" name="fimage" placeholder="Image Profile">
		  </div>-->
		  
		  <button type="submit" class="btn btn-default bt" >Update</button>
		</form>
	</div>
	
</div>
<div class=row>
	<div class=col-md-4>
	</div>
	<div class=col-md-4>
		<div id=message>
		</div>
	</div>
	<div class=col-md-4>
	</div>
</div>

<script>
showMap();
getShopdata(<?php echo $_GET['shopid'];?>);

</script>