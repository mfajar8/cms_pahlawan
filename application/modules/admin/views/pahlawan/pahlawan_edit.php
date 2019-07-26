<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pahlawan</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
                    <label>id_pahlawan</label>
                    <input type="text" name="id_pahlawan" class="form-control" placeholder="" value="<?php echo $dataedit->id_pahlawan?>" readonly>
            </div>
	  <div class="form-group">
            <label>kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?php echo $dataedit->kategori?>">
    </div>
	  <div class="form-group">
            <label>foto</label>
            <input type="text" name="foto" class="form-control" value="<?php echo $dataedit->foto?>">
    </div>
	  <div class="form-group">
            <label>nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $dataedit->nama?>">
    </div>
	  <div class="form-group">
            <label>nama_asli</label>
            <input type="text" name="nama_asli" class="form-control" value="<?php echo $dataedit->nama_asli?>">
    </div>
	  <div class="form-group">
            <label>tempat_lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $dataedit->tempat_lahir?>">
    </div>
	  <div class="form-group">
            <label>tanggal_lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $dataedit->tanggal_lahir?>">
    </div>
	  <div class="form-group">
            <label>tempat_wafat</label>
            <input type="text" name="tempat_wafat" class="form-control" value="<?php echo $dataedit->tempat_wafat?>">
    </div>
	  <div class="form-group">
            <label>tanggal_wafat</label>
            <input type="text" name="tanggal_wafat" class="form-control" value="<?php echo $dataedit->tanggal_wafat?>">
    </div>
	  <div class="form-group">
            <label>julukan</label>
            <input type="text" name="julukan" class="form-control" value="<?php echo $dataedit->julukan?>">
    </div>
	  <div class="form-group">
            <label>jasa</label>
            <input type="text" name="jasa" class="form-control" value="<?php echo $dataedit->jasa?>">
    </div>
	  <div class="form-group">
            <label>biografi</label>
            <input type="text" name="biografi" class="form-control" value="<?php echo $dataedit->biografi?>">
    </div>
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
