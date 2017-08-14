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
                        <a href="<?= base_url() ?>admin/Mail">Mail</a>
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
                Bize Ulaşın - Gelen Mailler
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php foreach($veri as $row){ ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="float:right; display:inline">
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    İşlemler
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="<?php echo base_url() ?>admin/Mail/sil/<?php echo $row->id;?>">Sil</a></li>
                                </ul>
                            </div>
                        </div><p><h4><?php echo $row->ad;  ?> </h3> </p>
                        <h5><?php echo $row->mail;?> / 
                        <?php echo $row->tarih;?></h5>
                        <p><?php echo $row->icerik;  ?></p>
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