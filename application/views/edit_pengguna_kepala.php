
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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
                </div>
                <div class="card-body">
                  <?php foreach ($pengguna as $u) { ?> 
                    <form action="<?php echo base_url ('api/update_pengguna_kepala') ?>" method="post">
                            <div class="form-group"><label for="nip_pengguna" class=" form-control-label">NIP Pengguna</label>
                             <input type="text" name="nip_pengguna" maxlength="18" required style="width: 22%" value="<?php echo $u->nip_pengguna?>" class="form-control">
                            </div>
                        <div class="form-group"><label for="pengguna" class=" form-control-label">Nama Pengguna</label>
                          <input type="text" name="nama_pengguna" required style="width: 40%" value="<?php echo $u->nama_pengguna?>" class="form-control">
                            </div>
                          <div class="form-group"><label for="perusahaan" class=" form-control-label">Perusahaan</label>
                          <input type="text" name="perusahaan" required style="width: 40%" value="<?php echo $u->perusahaan?>" class="form-control">
                            </div>

                        <div class="form-group">
                          <label for="no_ktp">Nomor KTP </label>   
                          <select class="form-control" required style="width: 22%" name="no_ktp">
                          <?php foreach ($noktp as $k) {?>
                          <option value="<?php echo $k->no_ktp; ?>"><?php echo $k->no_ktp; ?></option>
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
                      
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                      <?php } ?> 

                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->