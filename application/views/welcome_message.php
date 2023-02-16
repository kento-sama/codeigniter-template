<div class="row">
 <div class="col-md-12">
	<div class="card">
	<div class="card-header">
	<h3>Top Dota Player!
	<!-- data-bs-target="#addForm" data-bs-toggle="modal" -->
	<button type="button" class="btn btn-secondary float-end"  id ="addbtn" >Add Player</button>	
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
		<table id="playertbl" class="table table table-border">
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
	
	</div>
 </div>
</div>
	

	<!-- Button trigger modal -->
	


	<!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
