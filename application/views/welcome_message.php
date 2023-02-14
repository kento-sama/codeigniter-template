
<div class="row">
 <div class="col-md-12">
	<div class="card">
	<div class="card-header">
	<h3>Top Dota Player!
	<button type="button" class="btn btn-secondary float-end" data-bs-toggle="modal"  data-bs-target="#addForm">Add Player</button>	
	</h3>
	</div>
	<?php
if($this->session->flashdata('success'))
{
	?>

<div class="alert alert-success" role="alert">
  <?php
	echo $this->session->flashdata('success');
	?>
</div>
<?php
}?>
	<div class="card-body">
		<table class="table table table-border">
			<thead>
				<tr class="text-center">
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
					<th>Update/Delete</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<tr>
					<td>Rejay</td>
					<td>Flora</td>
					<td>26</td>
					<td>
					<button type="button" class="btn btn-warning">Edit</button>
					<button type="button" class="btn btn-danger">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="text-center" >
		
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-bottom-0">
					<h5 class="modal-title" id="Modal">Player Info</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<!-- <span aria-hidden="true">&times;</span> -->
					</button>
				</div>
				<form id="addEntry" name="addEntry" method="post" action="<?php base_url() ?>TodoController/savedata">
					<div class="modal-body">
						<div class="form-group">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"  placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
						</div>
						<div class="form-group">
							<label for="age">Age</label>
							<!-- <input type="text" class="form-control" id="age" placeholder="Age"> -->
							<input type="number" class="form-control" name="age" id="age" min="18" max="65" placeholder="Enter Age">
						</div>
					</div>
					<div class="modal-footer border-top-0 d-flex justify-content-center">
						<button type="submit" class="btn btn-success" name="save" value="Save Data">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
 </div>
</div>
	

	<!-- Button trigger modal -->
	


	<!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
