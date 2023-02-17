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
    <table class="table table-bordered table-hover table-striped text-center" id="productTable" style="width:100%;">
      <thead class="thead-dark">
        <tr>
          <th class="text-center" scope="col">Product Name</th>
          <th class="text-center" scope="col">Price</th>
          <th class="text-center" scope="col">Category</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody >
      </tbody>
    </table>
  </div>
</div>