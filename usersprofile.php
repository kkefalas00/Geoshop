<script>
setActive(8);
</script>

<script>
getuserprofile();
</script>

<div class=row>
	<div class=col-md-3>
	</div>
	<div class=col-md-6>
	<form action="" id='frm_prof' class=t1 method=post>
		<h1>User Profile</h1>
	  <div class="form-group">
		   <input type="text" class="form-control" id="fname" name="fnm" placeholder="Type your first name" value="">
	  </div>
	  <div class="form-group">
		   <input type="text" class="form-control" id="lname" name="lnm" placeholder="Type your last name" value="">
	  </div>
	  <div class="form-group">
       <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password: ex. a!123Ager" value="">
	  </div>
	  <div class="form-group">
    
		<input type="email" class="form-control" id="email" name="email" placeholder="Email: ex. my@gmail.com" value="">
	  </div>
	  
	   <!--<div class="form-group">
		   Profile image: <input type="file" required accept="image/png, image/gif, image/jpeg" capture="camera" class="form-control" id="fimage" name="fimage" placeholder="Image Profile">
	  </div>-->
	  
	  <button type="submit" class="btn btn-default bt" >Update</button>
	</form>
	</div>
	<div class=col-md-3>
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

