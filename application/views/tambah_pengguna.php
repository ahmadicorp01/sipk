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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h6>
                </div>
                <div class="card-body">

                  <form action="<?php echo base_url ('api/tambah_pengguna') ?>" method="post">
                      <div class="form-group"><label for="nama_pengguna" class=" form-control-label">NIP Pengguna</label>
                          <input type="text" style="width: 25%" maxlength="18" name="nip_pengguna" required class="form-control">
                            </div>

                        <div class="form-group"><label for="nama_pengguna" class=" form-control-label">Nama Pengguna</label>
                          <input type="text" style="width: 40%" name="nama_pengguna" required class="form-control">
                            </div>
                            
                             <div class="form-group"><label for="perusahaan" class=" form-control-label">Perusahaan</label>
                              <input type="text" style="width: 40%" required name="perusahaan" class="form-control">
                            </div>
                            
                        <div class="form-group">
                          <label for="Nama Kategori">Nomor KTP</label>
                          <select class="form-control" style="width: 22%" required name="no_ktp">
                            <?php foreach ($noktp as $u) {  
                              ?>
                            <option value="<?php echo $u->no_ktp; ?>"><?php echo $u->no_ktp; ?></option>
                            <?php } ?>
                          </select>
                          </div>
                      <div class="form-group">
                        <label for="Jabatan">Jabatan : </label>
                        <select class="form-control" required style="width: 18%" name="jabatan">
                          <option value="1">Kepala Seksi PHH</option>
                          <option value="2">Admin</option>
                          <option value="3">Operator</option>
                        </select>
                      </div>
                          
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