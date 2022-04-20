<script>
setActive(9);
</script>

<div class="row r1">
	
	
	<div class="col-md-6">
		<h4>Choose your lat and lng of your shop on the following map:</h4>
		<div id="map" class=mp1>
		
		</div>
	</div>
	<div class=col-md-6>
		<form action="" id='frm_crtshop' class=t1 method=post>
			<h4>Create your New Shop :</h4>
		  <div class="form-group">
			   <input type="text" class="form-control" required id="dscr" name="dscr" placeholder="Type the description of your new shop">
		  </div>
		  <div class="form-group">
			   <input type="text" class="form-control" required id="shop_adr" name="shopadr" placeholder="Type the address of the shop">
		  </div>
		  <div class="form-group">
		   <input type="text" class="form-control" required id="fname_shop" name="sh_name" placeholder="Type your new shop name">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="phone" required name="ph" placeholder="Phone: ex. 2610942082">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="lat" required name="lat" placeholder="Lat: ex. 30.584785">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="lng" required name="lng" placeholder="Lng: ex. 25.584785">
		  </div>
		  
		   <!--<div class="form-group">
			   Profile image: <input type="file" required accept="image/png, image/gif, image/jpeg" capture="camera" class="form-control" id="fimage" name="fimage" placeholder="Image Profile">
		  </div>-->
		  
		  <button type="submit" class="btn btn-default bt" >Create</button>
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

</script>