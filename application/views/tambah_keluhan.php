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
                  <h6 class="m-0 font-weight-bold text-primary">Laporkan Keluhan</h6>
                </div>
                <div class="card-body">

                  <form action="<?php echo base_url ('api/tambah_laporan') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group"><label for="pengguna" class=" form-control-label">Nama</label>
                          <input type="text" style="width: 40%" value="<?=$nama; ?>" readonly  class="form-control">
                            </div>
                            
                             <div class="form-group"><label for="judul" class=" form-control-label">Judul</label>
                          <input type="text" style="width: 40%" required name="judul_keluhan" class="form-control">
                            </div>
                            

                        <div class="form-group">
                          <label for="Nama Kategori">Nama Kategori</label>
                          <select class="form-control" style="width: 25%" required name="kode_kategori">
                            <?php foreach ($hasil as $u) {  
                              ?>
                            <option value="<?php echo $u->kode_kategori; ?>"><?php echo $u->nama_kategori; ?></option>
                            <?php } ?>
                          </select>
                          </div>

                          <div class="form-group">
                          <label for="Nama Kategori">Keluhan</label>
                          <textarea style="width: 40%" required name="keluhan" class="form-control"></textarea>
                          </div>

                          <input type="file" name="laporan_file">

                          <div class="form-group"><label for="status" class=" form-control-label"></label>
                          <input type="hidden" name="laporan_status" value="1" class="form-control"></div>

                          <div class="form-group"><label for="id_laporan" class=" form-control-label"></label>
                          <input type="hidden" name="id_laporan" class="form-control"></div>

                          <div class="form-group"><label for="id_laporan" class=" form-control-label"></label>
                          </div>
                          <input type="hidden" name="nip_pengguna" class="form-control" value="<?= $this->session->userdata('nip_pengguna'); ?>">

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