<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Favorite</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>id_user</label>
            <input type="text" name="id_user" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>id_pahlawan</label>
            <input type="text" name="id_pahlawan" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_favorite" /> 
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
