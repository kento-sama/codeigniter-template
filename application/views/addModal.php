<!--  -->
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
							<input type="number" class="form-control" name="age" id="age" min="1" max="100" placeholder="Enter Age">
						</div>
					</div>
					<div class="modal-footer border-top-0 d-flex justify-content-center">
						<button type="submit" class="btn btn-success" name="save" value="Save Data">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>