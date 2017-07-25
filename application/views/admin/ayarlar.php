
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
                        <a href="<?= base_url() ?>admin/Ayarlar/">Ayarlar</a>
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
                Ayarlar Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Ayarlar/guncellekaydet/<?=$veri[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="adsoyad" type="text" required="" value="<?=$veri[0]->adsoyad?>" class="form-control" placeholder="adsoyad">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-header"></i></span>
                        <input name="baslik" type="text" required="" value="<?=$veri[0]->baslik?>" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input name="email" type="text" required="" value="<?=$veri[0]->email?>" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="keywords" type="text" required="" value="<?=$veri[0]->keywords?>" class="form-control" placeholder="keywords">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                        <input name="icerik" type="text" required="" value="<?=$veri[0]->icerik?>" class="form-control" placeholder="description">
                    </div>
                    <?php
                    if($veri[0]->yorum == 1)
                    {
                        $yorum = "checked";
                        $Noyorum = "";
                    }else{
                        $yorum = "";
                        $Noyorum = "checked";

                    }
                    ?>
                    <hr>
                    <div class="form-group input-group">
                        <span><b>Yorum</span>
                        <div class="radio">
                            <label><input type="radio" required="" name="yorum" value="1" <?php echo $yorum ?>>Aktif</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="" name="yorum" value="0" <?php echo $Noyorum ?>>Pasif</label>
                        </div>
                    </div>
                    <hr>
                    <?php
                    if($veri[0]->mail == 1)
                    {
                        $mail = "checked";
                        $Nomail = "";
                    }else{
                        $mail = "";
                        $Nomail = "checked";

                    }
                    ?>
                    <div class="form-group input-group">
                        <span><b>E-posta İletişimi</span>
                        <div class="radio">
                            <label><input type="radio" required="" name="mail" value="1" <?php echo $mail ?>>Aktif</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="" name="mail" value="0" <?php echo $Nomail ?>>Pasif</label>
                        </div>
                    </div>
                    <hr>
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