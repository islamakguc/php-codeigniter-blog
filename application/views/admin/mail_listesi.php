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
                            <?php
                            if($row->cevap == 0)
                            {
                                ?>
                                <fieldset disabled="">
                                    <div class="btn btn-success">Cevap Verilmedi</div><br><br>
                                </fieldset>
                                <?php
                            }
                            else
                                {?>
                            <fieldset disabled="">
                                <div class="btn btn-default">Cevaplandı</div><br><br>
                            </fieldset>
                            <?php }?>
                        </span>
                        <div class="dropdown">
                            <button class="btn btn-default btn-sm  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                İşlemler
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="<?php echo base_url() ?>admin/Mail/sil/<?php echo $row->id;?>" onclick="return confirm('Silinecek !! emin misiniz. ?');">Sil</a></li>
                                <li><a href="<?php echo base_url() ?>admin/Mail/oku/<?php echo $row->id;?>">Oku</a></li>
                                <li><a href="<?php echo base_url() ?>admin/Mail/cevap/<?php echo $row->id;?>">Cevapla</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="<?php echo base_url() ?>admin/Mail/oku/<?php echo $row->id;?>">
                        <p><h4><?php echo $row->ad;  ?> </h4> </p></a>
                        <h5><?php echo $row->mail;?> / 
                            <?php echo $row->tarih;?></h5>
                            <p>
                               <?php
                               if (strlen($row->icerik) > 100) {
                                      $sonhali = substr($row->icerik, 0, 100); // "Tablo içinde göst"
                                      $sonhali = $sonhali . '...';
                                      echo $sonhali;
                                  } 
                                  else
                                  {
                                      echo $row->icerik;
                                  }
                                  ?> 
                              </p>
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