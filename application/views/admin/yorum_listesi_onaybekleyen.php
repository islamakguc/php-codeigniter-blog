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
                        <a href="<?= base_url() ?>admin/Yorum">Yorumlar</a>
                        </li>
                        <li>
                        <a href="<?= base_url() ?>admin/Yorum/onaybekleyen">Onay Bekleyen Yorumlar</a>
                        </li>
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
                Onay Bekleyen Yorumlar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php foreach($data as $row){ ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="float:right; display:inline">
                            <span style="text-align: right; float: right;">
                                <?php
                                if($row->durum == 1)
                                {
                                    ?>
                                    <fieldset disabled="">
                                        <div class="btn btn-success">Aktif</div></span><br><br>
                                    </fieldset>
                                    <?php
                                }
                                else
                                    {?>
                                <fieldset disabled="">
                                    <div class="btn btn-default">Pasif</div></span><br><br>
                                </fieldset>
                                <?php }?>
                                <div class="dropdown">
                                <button class="btn btn-default btn-sm  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
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
                                        <li><a href="<?php echo base_url() ?>admin/Yorum/delete/<?php echo $row->id;?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
                                    </ul>
                                </div>
                            </div><h4><?php echo $row->yazar_ad;  ?></h4>
                            <p><?php echo $row->ktarih;  ?> /

                                <?php $yazi=$this->Database_Model->get_data_id("yazilar",$row->yazi_id);?> 

                                <?php echo $row->yazar_mail;  ?> </p>
                                <p><?php echo $yazi[0]->baslik;  ?></p><br>
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