<script>
setActive(2);
</script>
<div class=row>
	Search: <input type=text id=search2 placeholder="Type your products">
	<br><br>
</div>
<div class=row>

	<div class=col-md-2>
	</div>
	<div class=col-md-8>
	
		<div id=listprod>
		
		</div>
	</div>
	<div class=col-md-2>
	</div>


</div>



<div class=row>
	<div class=col-md-4>
	</div>
	<div class=col-md-4>
		<div id=message1>
		</div>
	</div>
	<div class=col-md-4>
	</div>
</div>

<input type=hidden id=prid>


<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create new product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" id='frm_crtproduct' enctype="multipart/form-data">

			<div class="form-group">
				<input type="text" class="form-control" id="prtitle" name="prtitle" placeholder="Title: ex. Product 1" required>
			</div>
			<div class="form-group">
			   <input type="text" class="form-control" id="prdscr" name="prdscr" placeholder="Description: ex: This is a new product"required>
			</div>
			<div class="form-group">
			   Profile image: <input type="file" accept="image/png, image/gif, image/jpeg" capture="camera" class="form-control" id="primage" name="primage" placeholder="Image Profile" required >
			</div>
  
			<button type="submit" class="btn btn-default" onclick="">Create</button>
		</form>
		
		<div id=message>
		</div>
      </div>

	<!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='getMyproducts()'>Close</button>
      </div>

    </div>
  </div>

</div>


<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Do you want to delete this product?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='deleteproduct()'>Yes</button><button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
      </div>

    </div>
  </div>

</div>

<script>
getMyproducts();
</script>
<script>
deleteproduct();
</script>