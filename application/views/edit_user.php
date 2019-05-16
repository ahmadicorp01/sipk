
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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah User Pengguna</h6>
                </div>
                <div class="card-body">
                  <?php foreach ($user as $u) { ?> 
                    <form action="<?php echo base_url ('api/update_user_admin') ?>" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $u->id_user?>">

                        <div class="form-group">
                          <label for="nip_pengguna">Nama Pengguna</label>   
                          <select class="form-control" required style="width: 22%" name="nip_pengguna">
                          <?php foreach ($pengguna as $k) {?>
                          <option value="<?php echo $k->nip_pengguna; ?>"><?php echo $k->nama_pengguna; ?></option>
                          <?php } ?>
                          </select>
                        </div>

                        <div class="form-group"><label for="Username" class=" form-control-label">Username</label>
                          <input type="text" name="username" required style="width: 30%" value="<?php echo $u->username?>" class="form-control">
                        </div>
                        <div class="form-group"><label for="Password" class=" form-control-label">Password</label>
                          <input type="text" name="password" required style="width: 30%" value="<?php echo $u->password?>" class="form-control">
                        </div>
                        <div class="form-group">
                         <label for="Jabatan">Jabatan</label>
                          <select class="form-control" required style="width: 18%" name="akses">
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