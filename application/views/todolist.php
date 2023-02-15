<div class="container">
    <h1 class="lead text-center">TODO LIST EXERCISE</h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header lead text-bold text-lg text-center">
                    CREATE TO DO LIST
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#create_list">
                        ADD ITEM
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create_list" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">ADD ITEM TO TODOLIST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>TO DO ITEM</label>
            <input class="form-control" id="item" name="item" required/>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="test(item.value)">Create</button>
      </div>
    </div>
  </div>
</div>