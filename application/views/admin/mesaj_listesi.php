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
                        <a href="<?= base_url() ?>admin/Mesaj">Mesajlar</a>
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
                Gelen Mesajlar  <span style="display:inline; float:right;"><a href="<?=base_url()?>admin/Mesaj/Mesajgonder" class="btn btn-primary btn-xs" role="button">Yeni Mesaj Gönder</a></span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php foreach($veri as $row){ ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="float:right; display:inline">
                          <span style="text-align: right; float: right;">
                            <?php
                            if($row->durum == 0)
                            {
                                ?>
                                <fieldset disabled="">
                                    <div class="btn btn-success">Yeni</div><br><br>
                                </fieldset>
                                <?php
                            }
                            else
                                {?>
                            <fieldset disabled="">
                                <div class="btn btn-default">Okundu</div><br><br>
                            </fieldset>
                            <?php }?>
                        </span>


                        <div class="dropdown">
                            <button class="btn btn-default btn-sm  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                İşlemler
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="<?php echo base_url() ?>admin/Mesaj/sil/<?php echo $row->id;?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
                                <li><a href="<?php echo base_url() ?>admin/Mesaj/oku/<?php echo $row->id;?>">Oku</a></li>
                            </ul>
                        </div>
                    </div><h5><?php echo $row->gonderici_adi;?> / <?php echo $row->tarih;?></h5>
                    <p><h3><?php echo $row->baslik;  ?> </h3> </p><br>
                    <p><?php echo $row->mesaj;  ?></p>
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