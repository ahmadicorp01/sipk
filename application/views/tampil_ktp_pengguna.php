          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

               <a href="<?php echo base_url('admin/tambah_pengguna_ktp/')?>" style="float:right;" class="btn btn-primary">Tambah KTP Pengguna</a>
               <br/><br/>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">KTP Pengguna SIPK</h6>
                </div>
                <div class="card-body">

                          <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>Nomor KTP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach($penggunaktp as $u){ 
                          ?>
                        <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo $u->no_ktp;?></td>
                          <td><a href="<?php echo base_url('admin/data_diri_ktp/') . $u->no_ktp; ?>" class="btn btn-info btn-sm">
                        <span class="fa fa-search"></span></a>
                        <a href="<?php echo base_url('admin/edit_pengguna_ktp/') . $u->no_ktp; ?>" class="btn btn-primary btn-sm">
                        <span class="fa fa-edit"></span></a>
                        <a href="<?php echo base_url('api/delete_ktp_admin/') . $u->no_ktp; ?>" class="btn btn-danger btn-sm"
                          onclick="return confirmDelete();">
                              <span class="fa fa-trash"></span></a>  </td>
                            </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->