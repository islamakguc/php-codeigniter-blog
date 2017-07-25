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
            <a href="<?= base_url() ?>uye/Mesaj">Mesajlar</a>
          </li>
          <li>
            <a href="<?= base_url() ?>uye/Mesaj/mesajgonder">Mesaj Gönder</a>
          </li>
        </ul>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          Yeni Mesaj Gönder
        </div>
        <div class="panel-body">
          <form role="form" action="<?= base_url() ?>uye/Mesaj/mesajkaydet" method="post">
            <div class="form-group">
              <label>Alıcı Seçiniz :</label>
              <select name="alici" class="form-control">
                <?php
                foreach ($veri as $rs) 
                {
                  if($rs->ad != $this->session->oturum_data['ad'])
                  {
                   ?>
                   <option value="<?=$rs->ad?>"><?=$rs->ad?> - <?=$rs->yetki?> </option>

                   <?php 
                 }
               } 
               ?>
             </select>
           </div>
           <div class="form-group">
            <input type="text" class="form-control" name="baslik" placeholder="Başlık">
          </div>
          <div class="form-group">
           <textarea class="form-control" rows="5" name="mesaj" placeholder="Mesajınız" ></textarea>
         </div>
         <div class="form-group">
          <button type="submit" class="btn btn-default">Gönder</button>
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