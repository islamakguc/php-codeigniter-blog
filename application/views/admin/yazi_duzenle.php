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
                    <a href="<?= base_url() ?>admin/Yazilar/">Yazılar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Yazilar/edit/<?php echo $data[0]->link; ?>">Yazı Düzenle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Yazı Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Yazilar/guncellekaydet/<?php echo $data[0]->id; ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Title" placeholder="Başlık" required="" value="<?php echo $data[0]->baslik;?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="yetki" required="">
                            <option value="<?=$veri[0]->kategori_id ?>" ><?=$veri[0]->katadi ?></option>
                            <?php foreach($categories as $row){ ?>
                            <option value="<?php echo $row->id;  ?>" ><?php echo $row->kategoriadi;  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="keywords" placeholder="keywords" required="" value="<?php echo $data[0]->keywords;?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Açıklama" required="" value="<?php echo $data[0]->description;?>">
                    </div>
                    <div class="form-group">
                        <textarea name="Content" required="required"><?php echo $data[0]->metin; ?> </textarea>
                        <script>
                            CKEDITOR.replace( 'Content' );
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
                        <label><input type="radio" required="" name="IsDraft" value="1" <?php echo $Draft ?>>Yayınla</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" required="" name="IsDraft" value="0" <?php echo $NoDraft ?>>Taslak Olarak Kaydet</label>
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