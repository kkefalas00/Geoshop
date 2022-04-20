


<div class=row>
<div class='col-md-3'>
		 
</div>
<div class='col-md-6'>


		<form action="" id='frm_product' class=t1 method=post>
			<h1>Choose your products:</h1>
		 <div class="form-group" id=d1>
		  
		 </div>
		  <div class="form-group">
		   <input type="text" class="form-control" id="dsr" name="dsr" placeholder="Type your product's description">
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" min=0 id="price" name="price" placeholder="Type your product's price">
		  </div>
		  <input type=hidden name='shopid' id='shid' value='<?php echo $_GET['shopid']; ?>'>
		  <div class="form-group">
		  <input type=text name='prid' id='prid' hidden>
		  </div>
		  <button type="submit" class="btn btn-default bt">Add</button>
		</form>
					
</div>
<div class='col-md-3'>
<div id=message>
		</div>
</div>

</div>


<div class=row>
	<div class=col-md-3>
	</div>
	<div class=col-md-6>
		<div id=myprod>
		</div>
	</div>
	<div class=col-md-3>
	</div>
</div>


<script>
getallprod();
getShopproducts(document.getElementById("shid").value);
</script>


<div class="modal" id="myModal4">
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
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='delprod()'>Yes</button><button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
      </div>
		 <div class=row>
			<div class=col-md-3>
			</div>
			<div class=col-md-6>
				<div id=message1>
				</div>
			</div>
			<div class=col-md-3>
			</div>
		</div>
    </div>
  </div>

</div>






