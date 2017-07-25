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
            <a href="<?= base_url() ?>admin/Sosyal">Sosyal Medya</a>
          </li>
          <li>
            <a href="<?= base_url() ?>admin/Sosyal/ekle">Sosyal Medya Ekle</a>
          </li>
        </ul>
      </div>
      <?php 
      if ($this->session->flashdata("sonuc"))
        { ?>
      <div class="content-panel">

        <div class = "alert alert-success">
          <button type = "button" class = "close" data-dismiss="alert">x</button>
          <strong> İşlem: </strong> <?=$this->session->flashdata("sonuc")?>
        </div>

      </div>
      <?php }?>
      <div class="panel panel-default">
        <div class="panel-heading">
          Sosyal Medya Ekle
        </div>
        <div class="panel-body">
          <?php echo form_open_multipart(base_url().'admin/Sosyal/sosyal_ekle');?>
          <div class="form-group">
            <input type="text" class="form-control" name="baslik" placeholder="Adını Giriniz" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="link" placeholder="Link Giriniz" required="">
          </div>
          <div class="form-group">
          <input type="text" class="form-control" name="class" placeholder="Class Giriniz" required="">
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