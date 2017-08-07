<?php 
$query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('uye/_header',$data1);
$this->load->view('uye/_sidebar');
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
            <a href="<?= base_url() ?>uye/Home"><i class="glyphicon glyphicon-home"></i></a>
          </li>
          <li>
            <a href="<?= base_url() ?>uye/Yazilar">Yazılar</a>
          </li>
          <li>
            <a href="<?= base_url() ?>uye/Yazilar/ekle">Yazı Ekle</a>
          </li>
        </ul>
      </div>
      <?php 
      if($this->session->flashdata("sonuc"))
      {
       ?>
       <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>İşlem:</strong> <?=$this->session->flashdata("sonuc"); ?>
      </div>
      <?php
    } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        Yeni Yazı Ekle
      </div>
      <div class="panel-body">
        <?php echo form_open_multipart(base_url().'uye/Yazilar/eklekaydet');?>
        <div class="form-group">
          <input type="text" class="form-control" name="Title" placeholder="Başlık">
        </div>
        <div class="form-group">
          <select name="yetki" class="form-control">
            <?php
            foreach ($veri as $rs) 
            {
             ?>
             <option value="<?=$rs->id?>"><?=$rs->kategoriadi?></option>

             <?php 
           } 
           ?>
         </select>
       </div>
       <div class="form-group">
        <textarea name="Content"></textarea>
        <script>
          CKEDITOR.replace( 'Content' );
        </script>
      </div>
      <label class="form-group">Resim Ekle</label>
          <div class="form-group input-group">
            <input type="file" name="userfile" />                        
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
$this->load->view('uye/_footer');
?>