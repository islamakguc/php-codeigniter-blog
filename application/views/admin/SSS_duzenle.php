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
                    <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular/">S.S.S</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Sikca_Sorulan_Sorular/edit/<?=$veri[0]->id?>">S.S.S Güncelle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                S.S.S Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Sikca_Sorulan_Sorular/guncellekaydet/<?=$veri[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-question"></i></span>
                        <input name="baslik" type="text" value="<?php echo $veri[0]->baslik;?>" class="form-control" placeholder="Soru">
                    </div>
                    <div class="form-group">
                        <textarea name="icerik"><?php echo $veri[0]->icerik;?></textarea>
                        <script>
                            CKEDITOR.replace( 'icerik' );
                        </script>
                    </div>
                    <div class="form-group input-group">
                        <button type="submit" class="btn btn-default">Güncelle</button>
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