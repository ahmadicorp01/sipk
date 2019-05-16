
          <!-- Page Heading -->
          

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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                </div>
                <div class="card-body">

                  <form action="<?php echo base_url ('api/tambah_kategori') ?>" method="post">

                        <div class="form-group"><label for="pengguna" class=" form-control-label">Nama Kategori</label>
                          <input type="text" name="nama_kategori" required style="width: 40%" class="form-control">
                            </div>

                          <div class="form-group"><label for="kode_kategori" class=" form-control-label"></label>
                          <input type="hidden" name="kode_kategori" class="form-control"></div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        
                      </form>
                      
                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->