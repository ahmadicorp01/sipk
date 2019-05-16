     
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
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                </div>
                <div class="card-body">

                          <table style="width: 55%" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Nomor</th>
                          <th>Nama Kategori</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach($hasil as $u){  ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $u->nama_kategori ?></td>
                       <td><a href="<?php echo base_url('kepalaphh/edit_kategori/') . $u->kode_kategori; ?>" class="btn btn-primary btn-sm">
                        <span class="fa fa-edit"></span></a>
                        <a href="<?php echo base_url('api/delete_kategori_kepalaphh/') . $u->kode_kategori; ?>" class="btn btn-danger btn-sm"
                          onclick="return confirmDelete();">
                        <span class="fa fa-trash"></span></a>  </td>
                        </tr>
                        <?php $i++; } ?>
                        
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      