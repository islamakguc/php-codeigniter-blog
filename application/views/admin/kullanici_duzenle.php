<?php $query1=$this->db->get("ayarlar");
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
                    <a href="<?= base_url() ?>admin/Kullanicilar/">Kullanıcılar</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>admin/Kullanicilar/edit/<?=$veri[0]->id?>">Kullanıcı Düzenle</a>
                </li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Kullanıcı Düzenle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Kullanicilar/guncellekaydet/<?=$veri[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="ad" type="text" value="<?=$veri[0]->ad?>" class="form-control" placeholder="Ad Soyad">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="sifre" type="password" value="<?=$veri[0]->sifre?>" class="form-control" placeholder="Şifre">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">@</span>
                        <input name="mail" type="email" value="<?=$veri[0]->mail?>" class="form-control" placeholder="E-Mail">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <select name="yetki" class="form-control">
                            <option><?=$veri[0]->yetki?></option>
                            <?php foreach($kategori as $rows){ ?>
                            <option><?php echo $rows->kategoriadi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                     <?php
                    if($veri[0]->durum == 1)
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