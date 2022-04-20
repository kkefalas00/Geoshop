<script>
getMyorders(<?php echo $_GET['shopid'];?>)
</script>

<script>
seeTheorder();

</script>

<div class=row>
	Search: <input type=text id=search4 placeholder="Type your order">
	<br><br>
</div>
<input type=text name='sid5' id='sid5' hidden>
<div class=row>
	<div class=col-md-2>
	</div>
	<div class=col-md-8>
		<div id=myorders>
		</div>
	</div>
	<div class=col-md-2>
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

<div class="modal" id="myModal7">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

     <!-- Modal body -->
      <div class="modal-body">
		<input type=text name='ordid5' id=ordid5 hidden>
			<div class=row>
					<div class=col-md-12>
						<div id=dd8>
						</div>
					</div>
			</div>
      </div>
      <!-- Modal footer -->
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id=checkorder>Confirm</button>
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
