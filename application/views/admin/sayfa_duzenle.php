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
                    <a href="<?= base_url() ?>admin/Sayfalar/">Sayfalar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Sayfalar/edit/<?php echo $data[0]->id; ?>">Sayfa Düzenle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Sayfa Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Sayfalar/guncellekaydet/<?php echo $data[0]->id; ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="baslik" placeholder="Başlık" value="<?php echo $data[0]->baslik;?>">
                    </div>
                    <div class="form-group">
                    <textarea name="icerik"><?php echo $data[0]->icerik; ?> </textarea>
                        <script>
                            CKEDITOR.replace( 'icerik' );
                        </script>
                    </div>
                    <?php
                    if($data[0]->durum == 1)
                    {
                        $Draft = "checked";
                        $NoDraft = "";
                    }else{
                        $Draft = "";
                        $NoDraft = "checked";

                    }
                    ?>
                    <div class="radio">
                        <label><input type="radio" name="durum" value="1" <?php echo $Draft ?>>Aktif</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="durum" value="0" <?php echo $NoDraft ?>>pasif</label>
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