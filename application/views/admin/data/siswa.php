<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="flash_success" data-flash_success="<?php echo $this->session->flashdata('success'); ?>"></div>
    <div class="flash_error" data-flash_error="<?php echo $this->session->flashdata('error'); ?>"></div>
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Tambah Data Siswa</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="<?= site_url('admin/import_siswa'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="uploadfile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="uploadfile" name="uploadfile" accept=".xlsx, .xls">
                  <label class="custom-file-label" for="uploadfile">Choose file</label>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-info" id="uploadbutton" disabled>Import From Excel</button>
          </form>
          <!-- /.row -->
        </div>
        <div class="card-footer">
          <?php
            $filename = 'Siswa.xlsx';
            $download_url = site_url('admin/downloadFile/' . $filename);
          ?>
          Download template file excel <a href="<?= $download_url ?>">Disini</a>.
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Siswa</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        
        <!--
          <button type="submit" class="btn btn-info" style="margin-right: 20px; margin-left: 20px; margin-top: 20px;">Add</button>
        -->
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <div>
          <table id="tabel" class="table table-bordered table-striped custom-table">
            <thead>
              <tr>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($siswa as $row) { ?>
              <tr>
                  <td style="width: 30px;"><?php echo $row->nis; ?></td>
                  <td style="width: 30px;"><?php echo $row->nisn; ?></td>
                  <td style="width: 650px;"><?php echo $row->nama_siswa; ?></td>
                  <td style="width: 30px;"><?php echo $row->jk; ?></td>
                  <td style="width: 70px;"><?php echo $row->nama_kelas; ?></td>
                  <td>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $row->nis; ?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo site_url('admin/delete_siswa/' . $row->nis); ?>" class="btn btn-danger btn-sm btn-del">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog modal-edit">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo site_url() ?>admin/add_siswa" method="post">
            <div class="modal-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->