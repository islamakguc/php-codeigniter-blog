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
                    <a href="<?= base_url() ?>uye/Yazilar/resim_ekle">Resim Ekle</a>
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
            Resim Ekle
            </div>
            <div class="panel-body">
               <?php echo form_open_multipart(base_url().'uye/Yazilar/resim_upload/'.$resim[0]->id);?>
                    <div class="form-group input-group">
                        <input type="file" name="userfile" />                        
                    </div><br>
                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-default">Resim Ekle</button>
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