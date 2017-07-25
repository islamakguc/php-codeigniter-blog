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
            <a href="<?= base_url() ?>admin/Sosyal/">Sosyal Medya</a>
          </li>
          <li>
            <a href="<?= base_url() ?>admin/Sosyal/guncelle/<?=$data[0]->id?>">Sosyal Medya Güncelle</a>
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
          <form role="form" action="<?= base_url() ?>admin/Sosyal/guncelle_kaydet/<?=$data[0]->id?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" required="" name="baslik" value="<?=$data[0]->ad?>" >
          </div>
          <div class="form-group">
            <input type="text" class="form-control" required="" name="link" value="<?=$data[0]->link?>">
          </div>
          <div class="form-group">
          <input type="text" class="form-control" required="" name="class" value="<?=$data[0]->resim?>">
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