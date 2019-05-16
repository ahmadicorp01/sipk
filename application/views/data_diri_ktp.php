     
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Diri KTP Pengguna</h6>
                </div>
                <center><div class="card-body">

                          <table style="width: 55%" class="table table-bordered">
                        <?php $i = 1; foreach($penggunaktp as $u){  ?>
                      <thead>
                        <tr>
                          <th>Nomor KTP</th>
                          <td><?php echo $u->no_ktp ?></td>
                        </tr>
                          <th>Nama Lengkap</th>
                          <td><?php echo $u->nama ?></td>
                        </tr>
                        </tr>
                          <th>Tempat Lahir</th>
                          <td><?php echo $u->tempat_lahir ?></td>
                        </tr>
                        </tr>
                          <th>Tanggal Lahir</th>
                          <td><?php echo $u->tanggal_lahir ?></td>
                        </tr>
                        </tr>
                          <th>Jenis Kelamin</th>
                          <td><?php echo $u->jenis_kelamin ?></td>
                        </tr>
                        </tr>
                          <th>Alamat</th>
                          <td><?php echo $u->alamat ?></td>
                        </tr>
                        </tr>
                          <th>RT/RW</th>
                          <td><?php echo $u->rt_rw ?></td>
                        </tr>
                        </tr>
                          <th>Kelurahan</th>
                          <td><?php echo $u->kelurahan ?></td>
                        </tr>
                        </tr>
                          <th>Kecamatan</th>
                          <td><?php echo $u->kecamatan ?></td>
                        </tr>
                        </tr>
                          <th>Agama</th>
                          <td><?php echo $u->agama ?></td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </center>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->