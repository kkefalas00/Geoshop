
<div class=row>
	Search: <input type=text id=search5 placeholder="Type your products">
	<br><br>
</div>

<div class=row>

	<div class=col-md-3>
	</div>
	<div class=col-md-6>
		<div id=page>
		</div>
	
	</div>
	<div class=col-md-3>
	</div>
   
</div>

<div class=row>

	<div class=col-md-3>
	</div>
	<div class=col-md-6>
		<div id=page2>
		</div>
	
	</div>
	<div class=col-md-3>
	</div>
   
</div>

<script>
customerpage(<?php echo $_GET['shopid']; ?>);
getShopr(<?php echo $_GET['shopid']; ?>);
</script>

<div class=row>
			<div class=col-md-3>
			</div>
			<div class=col-md-6>
				<div id=message>
				</div>
			</div>
			<div class=col-md-3>
			</div>
</div>