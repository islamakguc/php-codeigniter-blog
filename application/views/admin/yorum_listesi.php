       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <br>
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= base_url() ?>admin/Home">Anasayfa</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/Yorum">Yorumlar</a>
                        </li>
                    </ul>
                </div>
                <?php 
                if($this->session->flashdata("sonuc"))
                {
                 ?>
                 <div class="alert alert-success">
                    <strong>İşlem:</strong> <?=$this->session->flashdata("sonuc"); ?>
                </div>
                <?php
            } ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tüm Yorumlar
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php foreach($veri as $row){ ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div style="float:right; display:inline">
                                <span style="text-align: right; float: right;">
                                    <?php
                                    if($row->durum == 1)
                                    {
                                        ?>
                                        <div class="btn btn-success">Aktif</div></span><br><br>
                                        <?php
                                    }
                                    else
                                        {?>

                                    <div class="btn btn-default">Pasif</div></span><br><br>
                                    <?php }?>
                                    <div class="dropdown">
                                        <button class="btn btn-default btn-xs  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            İşlemler
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <?php
                                            if($row->durum == 1)
                                            {
                                                ?>
                                                <li><a href="<?php echo base_url() ?>admin/Yorum/onaykaldir/<?php echo $row->id;?>">Onayı Kaldır</a></li>
                                                <?php
                                            }
                                            else
                                                {?>
                                            <li><a href="<?php echo base_url() ?>admin/Yorum/onayla/<?php echo $row->id;?>">Onayla</a></li>
                                            <?php }?>
                                            <li><a href="<?php echo base_url() ?>admin/Yorum/delete/<?php echo $row->id;?>">Sil</a></li>
                                        </ul>
                                    </div>
                                </div><h4><?php echo $row->yazar_ad;  ?></h4>
                                <p><?php echo $row->ktarih;  ?> / <?php echo $row->yazi_id;  ?> / <?php echo $row->yazar_mail;  ?>       </p><br>
                                <p><?php echo $row->yorum;  ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
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