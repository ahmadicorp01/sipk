      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Irfan Amadi 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin keluar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('login/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url ('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url ('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url ('assets/js/sb-admin-2.min.js');?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url ('assets/vendor/chart.js/Chart.min.js');?>"></script>

  
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url ('assets/js/demo/chart-area-demo.js');?>"></script>
  <script src="<?php echo base_url ('assets/js/demo/chart-pie-demo.js');?>"></script>
  <script src="<?php echo base_url ('assets/js/irfan.js');?>"></script>

     <script>
   $(function(){
    $("#tampil").click(function(){
       var vtanggal = $("#vtanggal").val();
       $.ajax({
          url:"<?php echo site_url('kepalaphh/cetak_laporan');?>",
          type:"POST",
          data:"vtanggal="+vtanggal,
          cache:false,
          success:function(html){
          $("#cetak_laporan").html(html);
          }
       })
        })
     
   })
</script>

<script type="text/javascript">
  function confirmDelete(){
        return confirm('Apakah anda ingin menghapus data ini?');
    }
</script>

<script type="text/javascript">
  function tambahBerhasil(){
        alert('Berhasil Nambah Data');
    }
</script>

<script src="https://unpkg.com/notie"></script>

<?php 
if(isset($notif)){
?>
<script type="text/javascript">
      notie.alert({ type: 1, text: 'Berhasil Menghapus!', time: 2 }) // Never hides unless clicked, or escape or enter is pressed
  </script>

  <?php }?>

  <?php 

if(isset($notiftmbh)){
?>
<script type="text/javascript">
      notie.alert({ type: 1, text: 'Berhasil Menambah!', time: 2 }) // Never hides unless clicked, or escape or enter is pressed
  </script>

  <?php }?>

<?php 
if(isset($laporan)){
?>

<script type="text/javascript">
  $(document).ready(function(){
    sekarang = new Date();
    id_laporan = <?php echo $laporan->id_laporan; ?>;
      setInterval(function(){
        $.ajax({
          url:"<?php echo site_url('api/ambilchat');?>",
          type:"POST",
          data:{
            waktu : sekarang.getFullYear().toString()+"-"+(sekarang.getMonth()+1).toString().padStart(2, '0')+"-"+sekarang.getDate().toString().padStart(2, '0')+" "+sekarang.getHours().toString().padStart(2, '0')+":"+sekarang.getMinutes().toString().padStart(2, '0')+":"+sekarang.getSeconds().toString().padStart(2, '0'),
            id_laporan : id_laporan
          },
          cache:false,
          success:function(data){
            chats = JSON.parse(data);
            for (var i = 0; i < chats.length; i++) {
              isi = "<div class=\"received_msg\">\
                      <div class=\"received_withd_msg\">"
                      +(chats[i].gambar ? "<img src=\"http://localhost/sipk/uploads/chat/"+chats[i].gambar+"\" alt=\"Gambar\">" : "")+
                        "<span class=\"time_date\">"+chats[i].pengirim+" </span><p>"+chats[i].chat+"</p><span class=\"time_date d-inline\">"+chats[i].waktu+"</span>\
                        <span class=\"time_date d-inline\" style=\"float: right;\"></span>\
                      </div>\
                    </div>";
              $(".msg_history").append(isi);
            }
            sekarang = new Date();
          }
        });
      }, 5000);
  });
</script>
<?php }?>

</body>

</html>