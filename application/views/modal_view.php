<!-- Modal for Adding and Editing Entries -->
<div class="modal-header">
    <h5 class="modal-title" id="ModalLabel">Add New Product</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="productForm" name="productForm" method="post" action="<?php echo base_url(); ?>TodoController/insertData">
  <div class="modal-body">
      <div class="form-group">
          <label for="product_name">Product Name</label>
          <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name">
      </div>
      <div class="form-group">
          <label for="product_price">Product Price</label>
          <input type="text" class="form-control" id="product_price" placeholder="Enter Product Price" name="product_price">
      </div>
      <div class="form-group">
          <label for="product_category">Category</label>
          <input type="text" class="form-control" id="product_category" placeholder="Enter Product Category" name="product_category">
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary" name="save" value="Save Data">Add</button>
  </div>
</form>    






