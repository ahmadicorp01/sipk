     
          <!-- Content Row -->
          
          <!-- Content Row -->

          

            <!-- Area Chart -->
            

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">

                          <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Tanggal dan Waktu</th>
                          <th>Status</th>
                          <th>Cek Laporan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($hasil as $u){ 
                            if ($u->laporan_status == 1)
                            $status = "<span class='label label-primary'>Pending</span>";
                            else if ($u->laporan_status == 2)
                            $status = "<span class='label label-success'>Proses</span>";
                            else if ($u->laporan_status == 3)
                            $status = "<span class='label label-danger'>Selesai</span>";
                            else
                            $status = "NULL";
                          ?>
                        <tr>
                          <td><?php echo $u->nama_pengguna; ?></td>
                          <td><?php echo $u->judul_keluhan;?></td>
                          <td><?php echo $u->nama_kategori; ?></td>
                          <td><?php echo date("d-M-y | H:i ", strtotime($u->waktu)); ?></td>
                          <th><?php echo $status; ?></th>
                          <?php if ($u->nip_pengguna == $this->session->userdata('nip_pengguna')) { ?>

                            <td><a href="<?php echo base_url('admin/tanggapi_keluhan/'). $u->id_laporan;?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print">Lihat</span></a></td>

                          <?php } else { ?>

                            <td><a href="<?php echo base_url('admin/tanggapi_keluhan/'). $u->id_laporan;?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"><?php echo ($u->laporan_status == 3 ) ? "Lihat" : "Tanggapi Keluhan"?></span></a></td>
                          <?php } ?>
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