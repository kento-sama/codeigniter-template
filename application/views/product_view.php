<div id="container">
  <!-- Alert Message -->
  <?php if($this->session->flashdata('status')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('status'); ?>
    </div>
  <?php endif; ?>

  <!-- Modal Trigger Button -->
	<div class="d-flex justify-content-between">
    <div style="margin-left:13%;"><h4>List of Products</h4></div>
    <div style="margin-right:12%;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button></div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addProduct" name="addProduct" method="post" action="<?php base_url()?>TodoController/insertData">
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
            </div>
        </div>
    </div>

  <!-- Table View -->
  <div class="text-center">
    <table class="table table-hover" id="productTable">
      <thead>
        <tr>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Xiaomi 12T Pro</td>
          <td>15000</td>
          <td>Phones</td>
          <td>
            <a href="" class="btn btn-warning btn-sm">Edit</a>
            <a href="" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>