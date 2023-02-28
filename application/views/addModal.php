<!--  -->
				<div class="modal-header border-bottom-0">
					<!-- <h5 class="modal-title" id="Modal">Player Info</h5> -->
					<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">  -->
						<h5 class="modal-title" id="Modal"><?php 
						if($row_status== '1'){
							echo "EDIT PLAYER INFO";

						}else{
							echo "ADD PLAYER";
						}
						
						?></h5>
						<!-- <span aria-hidden="true">&times;</span> -->
					</button>
				</div>
			 <form id="addEntry" >
				<!-- <form id="addEntry" name="addEntry"> -->
					<div class="modal-body">
						<div class="form-group">
						<input type="hidden" name="player_id" id="id" value="<?php echo $id;?>" />
							<label for="fname">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"  placeholder="Enter First Name" value="<?php echo $first_name;?>">
						</div>
						<div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="<?php echo $last_name;?>">
						</div>
						<div class="form-group">
							<label for="age">Age</label>
							<!-- <input type="text" class="form-control" id="age" placeholder="Age"> -->
							<input type="text" class="form-control" name="age" id="age" min="1" max="100" placeholder="Enter Age" value="<?php echo $age;?>">
							<input type="hidden" class="form-control" id="row_status" name="row_status" value="<?php echo $row_status;?>">
						</div>
					</div>
					<div class="modal-footer border-top-0 d-flex justify-content-center">
						<button type="button" class="btn btn-success" id="submitbtn" value="Save Data">Submit</button>
						
						<button type="button" onclick="location.reload()" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
						
						
					</div>
				</form>
			</div>
		</div>
	</div>


	


<!-- EDIT -->