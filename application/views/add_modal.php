<!-- Modal -->
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Pet</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
  

    <input type="hidden" id="id" value="<?php echo $id;?>" />

    <label>Pet Name</label>
    <input type="text" name="name" id="name" value="<?php echo $name;?>" />
    <!-- <input type="text" name="name" id="name" class="form-control" placeholder="Enter pet name"> -->

    <label>Species</label>
    <input type="text" name="species" id="species" value="<?php echo $species;?>" />
    <!-- <input type="text" name="species" id="species" class="form-control" placeholder="Enter species"> -->

    <label>Age</label>
    <input type="text" name="age" id="age" value="<?php echo $age;?>" />
    <!-- <input type="number" name="age" id="age" class="form-control" placeholder="Enter pet age"> -->

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" id="save" class="btn btn-primary">Save changes</button>



    <!-- <div class="form-group">
      <label>Pet Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter pet name">   
    </div>
    <div class="form-group">
      <label>Species</label>
      <input type="text" name="species" id="species" class="form-control" placeholder="Enter species">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="number" name="age" id="age" class="form-control" placeholder="Enter pet age">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <?php
        // if($row_status == "1"){
        //   echo "<button  class="edit-btn btn btn-warning" id="edit" data-id="" >Edit</button>";
        // }
        // else{
        //   echo "<button  class="edit-btn btn btn-warning" id="addNew" data-id="" >Add New</button>";
        // }
      
      ?> 


      <button type="submit" id="save" class="btn btn-primary">Save changes</button>
    </div> -->

 
</div>
          
    