<?php 
$query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('admin/_header',$data1);
$this->load->view('admin/_sidebar');
?>
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
       <br>
       <div>
        <ul class="breadcrumb">
          <li>
            <a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i></a>
          </li>
          <li>
            <a href="<?= base_url() ?>admin/Sayfalar">Sayfalar</a>
          </li>
          <li>
            <a href="<?= base_url() ?>admin/Sayfalar/ekle">Sayfa Ekle</a>
          </li>
        </ul>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          Yeni Sayfa Ekle
        </div>
        <div class="panel-body">
          <form role="form" action="<?= base_url() ?>admin/Sayfalar/eklekaydet" method="post">

            <div class="form-group">
              <input type="text" class="form-control" name="baslik" placeholder="Başlık">
            </div>
            <div class="form-group">
              <textarea name="icerik"></textarea>
              <script>
                CKEDITOR.replace( 'icerik' );
              </script>
            </div>
            <div class="radio">
            <label><input type="radio" name="durum" value="1" checked="checked">Aktif</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="durum" value="0">pasif</label>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default">Kaydet</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php 
$this->load->view('admin/_footer');
?>