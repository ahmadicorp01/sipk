
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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah KTP Pengguna</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url ('api/tambah_ktp_admin') ?>" method="post">
                        <div class="form-group"><label for="Nomor KTP" class=" form-control-label">Nomor KTP</label>
                          <input type="text" name="no_ktp" maxlength="18" required style="width: 22%"  class="form-control">
                        </div>
                        <div class="form-group"><label for="Nama" class=" form-control-label">Nama Lengkap</label>
                          <input type="text" name="nama" required style="width: 30%" class="form-control">
                        </div>
                        <div class="form-group"><label for="Tempat Lahir" class=" form-control-label">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" required style="width: 30%" class="form-control">
                        </div>
                        <div class="form-group"><label for="Tanggal Lahir" class=" form-control-label">Tanggal Lahir</label>
                          <input type="date" name="tanggal_lahir" required style="width: 18%"  class="form-control">
                        </div>
                        <div class="form-group">
                         <label for="Jenis Kelamin">Jenis Kelamin </label>
                          <select class="form-control" required style="width: 18%" name="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                       </div>
                        <div class="form-group"><label for="Alamat" class=" form-control-label">Alamat</label>
                          <input type="text" name="alamat" required style="width: 40%; height: 40%" class="form-control">
                        </div>
                        <div class="form-group"><label for="RT/RW" class=" form-control-label">RT/RW</label>
                          <input type="text" name="rt_rw" maxlength="7" required style="width: 18%" class="form-control">
                        </div>
                        <div class="form-group"><label for="Kelurahan" class=" form-control-label">Kelurahan</label>
                          <input type="text" name="kelurahan" required style="width: 18%" class="form-control">
                        </div>
                        <div class="form-group"><label for="Kecamatan" class=" form-control-label">Kecamatan</label>
                          <input type="text" name="kecamatan" required style="width: 18%" class="form-control">
                        </div>
                        <div class="form-group"><label for="Agama" class=" form-control-label">Agama</label>
                          <input type="text" name="agama" required style="width: 18%" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->