<div class=row>

	<div class=col-md-2>
	</div>
	<div class=col-md-8>
		<div id=s1>
		</div>
	
	</div>
	<div class=col-md-2>
	</div>


</div>

<script>
getShopallproducts(<?php echo $_GET['shopid']; ?>);
</script>

<div class="modal" id="myModal5">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add to card</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

     <!-- Modal body -->
      <div class="modal-body">
        <form action="" id='frm_addtocart'method=post>

			<div class="form-group">
				<input type="text" min=0 class="form-control" id="q" name="q" placeholder="Type your quantity" required>
			</div>
			<input type=text name='prid' id='prid' hidden>
			<input type=text name='pric' id='pric' hidden>
			<input type=text name='shopid' value='<?php echo $_GET['shopid']; ?>' hidden>
			<button type="submit" class="btn btn-default">Add to cart</button>
		</form>
		
		<div id=message>
		</div>
      </div>
      <!-- Modal footer -->
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id=clearq>Close</button>
      </div>
		 <div class=row>
			<div class=col-md-12>
			<div id=message1>
				</div>
			</div>
			
		</div>
    </div>
  </div>

</div>