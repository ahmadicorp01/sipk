
          <!-- Page Heading -->
          

          <!-- Content Row -->
          
          <!-- Content Row -->

          

            <!-- Area Chart -->
            

          <!-- Content Row -->
          <!-- Modal -->
          <div id="lampiran_modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <img src="<?= base_url('uploads/chat/' . $laporan->laporan_file); ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="row">
                    <div class="d-inline col-md-11">
                      <h6 class="m-0 font-weight-bold text-primary" ><?= $laporan->nama_pengguna; ?></h6>
                      <span class="time_date"><?= date("H:i | M:d:y", strtotime($laporan->waktu)); ?></span>
                    </div>
                    <div class="d-inline col-md-1" style="float: right;">
                      <a href="<?php echo base_url('api/tutup_laporan/' . $laporan->id_laporan) ?>" class="btn btn-danger btn-sm <?= ($laporan->laporan_status == 3) ? "disabled" : ""?>">Selesai</a>
                    </div>
                  </div>
                  <hr>
                  <p><?= $laporan->keluhan; ?></p>
                  <?php if ($laporan->laporan_file) { ?>
                    <a class="text-primary" data-toggle="modal" data-target="#lampiran_modal" style="cursor: pointer;">Lampiran</a>
                  <?php } ?>
                </div>
                <div class="card-body">
                <div class="mesgs">
          <div class="msg_history">
            <?php foreach ($tanggapan as $u) {
              if ($u->nip_pengguna == $this->session->userdata('nip_pengguna'))
              {
                // Nerima pesan kiri
                $a = "outgoing_msg";
                // Ngirim Pesan sebelah kanan
                $b = "sent_msg";
                // Tidak Tampilkan nama pegawai jika dia pengirim
                $c = "";
                // Ubah dibaca dari 1 ke 2 bagi pengirim
                if ($u->dibaca == 2) $d = "Dibaca";
                else $d = "";


              }
              else
              {
                // Nerima Pesan kiri
                $a = "received_msg";
                //Mengirim pesan sebelah kanan
                $b = "received_withd_msg";
                // Tampilkan nama pengguna pengirim
                $c = $u->nama_pengguna;
                // Tidak tampilkan dibaca bagi penerima
                $d = "";
              }

              echo '<div class="' . $a . '">
                      <div class="' . $b . '">
                        <span class="time_date">'. $c .' </span>';
              //Kalo ada gambar dan tulisan jalanin ini
              if ($u->tanggapan) echo '<p>'.$u->tanggapan.'</p>';
              //Kalo ada hambar jalanin BR yaitu spasi 1 baris
              if ($u->tanggapan && $u->gambar) echo '<br>';
              //Kalo gaada tulisan tapi ada gambar
              if ($u->gambar) echo '<img src="' . base_url("uploads/chat/" . $u->gambar) .'" alt="Gambar" />';

              echo '<span class="time_date d-inline"> '.date("H:i | M:d", strtotime($u->waktu)).'</span>
                        <span class="time_date d-inline" style="float: right;">' . $d . '</span>
                      </div>
                    </div>';
            }
            ?>
          </div>

          <?php if ($laporan->laporan_status == 3) { ?>
          <p class="text-center kasus-ditutup">Kasus ditutup</p>
          <?php } else { ?>
          <div class="type_msg">
            <div class="input_msg_write">
              <form action="<?php echo base_url ('api/tambah_tanggapan');?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-10">
                    <input type="text" hidden name="id_laporan" value="<?= $this->uri->segment(3) ;?>">
                    <input type="text" hidden name="nip_pengguna" value="<?= $this->session->userdata('nip_pengguna');?>">
                    <input type="text" hidden name="dibaca" value="1">

                    <input type="text" class="write_msg" placeholder="Tulis Pesan" name="tanggapan" />
                  </div>
                  <div class="col-md-2">
                    <div class="text-right">
                      <label for="gambar" class="d-inline msg_send_btn" style="padding: 5px 8px;"><i class="fa fa-camera" aria-hidden="true">
                      </i></label>
                      <input id="gambar" name="gambar" type="file" style="display: none;" />
                      <button class="d-inline msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <?php } ?>
        </div>     
                  </div>
                </div>
              </div>
            </div>

        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->