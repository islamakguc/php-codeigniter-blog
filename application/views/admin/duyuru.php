
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
                        <a href="<?= base_url() ?>admin/Duyuru/">Duyuru</a>
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
                Duyuru Güncelle
            </div>
            <div class="panel-body">
                <form role="form" action="<?= base_url() ?>admin/duyuru/guncellekaydet/<?=$veri[0]->id?>" method="post">
                    
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-header"></i></span>
                        <input name="baslik" type="text" required="" value="<?=$veri[0]->baslik?>" class="form-control" placeholder="Başlık">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                        <input name="duyuru" type="text" required="" value="<?=$veri[0]->duyuru?>" class="form-control" placeholder="duyuru">
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