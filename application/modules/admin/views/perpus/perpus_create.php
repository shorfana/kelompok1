<section class="card">
      <div class="card-header">
        <h4 class="card-title">Tambah Data</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form method="post" action="<?php echo base_url().$action ?>" enctype="multipart/form-data">
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA_P</label>
                <div class="col-sm-10">
                  <input type="text" name="NAMA_P" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">slug</label>
                <div class="col-sm-10">
                  <input type="text" name="slug" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">ALAMAT_P</label>
                <div class="col-sm-10">
                  <input type="text" name="ALAMAT_P" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">ABOUT</label>
                <div class="col-sm-10">
                  <input type="text" name="ABOUT" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">DESKRIPSI</label>
                <div class="col-sm-10">
                  <input type="text" name="DESKRIPSI" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">GAMBAR</label>
                <div class="col-sm-10">
                  <input type="text" name="GAMBAR" class="form-control">
                </div>
              </div>
						<div class="form-group row">
                <label class="col-sm-2 col-form-label">STATUS_PAKET</label>
                <div class="col-sm-10">
                  <input type="text" name="STATUS_PAKET" class="form-control">
                </div>
              </div>
</div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect
           waves-light float-right">Simpan</button>
        </div>
      </form>
      </div>
    </section>