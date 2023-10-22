<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>


<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Profil Admin</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/akunkades/update/' . $akun['id_kades']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/profilkades'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIK</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nik" name="nik" required value="<?= $akun['nik']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $akun['nama']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Username</label>
              <div class="col-9">
                <input type="text" class="form-control" id="username" name="username" required value="<?= $akun['username']; ?>">
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row">
              <div class="col-9">
                <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
              </div>
            </div>


          </div>
        </div>


      </div>
    </form>
  </div>
</div>




<?php $this->Endsection(); ?>