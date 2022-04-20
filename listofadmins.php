<script>
setActive(3);
</script>

<script>
getMyadmins();
</script>

<div class=row>
	<div class=col-md-3>
	</div>
	<div class=col-md-6>
		<div id=listadmins>
		</div>
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
<input type=hidden id=idadmin>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">DELETE ADMIN</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Do you want to delete this admin?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='deladmin()'>Yes</button><button type="button" class="btn btn-danger" data-dismiss="modal">No</button> 
      </div>

    </div>
  </div>

</div>