<!-- Modal for Adding and Editing Entries -->
<div class="modal-header">
    <h5 class="modal-title" id="ModalLabel">
    <?php
        if($row_status == '1'){
            echo "Edit Product Info";
        } 
        else {
            echo "Add New Product";
        }    
    ?>
    </h5>
</div>
<form id="productForm">
  <div class="modal-body">
      <div class="form-group">
          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
          <label for="product_name">Product Name</label>
          <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name" value="<?php echo $product_name;?>">
      </div>
      <div class="form-group">
          <label for="product_price">Product Price</label>
          <input type="text" class="form-control" id="product_price" placeholder="Enter Product Price" name="product_price" value="<?php echo $product_price;?>">
      </div>
      <div class="form-group">
          <label for="product_category">Category</label>
          <input type="text" class="form-control" id="product_category" placeholder="Enter Product Category" name="product_category" value="<?php echo $product_category;?>">
          <input type="hidden" class="form-control" id="row_status" name="row_status" value="<?php echo $row_status;?>">
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <button type="button" class="btn btn-primary"  id="submitBtn">Add</button>
  </div>
</form>    






