<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Pets</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

</head>

<body>

<div class="container">
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MyPets</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4">
        <div class="card">
          <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New Pet
            </button>
          </div>
        </div> 
      </div> 
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Pet</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('TodoController/insertdata'); ?>" method="POST">
                <div class="form-group">
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
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>  
  </div>

  <!-- <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Pet Name</th>
          <th scope="col">Species</th>
          <th scope="col">Age</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>3</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>5</td>
        </tr>
      </tbody>
    </table>
  </div> -->

  <!-- jQuery -->
  <script src="<?php echo base_url();?>assets/js/jquery-3.6.3.js"></script>
  <!-- DataTable -->
  <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
  <!-- bootstrap -->
  <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

</div>	  

</body>
</html>