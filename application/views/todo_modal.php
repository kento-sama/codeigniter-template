      <!-- //header -->
      <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"><?php
            if($row_status == "1"){
                  echo "UPDATE ITEM TO TODOLIST";
            }else{
                  echo "CREATE ITEM TO TODOLIST";
            }
      ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- body -->
      <div class="modal-body">
            <label>TO DO ITEM</label>
            <input class="form-control" id="item" name="item" value ="<?php echo $item_desc;?>" required/>
            <input type="hidden" class="form-control" id="todo_id" name="todo_id" value ="<?php echo $todo_id;?>"required/>
            <input type="hidden" class="form-control" id="row_status" name="row_status" value ="<?php echo $row_status;?>"required/>
      </div>
      <!-- footer -->
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <?php
            
                  if($row_status == "1"){
                        echo "<button class=\"btn btn-primary\" id=\"createlist\">Update</button>";
                  }else{
                        echo "<button class=\"btn btn-primary\" id=\"createlist\">Create</button>";
                  }
            ?>
           
            <!-- <button type="button" class="btn btn-primary" onclick="test(item.value)">Create</button> -->
            
      </div>