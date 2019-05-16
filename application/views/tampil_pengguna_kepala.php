          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

               <a href="<?php echo base_url('kepalaphh/tambah_pengguna/')?>" style="float:right;" class="btn btn-primary">Tambah Pengguna</a>
               <br/><br/>
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pengguna SIPK</h6>
                </div>
                <div class="card-body">

                          <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>NIP</th>
                          <th>Nama Pengguna</th>
                          <th>Perusahaan</th>
                          <th>Jabatan</th>
                          <th>No KTP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach($pengguna as $u){ 
                            if ($u->jabatan == 1)
                            $jabatanp = "<span class='label label-primary'>Kepala Seksi PHH</span>";
                            else if ($u->jabatan == 2)
                            $jabatanp = "<span class='label label-success'>Admin</span>";
                            else if ($u->jabatan == 3)
                            $jabatanp = "<span class='label label-danger'>Operator</span>";
                            else
                            $jabatanp = "NULL";
                          ?>
                        <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo $u->nip_pengguna; ?></td>
                          <td><?php echo $u->nama_pengguna;?></td>
                          <td><?php echo $u->perusahaan; ?></td>
                          <td><?php echo $jabatanp; ?></td>
                          <td><?php echo $u->no_ktp; ?></td>
                          <td><a href="<?php echo base_url('kepalaphh/edit_pengguna/') . $u->nip_pengguna; ?>" class="btn btn-primary btn-sm">
                        <span class="fa fa-edit"></span></a>
                        <a href="<?php echo base_url('api/delete_pengguna_kepalaphh/') . $u->nip_pengguna; ?>" class="btn btn-danger btn-sm"
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