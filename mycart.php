<script>
setActive(15);
</script>

<div class=row>

	<div class=col-md-3>
	</div>
	<div class=col-md-6>
		<div id=s2>
		</div>
	
	</div>
	<div class=col-md-3>
	</div>
    <input type=text id='sid1' hidden>

</div>

<div class=row>
			<div class=col-md-3>
			</div>
			<div class=col-md-6>
				<div id=message2>
				</div>
			</div>
			<div class=col-md-3>
			</div>
</div>

<script>
getMycart();

</script>

<div class="modal" id="myModal5">
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
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='delprod1()'>Yes</button><button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
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

<div class="modal" id="myModal6">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ckeckout</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

     <!-- Modal body -->
      <div class="modal-body">
        <form action="" id='frm_addtoorder' method=post>

			
			<button type="submit" class="btn btn-default">Confirm order</button>
		</form>
		
		<div id=message>
		</div>
      </div>
      <!-- Modal footer -->
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
		 <div class=row>
			<div class=col-md-12>
				<div id=message3>
				</div>
			</div>
			
		</div>
    </div>
  </div>

</div>