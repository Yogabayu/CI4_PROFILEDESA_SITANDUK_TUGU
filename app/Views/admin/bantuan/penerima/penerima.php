<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Program Bantuan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?= base_url('/managebantuan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali
            </button></a>
          <?php if ($bantuan['status'] == 1) {
          ?>
            <a href="<?php echo base_url('tambahpenerima/' . $bantuan['id_program']); ?>">
              <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Tambah Penerima
              </button>

            </a>
          <?php
          } else {
            echo "";
          }
          ?>

          <br> <br>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="mdi mdi-check-all mr-2"></i>
              <?= session()->getFlashdata('pesan'); ?>
            </div>

          <?php endif; ?>
          <br> <br>
          <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">Rincian Program</th>


              </tr>
            </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Program</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $bantuan['nama_program']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Sasaran Program</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;">
                  <?php if ($bantuan['sasaran'] == '1') {
                    echo "Penduduk / Perorangan";
                  } else if ($bantuan['sasaran'] == '2') {
                    echo "Keluarga - KK";
                  } else if ($bantuan['sasaran'] == '3') {
                    echo "UMKM";
                  }

                  ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Masa Berlaku </td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;">
                  <?php
                  $dt = explode('-', $bantuan['tgl1']);
                  if ($dt[1] == '01') {
                    $month = 'Januari';
                  }
                  if ($dt[1] == '02') {
                    $month = 'Februari';
                  }
                  if ($dt[1] == '03') {
                    $month = 'Maret';
                  }
                  if ($dt[1] == '04') {
                    $month = 'April';
                  }
                  if ($dt[1] == '05') {
                    $month = 'Mei';
                  }
                  if ($dt[1] == '06') {
                    $month = 'Juni';
                  }
                  if ($dt[1] == '07') {
                    $month = 'Juli';
                  }
                  if ($dt[1] == '08') {
                    $month = 'Agustus';
                  }
                  if ($dt[1] == '09') {
                    $month = 'September';
                  }
                  if ($dt[1] == '10') {
                    $month = 'Oktober';
                  }
                  if ($dt[1] == '11') {
                    $month = 'November';
                  }
                  if ($dt[1] == '12') {
                    $month = 'Desember';
                  }
                  echo   $dt[2] . ' ' . $month . ' ' . $dt[0];

                  ?> -
                  <?php
                  $dt = explode('-', $bantuan['tgl2']);
                  if ($dt[1] == '01') {
                    $month = 'Januari';
                  }
                  if ($dt[1] == '02') {
                    $month = 'Februari';
                  }
                  if ($dt[1] == '03') {
                    $month = 'Maret';
                  }
                  if ($dt[1] == '04') {
                    $month = 'April';
                  }
                  if ($dt[1] == '05') {
                    $month = 'Mei';
                  }
                  if ($dt[1] == '06') {
                    $month = 'Juni';
                  }
                  if ($dt[1] == '07') {
                    $month = 'Juli';
                  }
                  if ($dt[1] == '08') {
                    $month = 'Agustus';
                  }
                  if ($dt[1] == '09') {
                    $month = 'September';
                  }
                  if ($dt[1] == '10') {
                    $month = 'Oktober';
                  }
                  if ($dt[1] == '11') {
                    $month = 'November';
                  }
                  if ($dt[1] == '12') {
                    $month = 'Desember';
                  }
                  echo   $dt[2] . ' ' . $month . ' ' . $dt[0];

                  ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Keterangan</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $bantuan['keterangan']; ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 10%;">Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat/ Tanggal Lahir</th>

                <th>Jenis Kelamin</th>
                <th>Alamat</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($penerima as $p) : ?>

                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>

                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editpenerima/' . $p['id_penerima']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletepenerima/' . $p['id_penerima']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" class="form-control" id="id_program" name="id_program" value="<?= $p['id_program']; ?>" required>
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['tempatlahir']; ?> / <?php
                                                                                  $dt = explode('-', $p['tanggallahir']);
                                                                                  if ($dt[1] == '01') {
                                                                                    $month = 'Januari';
                                                                                  }
                                                                                  if ($dt[1] == '02') {
                                                                                    $month = 'Februari';
                                                                                  }
                                                                                  if ($dt[1] == '03') {
                                                                                    $month = 'Maret';
                                                                                  }
                                                                                  if ($dt[1] == '04') {
                                                                                    $month = 'April';
                                                                                  }
                                                                                  if ($dt[1] == '05') {
                                                                                    $month = 'Mei';
                                                                                  }
                                                                                  if ($dt[1] == '06') {
                                                                                    $month = 'Juni';
                                                                                  }
                                                                                  if ($dt[1] == '07') {
                                                                                    $month = 'Juli';
                                                                                  }
                                                                                  if ($dt[1] == '08') {
                                                                                    $month = 'Agustus';
                                                                                  }
                                                                                  if ($dt[1] == '09') {
                                                                                    $month = 'September';
                                                                                  }
                                                                                  if ($dt[1] == '10') {
                                                                                    $month = 'Oktober';
                                                                                  }
                                                                                  if ($dt[1] == '11') {
                                                                                    $month = 'November';
                                                                                  }
                                                                                  if ($dt[1] == '12') {
                                                                                    $month = 'Desember';
                                                                                  }
                                                                                  echo   $dt[2] . ' ' . $month . ' ' . $dt[0];

                                                                                  ?> </td>

                  <td style="vertical-align: middle;"><?php if ($p['sex'] == '1') {
                                                        echo "Laki - Laki";
                                                      } else if ($p['sex'] == '2') {
                                                        echo "Perempuan";
                                                      }

                                                      ?></td>
                  <td style="vertical-align: middle;"> <?= $p['alamat_sekarang']; ?></td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end row -->

  </div> <!-- end container-fluid -->

</div> <!-- end content -->



<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>