<div class="container">
	<h3>User Lists</h3>
	<div class="alert alert-success" style="display: none;">

	</div>
	<button id="btnAdd" class="btn btn-success">Add User</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<td>ID</td>
				<td>User Name</td>
				<td>Address</td>
				<td>Created at</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody id="showdata">

		</tbody>
	</table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form id="myForm" action="" method="post" class="form-horizontal">
					<input type="hidden" name="txtId" value="0">
					<div class="form-group">
						<label for="name" class="label-control col-md-4">User Name</label>
						<div class="col-md-8">
							<input type="text" name="txtEmployeeName" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="label-control col-md-4">Address</label>
						<div class="col-md-8">
							<textarea class="form-control" name="txtAddress"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<div class="modal-body">
				Do you want to delete this record?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
	$(function() {
		 
		$('#btnAdd').click(function() {
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Employee');
			$('#myForm').attr('action', '<?php echo base_url() ?>user/showAllUser');
		});

		//function
		function showAllUser() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>user/showAllUser',
				async: false,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						//alert(data[i].id);

						html += '<tr>' +
							'<td>' + data[i].id + '</td>' +
							'<td>' + data[i].employee_name + '</td>' +
							'<td>' + data[i].address + '</td>' +
							'<td>' + data[i].created_at + '</td>' +
							'<td>' +
							'<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].id + '">Edit</a>' +
							'<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].id + '">Delete</a>' +
							'</td>' +
							'</tr>';
					}
					$('#showdata').html(html);
				},
				error: function() {
					alert('Could not get Data from Database');
				}
			});
		}
	});
</script>