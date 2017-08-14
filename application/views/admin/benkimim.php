
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
                        <a href="<?= base_url() ?>admin/Benkimim/">Ben Kİmim</a>
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
                Ben Kimim Sayfası Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/Benkimim/guncellekaydet/<?=$data[0]->id?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="ad" type="text" required="" value="<?=$data[0]->ad?>" class="form-control" placeholder="İsim Soyisim">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-header"></i></span>
                        <input name="baslik" type="text" required="" value="<?=$data[0]->baslik?>" class="form-control" placeholder="Başlik giriniz">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        <input name="mail" type="text" required="" value="<?=$data[0]->mail?>" class="form-control" placeholder="E-mail Giriniz">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input name="keywords" type="text" required="" value="<?=$data[0]->keywords?>" class="form-control" placeholder="keywords">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                        <input name="description" type="text" required="" value="<?=$data[0]->description?>" class="form-control" placeholder="description">
                    </div>
                    <div class="form-group input-group">
                        <textarea name="icerik"  required=""><?=$data[0]->icerik?></textarea>
                        <script>
                          CKEDITOR.replace( 'icerik' );
                      </script>
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