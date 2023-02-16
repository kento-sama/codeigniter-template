<div id="container">
  <!-- Alert Message -->
  <?php if($this->session->flashdata('status')) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('status'); ?>
    </div>
  <?php endif; ?>

  <!-- Add Modal Trigger Button -->
	<div class="d-flex justify-content-between">
    <div style="margin-left:20px;"><h4>List of Products</h4></div>
    <div style="margin-right:20px;"><button type="button" class="btn btn-primary" id="addBtn">Add Product</button></div>
  </div>

  <!-- Table View -->
  <div style="margin: 20px;">
    <table class="table table-hover" id="productTable">
      <thead>
        <tr>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>