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
                        <a href="<?= base_url() ?>admin/Sosyal">Sosyal Medya</a>
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
            Sosyal Medya Listesi <span style="display:inline; float:right;"><a href="<?=base_url()?>admin/Sosyal/ekle" class="btn btn-primary btn-xs" role="button">Yeni Sosyal Medya Ekle</a></span>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php foreach($sosyal as $row){ ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="float:right; display:inline">
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    İşlemler
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="<?php echo base_url() ?>admin/Sosyal/guncelle/<?php echo $row->id;?>">Güncelle</a></li>
                                    <li><a href="<?php echo base_url() ?>admin/Sosyal/sil/<?php echo $row->id;?>">Sil</a></li>
                                </ul>
                            </div>
                        </div><p style="font-size: 18px;"><?php echo $row->ad;?> 
                        <p><?php echo $row->resim;?></p>
                        <p><?php echo $row->link;?></p>
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